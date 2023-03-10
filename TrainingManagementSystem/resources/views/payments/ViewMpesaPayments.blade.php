@include('templates.dashboardSideBar')
    <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />


</head>
<body>

<h3 style="color: rgb(160,82,45);" id="heading"> Mpesa Payments </h3>
<h3 style="color: rgb(160,82,45);" id="heading"> All |<a id="heading" href="ViewPaypalPayments"> Paypal </a>|<a id="heading" href="ViewTrashedMpesaPayments"> Trashed </a> </h3>

<table>
    <tr>
        <th>Course Amount</th>
        <th>Transaction ID</th>
        <th>Phone Number</th>
        <th>Payment By</th>
        <th colspan="3">Action</th>
    </tr>
    @if(count($mpesapayments) > 0 )
    @foreach($mpesapayments as $mpesapayment)
        <tr>
            <td>{{ $mpesapayment-> courseAmount }}</td>
            <td>{{ $mpesapayment-> transactionID }}</td>
            <td>{{ $mpesapayment-> phoneNumber }}</td>
            <td>{{ $mpesapayment-> users->firstName. ' '.$mpesapayment-> users->lastName}}</td>
            <td><a class="deletebutton" href="{{url ('DeleteMpesaPayments/'.$mpesapayment->id) }}">Delete</a></td>
            <td><a class="deletebutton" href="{{url ('ForceDeleteMpesaPayments/'.$mpesapayment->id) }}">Delete Forever</a></td>
        </tr>
    @endforeach
    @else
        <tr>
            <td colspan="6"class="text-center"><b>No Mpesa Payments Made</b></td>
        </tr>
    @endif
</table>
    <div class="d-flex justify-content-center">
        {{--    To display on each side of the selected page if the pages are too many--}}
        {{$mpesapayments->onEachSide(1)->links()}}
    </div>
</body>
</html>
