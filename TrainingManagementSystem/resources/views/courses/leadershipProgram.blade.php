@include('templates.sideBar')
{{--<?php--}}

{{--use App\Models\Users;--}}
{{--use Illuminate\Support\Facades\Auth;--}}

{{--$user=Users::find(Auth::user()->id);--}}

{{--if($user->paymentStatus == 'Approved'){--}}

{{--    echo view('courses/leadershipProgram');--}}
{{--}--}}
{{--else{--}}

{{--    echo view('payments/paypalPayment');--}}
{{--}--}}

{{--?>--}}
{{$courses->courseDescription}}
