@include('templates.dashboardSideBar')
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />


</head>
<body>
<h3 style="color: rgb(160,82,45);" id="heading"> Courses </h3>
<h3 style="color: rgb(160,82,45);" id="heading"> All |<a id="heading" href="course"> Add </a>|<a id="heading" href="ViewTrashedCourses"> Trashed </a> </h3>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Course Name</th>
        <th scope="col">Course Description</th>
        <th scope="col">Course Videos</th>
        <th scope="col">Course Notes</th>
        <th scope="col">Course Profile</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    @if(count($course) > 0 )
        @foreach($course as $courses)
            <tr>
                <td>{{ $courses-> courseName }}</td>
                <td>{{ $courses-> courseDescription }}</td>
                <td><video style="width: 320px" controls><source src="{{asset($courses->courseVideos)}}" type="video/mp4"></video></td>
                <td><iframe style="width: 320px" src="{{asset($courses->courseNotes)}}"></iframe></td>
                <td><img style="width: 320px" src = "{{asset($courses->courseProfile)}}"></td>

                <td><a class="editbutton" href="{{url ('EditCourse/'.$courses->id) }}">Edit</a></td>
                <td><a class="deletebutton" href="{{url ('DeleteCourse/'.$courses->id) }}">Delete</a></td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="6"class="text-center"><b>No Courses Available</b></td>
        </tr>
        @endif
    </tr>
    </tbody>
</table>
    <div class="d-flex justify-content-center">
        {{--    To display on each side of the selected page if the pages are too many--}}
        {{$course->onEachSide(1)->links()}}
    </div>
</body>
</html>
