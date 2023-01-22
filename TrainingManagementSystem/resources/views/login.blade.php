
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{URL::asset("css/registerstyle.css")}}">

</head>

<body>
{{--@if($message = Session::get('success'))--}}
{{--    <div class="alert alert-info">--}}
{{--        {{ $message }}--}}
{{--    </div>--}}
{{--@endif--}}
<div class="wrapper">
    <div class="inner">
        <form action="/login" method="POST">
            @csrf
            <div style="width: 500px;" class="container">
            <h3><a id="heading" href="{{URL::to('register')}}">Register</a> | Login  </h3>
            <div class="form-wrapper">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control">

                @if ($errors->has('email'))
                    <span style="color: red;" class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <br>
            </div>


            <div class="form-wrapper">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control">
                @if ($errors->has('password'))
                    <span style="color: red;" class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <br>
            </div>


            <button style="rgb(160,82,45);">Login</button>
        </div>
        </form>
    </div>
</div>

</body>
</html>
