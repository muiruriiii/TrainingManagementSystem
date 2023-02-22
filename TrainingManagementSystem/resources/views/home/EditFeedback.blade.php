@include('templates.dashboardSideBar')
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Course</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{asset("css/registerstyle.css")}}">

</head>

<body>

<div class="wrapper">
    <div class="inner">
        <form action="{{url ('/FeedbackEdit/'.$feedback->id)}}" method="POST" class="contact-form">
            @csrf
            <div style="width: 500px;" class="container">
                <h3> Edit the Course Content </h3>
                <div class="form-wrapper">
                    <label for="">Email</label>
                    <input type="text" name="email" value="{{$feedback->email}}" class="form-control" readonly>
                    @if($errors->has('email'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-wrapper">
                    <label for="">Feedback</label>
                    <input type="text" name="feedback" value="{{$feedback->feedback}}" class="form-control" readonly>
                    @if($errors->has('feedback'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('feedback') }}</span>
                    @endif
                </div>
                <div class="form-wrapper">
                    <label for="">Status</label>
                    <center>To display the review, change the status to good</center>
                    <br>
                    <select class='form-control' name='status' >
                            <option class="form-control">Poor</option>
                        <option class="form-control">Good</option>
                    </select>
                    @if($errors->has('roleID'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('roleID') }}</span>
                    @endif
                </div>

                <button style="rgb(160,82,45);"> Submit</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
