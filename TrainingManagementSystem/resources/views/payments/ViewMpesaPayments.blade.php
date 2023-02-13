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

    <link rel="stylesheet" href="{{ asset('css/style2.css') }}" />

</head>
<body>

<h3 id="heading"> View Payments </h3>
<center>
<h3 style="color: rgb(160,82,45);" id="heading">Mpesa |<a id="heading" href="ViewPaypalPayments"> Paypal</a></h3>
</center>

<table>
    <tr>
        <th>Course Amount</th>
        <th>Transaction ID</th>
        <th>Phone Number</th>
        <th>Payment By</th>
    </tr>
    @foreach($mpesapayments as $mpesapayment)
        <tr>
            <td>{{ $mpesapayment-> courseAmount }}</td>
            <td>{{ $mpesapayment-> transactionID }}</td>
            <td>{{ $mpesapayment-> phoneNumber }}</td>
            <td>{{ $mpesapayment-> users->firstName. ' '.$mpesapayment-> users->lastName}}</td>
        </tr>
    @endforeach
</table>
    <div class="d-flex justify-content-center">
        {{--    To display on each side of the selected page if the pages are too many--}}
        {{$mpesapayments->onEachSide(1)->links()}}
    </div>
</body>
</html>
