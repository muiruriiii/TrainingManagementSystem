
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <form action="{{route('sendResetLink')}}" method="POST">
{{--                @if(\Illuminate\Support\Facades\Session::get('fail'))--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        {{\Illuminate\Support\Facades\Session::get('fail')}}--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                @if(\Illuminate\Support\Facades\Session::get('success'))--}}
{{--                    <div class="alert alert-success">--}}
{{--                        {{\Illuminate\Support\Facades\Session::get('success')}}--}}
{{--                    </div>--}}
{{--                @endif--}}

                @csrf
                    <h3 style="color: rgb(160,82,45); ">Forgot Password</h3>
                <p class="text-center">If you've forgotten your password, please enter your registered email address. We'll send you a link to reset your password.</p>

                <div class="form-wrapper">
                    <label for="">Email</label>
                    <input type="text" name="email" value="{{old ('email')}}" class="form-control">

                    @if ($errors->has('email'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <br>
                </div>
                        <button style="rgb(160,82,45);">Continue</button>
            </form>
            <button style="rgb(160,82,45);"><a style="color: #FFFFFF;" href="{{url('login') }}"> Cancel</a></button>

            </div>
        </div>
    </div>
</div>
</body>
</html>
