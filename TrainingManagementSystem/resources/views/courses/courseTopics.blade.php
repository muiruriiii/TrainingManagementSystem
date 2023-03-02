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
        <form action="/courseTopics" enctype="multipart/form-data" method="POST" >
            @csrf
            <div style="width: 500px;" class="container">
                <h3 id="heading"> COURSES </h3>

                <div class="form-wrapper">
                    <label for="">Course Name</label>
                    <select class='form-control' name='courseID' >
                        @foreach($courses as $course)
                            <option class="form-control"  value="{{$course->id}}">{{$course->courseName}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('courseID'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('courseID') }}</span>
                    @endif
                </div>
                <div class="form-wrapper">
                    <label for="">Topic Number</label>
                    <input type="text" name="topicNumber" class="form-control">
                    @if($errors->has('topicNumber'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('topicNumber') }}</span>
                    @endif
                </div>
                <div class="form-wrapper">
                    <label for="">Topic Name</label>
                    <input type="text" name="topicName" class="form-control">
                    @if($errors->has('topicName'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('topicName') }}</span>
                    @endif
                </div>
                <div class="form-wrapper">
                    <label for="">Course Notes</label>
                    <input type="file" id="myFile" name="courseNotes">
                    @if($errors->has('courseNotes'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('courseNotes') }}</span>
                    @endif
                </div>
                <div class="form-wrapper">
                    <label for="">Course Videos</label>
                    <input type="file" id="myFile" name="courseVideos">
                    @if($errors->has('courseVideos'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('courseVideos') }}</span>
                    @endif
                </div>
                <button style="rgb(160,82,45);"> Submit</button>
            </div>
        </form>
    </div>
</div>
</body>

