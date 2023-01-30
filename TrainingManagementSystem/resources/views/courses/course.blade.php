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
        <form action="/course" method="POST">
            @csrf
            <div style="width: 500px;" class="container">
                <h3> Add a New Course </h3>
                <div class="form-wrapper">
                    <label for="">Course Name</label>
                    <input type="text" name="courseName" class="form-control">
                    @if($errors->has('courseName'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('courseName') }}</span>
                    @endif
                </div>


                <div class="form-wrapper">
                    <label for="">Course Description</label>
                    <input type="text" name="courseDescription" class="form-control">
                    @if($errors->has('courseDescription'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('courseDescription') }}</span>
                    @endif
                </div>
                <div class="form-wrapper">
                    <label for="">Course Videos</label>
                    <input type="file" id="myFile" name="courseVideos">
                    @if($errors->has('courseVideos'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('courseVideos') }}</span>
                    @endif
                </div>
                <div class="form-wrapper">
                    <label for="">Course Notes</label>
                    <input type="file" id="myFile" name="courseNotes">
                    @if($errors->has('courseNotes'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('courseNotes') }}</span>
                    @endif
                </div>

                <button style="rgb(160,82,45);"> Submit</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
