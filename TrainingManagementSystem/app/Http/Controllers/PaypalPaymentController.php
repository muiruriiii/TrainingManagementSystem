<?php

namespace App\Http\Controllers;

use App\Models\PaypalPayment;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Omnipay\Omnipay;

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
//             return $request->courseID;

            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success( Request $request)
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


                $date = PaypalPayment::all()->where('payment_id',$arr['id']);

                if(Auth::check()){
                    $payment->userID = Auth::user()->id;
                    $user = Users::find(Auth::user()->id);
                    $courses = Courses::find($id);
                }

                $user->paymentStatus = 'Approved';
                $payment->save();
                $course->save();
                $user->save();
                //return request('courseID');
//                 UserPayments::create([
//                    'userID'=>Auth::user()->id,
//                    'courseID'=>$data['courseID']
//                 ]);

                return view('payments/confirm',['transactionID'=> $arr['id'],'email'=>$arr['payer']['payer_info']['email'],'courseAmount'=>$arr['transactions'][0]['amount']['total'],'date'=>$date,'courses'=> $courses]);
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

    public function ViewPayments(){
        $paypalpayments = PaypalPayment::all();
        return view('payments/ViewPayments',['paypalpayments'=> $paypalpayments]);
    }

}
