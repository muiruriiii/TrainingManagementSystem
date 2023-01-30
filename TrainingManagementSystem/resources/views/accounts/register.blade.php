
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{asset("css/registerstyle.css")}}">

</head>

<body>
<div class="wrapper">
    <div class="inner">
{{--@if($errors->any())--}}
{{--    <div style="color: red">--}}
{{--        <ul>--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}
        <form action="{{url ('/register')}}" method="POST">
            @csrf
            <div class="container">
            <h3>Register | <a id="heading" href="login">Login</a>  </h3>
            <div class="form-group">
                <div class="form-wrapper">
                    <label for="">First Name</label>
                    <input type="text" name="firstName" class="form-control" />
                @if($errors->has('firstName'))
                    <span style="color: red;" class="text-danger">{{ $errors->first('firstName') }}</span>
                @endif
                </div>
                <div class="form-wrapper">
                    <label for="">Last Name</label>
                    <input type="text" name="lastName" class="form-control" >
                @if($errors->has('lastName'))
                    <span style="color: red;" class="text-danger">{{ $errors->first('lastName') }}</span>
                @endif
                </div>
            </div>
            <div class="form-wrapper">
                <label for="">Telephone Number</label>
                <input type="text" name="telephoneNumber" class="form-control">
            @if($errors->has('telephoneNumber'))
                <span style="color: red;" class="text-danger">{{ $errors->first('telephoneNumber') }}</span>
            @endif
            </div>
            <div class="form-wrapper">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control">
            @if($errors->has('email'))
                <span style="color: red;" class="text-danger">{{ $errors->first('email') }}</span>
            @endif
            </div>
            <div class="form-wrapper">
                <label for="">Role</label>
                <?php
                $db = mysqli_connect("localhost", "root", "", "tms");
               $sql = mysqli_query($db, "SELECT * FROM roles WHERE isDeleted = 0");

                echo "<select class='form-control' name='roleID' >";
                while ($row = mysqli_fetch_array($sql)) {
                ?>
                <option class="form-control"  value="<?php echo$row['id']?>"> <?php echo$row['roleName']; ?> </option>
                <?php
                }
                echo "</select>";
                ?>
            @if($errors->has('roleID'))
                <span style="color: red;" class="text-danger">{{ $errors->first('roleID') }}</span>
            @endif
            </div>
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
                <label for="">Password</label>
                <input type="password" name="password" class="form-control">
            @if($errors->has('password'))
                <span style="color: red;" class="text-danger">{{ $errors->first('password') }}</span>
            @endif
            </div>
            <div class="form-wrapper">
                <label for="">Confirm Password</label>
                <input type="password" name="confirmPassword" class="form-control">
            @if($errors->has('confirmPassword'))
                <span style="color: red;" class="text-danger">{{ $errors->first('confirmPassword') }}</span>
            @endif
            </div>
                <input type="hidden" name="userType" value="user">
{{--            <div class="checkbox">--}}
{{--                <label>--}}
{{--                    <input type="checkbox"> I caccept the Terms of Use & Privacy Policy.--}}
{{--                    <span class="checkmark"></span>--}}
{{--                </label>--}}
{{--            </div>--}}
            <button style="rgb(160,82,45);">Register Now</button>
            </div>
        </form>
    </div>
</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
