
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
{{--@if($errors->any())--}}
{{--    <div style="color: red">--}}
{{--        <ul>--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}
        <form action="/register" method="POST">
            @csrf
            <div class="container">
            <h3>Register | <a id="heading" href="{{URL::to('login')}}">Login</a>  </h3>
            <div class="form-group">
                <div class="form-wrapper">
                    <label for="">First Name</label>
                    <input type="text" name="firstName" class="form-control" required>
                </div>
                <div class="form-wrapper">
                    <label for="">Last Name</label>
                    <input type="text" name="lastName" class="form-control" required>
                </div>
            </div>
            <div class="form-wrapper">
                <label for="">Telephone Number</label>
                <input type="text" name="telephoneNumber" class="form-control" required>
            </div>
            <div class="form-wrapper">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" required>
            </div>
            <div class="form-wrapper">
                <label for="">Role</label>
                <?php
                $db = mysqli_connect("localhost", "root", "", "tms");
                $sql = mysqli_query($db, "SELECT * FROM roles");

                echo "<select class='form-control' name='roleID' >";
                while ($row = mysqli_fetch_array($sql)) {
                ?>
                <option class="form-control" required value="<?php echo$row['id']?>"> <?php echo$row['roleName']; ?> </option>
                <?php
                }
                echo "</select>";
                ?>
            </div>
            <div class="form-wrapper">
                <label for="">Course Name</label>
                <?php
                $db = mysqli_connect("localhost", "root", "", "tms");
                $sql = mysqli_query($db, "SELECT * FROM courses");

                echo "<select class='form-control' required name='courseID' >";
                while ($row = mysqli_fetch_array($sql)) {
                ?>
                <option class="form-control" required value="<?php echo$row['id']?>"> <?php echo$row['courseName']; ?> </option>
                <?php
                }
                echo "</select>";
                ?>

            </div>
            <div class="form-wrapper">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-wrapper">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control" required>
            </div>
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
