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
    <script src="https://kit.fontawesome.com/c2eec671f5.js" crossorigin="anonymous"></script>

</head>

<body>
<div class="wrapper">
    <div class="inner">
        <form action="{{URL('/lipa/'.$courses->id)}}" method="POST">
            @csrf

            <div style="width: 500px;" class="container">
                <a style="color: rgb(160,82,45);" href="{{url('/')}}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                </a>
                <h3> Course Payment  </h3>
                <h3 style="color: rgb(160,82,45); ">Mpesa | <a id="heading" href="{{url('/paypalPayment/'.$courses->id)}}">Paypal</a></h3>
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
                    <input type="text" name="amount" class="form-control" value="3,202.50" readonly>
                    @if ($errors->has('amount'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('amount') }}</span>
                    @endif
                    <br>
                </div>
                <div class="form-wrapper">
                    <label for="">Enter Phone Number</label>
                    <input type="phone" name="phone" class="form-control">
                    @if ($errors->has('amount'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('phoneNumber') }}</span>
                    @endif
                    <br>
                </div>
                <input type="text" name="user" value="{{auth()->user()}}" hidden>



                <button type="submit" style="rgb(160,82,45);">Make Payment</button>

                <div class="d-flex mt-3 justify-content-between">
                    <p>You will receive a popup message on your phone once you click on pay now button. Enter your pin to complete transaction.</p>
                </div>
            </div>
        </form>
    </div>
</div>


</body>
</html>
