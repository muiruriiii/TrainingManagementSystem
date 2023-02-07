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

<h2> View Payments </h2>

<table>
    <tr>
        <th>Payment ID</th>
        <th>Payer ID</th>
        <th>Payer Email</th>
        <th>Amount </th>
        <th>Currency </th>
        <th>Payment Status </th>
    </tr>
    @foreach($paypalpayments as $paypalpayment)
        <tr>
            <td>{{ $paypalpayment-> payment_id }}</td>
            <td>{{ $paypalpayment-> payer_id }}</td>
            <td>{{ $paypalpayment-> payer_email }}</td>
            <td>{{ $paypalpayment-> amount }}</td>
            <td>{{ $paypalpayment-> currency }}</td>
            <td>{{ $paypalpayment-> payment_status }}</td>
        </tr>
    @endforeach
</table>

</body>
</html>
