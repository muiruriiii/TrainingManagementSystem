{{--@if($message == "Payment Complete")--}}
{{--    @include('dashboard.dashboardSideNav')--}}
{{--@else--}}
{{--    @include('common.header')--}}
{{--@endif--}}

    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mpesa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{asset("css/registerstyle.css")}}">

</head>

<body>

<div class="wrapper">
    <div class="inner">
        <div style="width: 500px;" class="container">
            <form action="{{ url('/confirmTransaction') }}" method="POST">
                @csrf
            <h3 id="heading" class = "text-center">MPESA Confirmation</h3>

                <div class="form-wrapper">
                    <label for="">Transaction Code</label>
                    <input type="text" id="transaction" name="transaction" class="form-control" placeholder="e.g. RBD4KM3EFU">
                    @if($errors->has('transaction'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('transaction') }}</span>
                    @endif
                    <br>
                </div>
                <div>
                    <button type="submit" style="rgb(160,82,45);">Confirm</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>

