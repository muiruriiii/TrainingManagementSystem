<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\MpesaPayments;
use App\Models\UserPayments;
use App\Models\Courses;
use App\Models\Users;
use Illuminate\Support\Facades\Log;


class MpesaController extends Controller
{
    public function lipa($id){
    $courses = Courses::find($id);
        UserPayments::create([
         'courseID'=>$courses->id,
         'userID'=>Auth::user()->id
        ]);
        return view('payments/mpesaPayment',['courses'=>$courses]);
    }
//STK Push Simulation
    public function stkSimulation()
    {
        $mpesa = new \Safaricom\Mpesa\Mpesa();
        $BusinessShortCode=174379;
        $LipaNaMpesaPasskey="";
        $TransactionType="CustomerPayBillOnline";
        $Amount="1";
        $PartyA="";
        $PartyB="174379";
        $PhoneNumber="";
        $CallBackURL="https://muiruri.com";
        $AccountReference="Testing for TMS";
        $TransactionDesc="Lipa na Mpesa ";
        $Remarks="Payment Successful";

        $stkPushSimulation=$mpesa->STKPushSimulation(
            $BusinessShortCode,
            $LipaNaMpesaPasskey,
            $TransactionType,
            $Amount,
            $PartyA,
            $PartyB,
            $PhoneNumber,
            $CallBackURL,
            $AccountReference,
            $TransactionDesc,
            $Remarks
        );
        dd($stkPushSimulation);
    }
//C2B Simulation
    public function LipaNaMpesaPassword()
    {
        $timestamp = Carbon::rawParse('now')->format('YmdHms');
        $passKey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $businessShortCode = 174379;
        //password=concatenate passkey,timestamp and shortcode
        $mpesaPassword = base64_encode($businessShortCode.$passKey.$timestamp);

        return $mpesaPassword;
    }
    public function newAccessToken()
    {
        $consumer_key="qO8AAIqOIvWdccbGaGvfBamMMyj3GmSG";
        $consumer_secret="XfvsDWauf5GmuB7v";
        $credentials = base64_encode($consumer_key.":".$consumer_secret);
        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials,"Content-Type:application/json"));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        curl_close($curl);

        return $access_token->access_token;
    }
    public function stkPush(Request $request)
    {

        $amount = $request->amount;
        $phone =  $request->phone;
        $formatedPhone = substr($phone, 1); //7*******
        $code = "254";
        $phoneNumber = $code.$formatedPhone; //2547*******

        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $curl_post_data = [
        'BusinessShortCode' =>174379,
        'Password' => $this->LipaNaMpesaPassword(),
        'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
        'TransactionType' => 'CustomerPayBillOnline',
        'Amount' => 1,
        'PartyA' => $phoneNumber,
        'PartyB' => 174379,
        'PhoneNumber' => $phoneNumber,
        'CallBackURL' => 'https://2750-105-162-50-32.ngrok.io/api/stk/push/callback/url',
        'AccountReference' => "TMS Tester Payment",
        'TransactionDesc' => "Lipa Na M-PESA"
        ];

        $data_string = json_encode($curl_post_data);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->newAccessToken()));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);

        return redirect('/mpesaConfirm');

    }
    public function MpesaRes(Request $request)
    {
        $response = json_decode($request->getContent());
        $responseData = $response->Body->stkCallback->CallbackMetadata;
        $responseCode = $response->Body->stkCallback->ResultCode;
        $responseMessage=$response->Body->stkCallback->ResultDesc;
        $amount=$responseData->Item[0]->Value;
        $mpesaTransactionID=$responseData->Item[1]->Value;
        $phoneNumber=$responseData->Item[4]->Value;
        Log::info(json_encode($responseData));

        $mpesaPayment = new MpesaPayments();
        $mpesaPayment->courseAmount = $amount;
        $mpesaPayment->transactionID = $mpesaTransactionID;
        $mpesaPayment->phoneNumber = $phoneNumber;
        $mpesaPayment->save();

        Log::info($mpesaPayment);
    }
    public function mpesaConfirm(){
        $userpayment = UserPayments::all()->where('userID', Auth::user()->id)->last();
        if($userpayment->status == 'Accessible'){
            return view('payments/mpesaConfirm');
        }else{
           return view('payments/mpesaConfirm');
        }
    }
//To check if the transaction code in the database is similar to the one entered by the user
    public function confirmTransaction(Request $request){
        $mpesaPayment = $request->transaction;
        $allmpesaTransaction = MpesaPayments::all()->where('transactionID',$mpesaPayment)->first();
//If similar the status is set to Accessible and user ID of the logged in user is set
        if($allmpesaTransaction){
            $user = Users::find(Auth::user()->id);
            $allmpesaTransaction->userID = Auth::user()->id;
            $userpayment = UserPayments::all()->where('userID',Auth::user()->id)->last();

            $userpayment->status = 'Accessible';
            $user->paymentStatus = 'Approved';
            $allmpesaTransaction->save();
            $user->save();
            $userpayment->save();
            return redirect ('paidCoursePage/'.$userpayment->courseID);
        }
    }
    public function ViewMpesaPayments(){
        $mpesapayments = MpesaPayments::paginate(1);
        return view('payments/ViewMpesaPayments',['mpesapayments'=> $mpesapayments]);
    }






}
