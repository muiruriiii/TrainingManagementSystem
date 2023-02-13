
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
        <form action="/login" method="POST">
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
