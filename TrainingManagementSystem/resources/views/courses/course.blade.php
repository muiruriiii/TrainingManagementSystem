@include('templates.dashboardSideBar')

<head>
    <meta charset="utf-8">
    <title>Course</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{asset("css/registerstyle.css")}}">

</head>

<body>

<div class="wrapper">
    <div class="inner">
        <form action="/course" enctype="multipart/form-data" method="POST" >
            @csrf
            <div style="width: 500px;" class="container">
                <h3 id="heading"> COURSES </h3>
                <center>
                    <h3 style="color: rgb(160,82,45);" id="heading">Add | <a id="heading" href="ViewCourses">View</a> |<a id="heading" href="courseTopics"> Topics </a> </h3>
                </center>
                <div class="form-wrapper">
                    <label for="">Course Name</label>
                    <input type="text" name="courseName" class="form-control">
                    @if($errors->has('courseName'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('courseName') }}</span>
                    @endif
                </div>


                <div class="form-wrapper">
                    <label for="">Course Description</label>
                    <textarea name="courseDescription" class="form-control"></textarea>
                    @if($errors->has('courseDescription'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('courseDescription') }}</span>
                    @endif
                </div>
                <div class="form-wrapper">
                    <label for="">Course Profile</label>
                    <input type="file" id="myFile" name="courseProfile">
                    @if($errors->has('courseProfile'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('courseProfile') }}</span>
                    @endif
                </div>

                <button style="rgb(160,82,45);"> Submit</button>
            </div>
        </form>
    </div>
</div>
</body>

