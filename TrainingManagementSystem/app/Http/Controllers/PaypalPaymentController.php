<?php

namespace App\Http\Controllers;

use App\Models\PaypalPayment;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Omnipay\Omnipay;
use App\Models\UserPayments;

class PaypalPaymentController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }
    public function payment($id){
         $courses = Courses::find($id);
         UserPayments::create([
             'courseID'=>$courses->id,
             'userID'=>Auth::user()->id
         ]);
        return view('payments/paypalPayment',['courses'=>$courses]);
    }
    public function pay(Request $request)
    {
        try {

            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();
            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }
        }catch (\Throwable $th) {
        return $th->getMessage();
        }
    }
    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();

                $payment = new PaypalPayment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];
    //To store the id of the user making the payment in the userpayments table and to retrieve the last payment made and change the status to Accessible
                if(Auth::check()){
                    $payment->userID = Auth::user()->id;
                    $user = Users::find(Auth::user()->id);
                    $userpayment = UserPayments::all()->where('userID', Auth::user()->id)->last();
                    $userpayment->status = 'Accessible';
                }

                $user->paymentStatus = 'Approved';
                $payment->save();
                $user->save();
                $userpayment->save();

                $date = PaypalPayment::all()->where('payment_id',$arr['id']);
                return view('payments/paypalConfirm',['userpayment'=>$userpayment,'user'=>$user,'transactionID'=> $arr['id'],'email'=>$arr['payer']['payer_info']['email'],'courseAmount'=>$arr['transactions'][0]['amount']['total'],'date'=>$date]);
//                 return "Payment is Successful. Your Transaction Id is : " . $arr['id'];
            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return 'Payment declined!!';
        }
    }
    public function errorOccurred()
    {
        return 'User declined the payment!';
    }
    public function ViewPaypalPayments(){
        if(Auth::user()->userType != 'admin'){
                return view('accounts/login');
        }else{
        $paypalpayments = PaypalPayment::paginate(5);
        return view('payments/ViewPaypalPayments',['paypalpayments'=> $paypalpayments]);
        }
    }
    public function DeletePayPalPayments($id){
        if(Auth::user()->userType != 'admin'){
            return view('accounts/login');
        }else{
            $paypalpayments = PaypalPayment::find($id)->delete();
            return redirect('ViewPaypalPayments');
        }
    }
    public function ViewTrashedPayPalPayments()
    {
        $paypalpayments = PaypalPayment::onlyTrashed()->get();
        return view('payments/ViewTrashedPaypalPayments',['paypalpayments'=> $paypalpayments]);
    }
    public function RestorePayPalPayments($id){
        PaypalPayment::whereId($id)->restore();
        return redirect('ViewTrashedPayPalPayments');
    }
    public function RestoreAllPayPalPayments(){
        PaypalPayment::onlyTrashed()->restore();
        return back();
    }
    public function ForceDeletePayPalPayments($id){
        PaypalPayment::find($id)->forceDelete();
        return back();
    }
    public function paypalConfirm(){
        return view('payments/paypalConfirm');
    }
}
