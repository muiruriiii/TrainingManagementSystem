
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{asset("css/registerstyle.css")}}">

</head>

<body>
<div class="wrapper">
    <div class="inner">
        <div style="width: 500px;" class="container">
        <form action="/login" method="POST">
            @if(\Illuminate\Support\Facades\Session::get('fail'))
                <div class="alert alert-danger">
                    {{\Illuminate\Support\Facades\Session::get('fail')}}
                </div>
            @endif
            @if(\Illuminate\Support\Facades\Session::get('info'))
                <div class="alert alert-success">
                    {{\Illuminate\Support\Facades\Session::get('info')}}
                </div>
            @endif
            @csrf
            <h3 style="color: rgb(160,82,45); ">Login |
                <a id="heading" href="{{url('/register')}}">Register</a>
            </h3>
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
                <input id="myInput" type="password" name="password" class="form-control">
                @if ($errors->has('password'))
                    <span style="color: red;" class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <br>
                <input type="checkbox" onclick="myFunction()">Show Password
                <a class="forgot-password" href="ForgotPassword" class="float-right">Forgot your password?</a>
            </div>

            <div>
            <button style="rgb(160,82,45);">Login</button>
            </div>
        </form>
        </div>
    </div>
</div>
<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
</body>
</html>
