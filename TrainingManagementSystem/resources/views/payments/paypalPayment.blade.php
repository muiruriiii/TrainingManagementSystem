@include('templates.sideBar')
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
{{--@if($message = Session::get('success'))--}}
{{--    <div class="alert alert-info">--}}
{{--        {{ $message }}--}}
{{--    </div>--}}
{{--@endif--}}
<div class="wrapper">
    <div class="inner">
        <form action="{{URL('/payment')}}" method="POST">
            @csrf
            <div style="width: 500px;" class="container">
                <h3> Course Payment  </h3>
                <h3><a id="heading" href="{{url('/mpesaPayment')}}">M-Pesa</a> | Paypal  </h3>
                <div class="form-wrapper">
                <label for="">Course Name</label>
                <?php
                $db = mysqli_connect("localhost", "root", "", "tms");
                $sql = mysqli_query($db, "SELECT * FROM courses WHERE isDeleted = 0");

                echo "<select class='form-control'  name='courseID' >";
                while ($row = mysqli_fetch_array($sql)) {
                ?>
                <option class="form-control" value="<?php echo$row['id']?>"> <?php echo$row['courseName']; ?> </option>
                <?php
                }
                echo "</select>";
                ?>
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
                <button type="submit" style="rgb(160,82,45);">Make Payment</button>

            </div>
        </form>
    </div>
</div>

</body>
</html>
