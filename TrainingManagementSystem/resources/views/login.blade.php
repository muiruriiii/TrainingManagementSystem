
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{URL::asset("css/registerstyle.css")}}">

</head>

<body>

<div class="wrapper">
    <div class="inner">
        <form action="" method="POST">
            @csrf
            <div style="width: 500px;" class="container">
            <h3><a id="heading" href="{{URL::to('register')}}">Register</a> | Login  </h3>
            <div class="form-wrapper">
                <label for="">Email</label>
                <input type="text" class="form-control">
            </div>


            <div class="form-wrapper">
                <label for="">Password</label>
                <input type="password" class="form-control">
            </div>


            <button style="rgb(160,82,45);">Register Now</button>
        </div>
        </form>
    </div>
</div>

</body>
</html>
