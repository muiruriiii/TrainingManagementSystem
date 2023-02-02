
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{asset('css/registerstyle.css')}}">

</head>

<body>

<div class="wrapper">
    <div class="inner">
        <form action="{{URL('/payment/'.$courses->id)}}" method="POST">
            @csrf
            <div style="width: 500px;" class="container">
                <h3> Course Payment  </h3>
                <h3><a id="heading" href="{{url('/mpesaPayment')}}">M-Pesa</a> | Paypal  </h3>
                <div class="form-wrapper">
                <label>Course Name</label>
                    <input type="text" name="courseID" class="form-control" value="{{$courses->courseName}}" readonly>
                @if($errors->has('courseID'))
                    <span style="color: red;" class="text-danger">{{ $errors->first('courseID') }}</span>
                @endif
            </div>
            <div class="form-wrapper">
                <label for="">Duration</label>
                <input type="text" name="courseDuration" class="form-control" value="1 month" readonly>
                @if ($errors->has('duration'))
                    <span style="color: red;" class="text-danger">{{ $errors->first('duration') }}</span>
                @endif
                <br>
            </div>
                <div class="form-wrapper">
                    <label for="">Amount</label>
                    <input type="text" name="amount" class="form-control" value="250" readonly>
                    @if ($errors->has('amount'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('amount') }}</span>
                    @endif
                    <br>
                </div>

                <input type="text" name="user" value="{{auth()->user()}}" hidden>
                <button> Make Payment</button>

            </div>
        </form>
    </div>
</div>

</body>
</html>
