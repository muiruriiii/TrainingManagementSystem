
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign In</title>
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
            <form action="{{route('passwordReset')}}" method="POST">
                @if(\Illuminate\Support\Facades\Session::get('fail'))
                    <div class="alert alert-danger">
                        {{\Illuminate\Support\Facades\Session::get('fail')}}
                    </div>
                @endif
                @if(\Illuminate\Support\Facades\Session::get('success'))
                    <div class="alert alert-success">
                        {{\Illuminate\Support\Facades\Session::get('success')}}
                    </div>
                @endif
                @csrf
                <input type="hidden" name="token" value="{{$token}}">
                <h3 style="color: rgb(160,82,45); ">Reset Password</h3>
                <div class="form-wrapper">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $email ?? old ('email') }}">
                    @if($errors->has('email'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-wrapper">
                    <label for="">Password</label>
                    <input id="myInput" type="password" name="password" class="form-control">
                    @if($errors->has('password'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-wrapper">
                    <label for="">Confirm Password</label>
                    <input id="confirmInput" type="password" name="confirmPassword" class="form-control">
                    @if($errors->has('confirmPassword'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('confirmPassword') }}</span>
                    @endif
                </div>
                <input type="checkbox" onclick="myFunction()">Show Password
                <button style="rgb(160,82,45);">Reset Password</button>
            </form>
        </div>
    </div>
</div>
<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        var y = document.getElementById("confirmInput");
        if (x.type === "password" && y.type === "password") {
            x.type = "text";
            y.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
        }
    }
</script>
</body>


