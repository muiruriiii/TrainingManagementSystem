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
<h3 style="color: rgb(160,82,45);" id="heading"> PaypalPayments </h3>
<h3 style="color: rgb(160,82,45);" id="heading"> Trashed |<a id="heading" href="ViewMpesaPayments"> Mpesa </a>|<a id="heading" href="ViewPaypalPayments"> All </a> </h3>
<div class="col col-md-11 text-right">
    <span style="display: inline-block"><h3><a class="deletebutton" href="{{url('RestoreAllPaypalPayments') }}"><b>Restore All</b></a></h3></span>
    <i style="display: inline-block;color: rgb(160,82,45);" class="fa-sharp fa-solid fa-trash-arrow-up"></i>
</div>
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
    @if(count($paypalpayments)>0)
    @foreach($paypalpayments as $paypalpayment)
        <tr>
            <td>{{ $paypalpayment-> payment_id }}</td>
            <td>{{ $paypalpayment-> payer_id }}</td>
            <td>{{ $paypalpayment-> payer_email }}</td>
            <td>{{ $paypalpayment-> users->lastName }}</td>
            <td>{{ $paypalpayment-> amount }}</td>
            <td>{{ $paypalpayment-> currency }}</td>
            <td><a class="deletebutton" href="{{url ('RestorePaypalPayments/'.$paypalpayment->id) }}">Restore</a></td>
        </tr>
    @endforeach
    @else
        <tr>
            <td colspan="7"class="text-center"><b>No Trashed Paypal Payments Made</b></td>
        </tr>
    @endif
</table>


</body>
</html>
