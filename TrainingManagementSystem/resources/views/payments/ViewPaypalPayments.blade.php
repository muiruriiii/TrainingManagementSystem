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

<h3 style="color: rgb(160,82,45);" id="heading"> PaypalPayments </h3>
<h3 style="color: rgb(160,82,45);" id="heading"> All |<a id="heading" href="ViewMpesaPayments"> Mpesa </a>|<a id="heading" href="ViewTrashedPaypalPayments"> Trashed </a> </h3>

<table>
    <tr>
        <th>Payment ID</th>
        <th>Payer ID</th>
        <th>Payer Email</th>
        <th>Payment By</th>
        <th>Amount </th>
        <th>Currency </th>
        <th colspan="3">Action</th>
    </tr>
    @if(count($paypalpayments) > 0 )
    @foreach($paypalpayments as $paypalpayment)
        <tr>
            <td>{{ $paypalpayment-> payment_id }}</td>
            <td>{{ $paypalpayment-> payer_id }}</td>
            <td>{{ $paypalpayment-> payer_email }}</td>
            <td>{{ $paypalpayment-> users->lastName }}</td>
            <td>{{ $paypalpayment-> amount }}</td>
            <td>{{ $paypalpayment-> currency }}</td>
            <td><a class="deletebutton" href="{{url ('DeletePaypalPayments/'.$paypalpayment->id) }}">Delete</a></td>
            <td><a class="deletebutton" href="{{url ('ForceDeletePaypalPayments/'.$paypalpayment->id) }}">Delete Forever</a></td>
        </tr>
    @endforeach
    @else
        <tr>
            <td colspan="7"class="text-center"><b>No Paypal Payments Made</b></td>
        </tr>
    @endif
</table>

<div class="d-flex justify-content-center">
{{--    To display on each side of the selected page if the pages are too many--}}
    {{$paypalpayments->onEachSide(1)->links()}}
</div>

</body>
</html>
