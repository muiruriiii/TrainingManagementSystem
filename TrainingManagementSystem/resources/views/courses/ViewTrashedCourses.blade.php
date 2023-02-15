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

    <link rel="stylesheet" href="{{ asset('css/style2.css') }}" />

</head>
<body>
<h3 style="color: rgb(160,82,45);" id="heading"> Courses </h3>
<h3 style="color: rgb(160,82,45);" id="heading"> Trashed |<a id="heading" href="course"> Add </a>|<a id="heading" href="ViewCourses"> All </a> </h3>

<div class="col col-md-11 text-right">
    <span style="display: inline-block"><h3><a class="deletebutton" href="{{url('RestoreAllCourses') }}"><b>Restore All</b></a></h3></span>
    <i style="display: inline-block;color: rgb(160,82,45);" class="fa-sharp fa-solid fa-trash-arrow-up"></i>
</div>
<table>
    <tr>
        <th>Course Name</th>
        <th>Course Description</th>
        <th>Course Videos</th>
        <th>Course Notes</th>
        <th colspan="3">Action</th>
    </tr>
    @if(count($course) > 0 )
    @foreach($course as $courses)
        <tr>
            <td>{{ $courses-> courseName }}</td>
            <td>{{ $courses-> courseDescription }}</td>
            <td>{{ $courses-> courseVideos }}</td>
            <td>{{ $courses-> courseNotes }}</td>
            <td><a class="deletebutton" href="{{url ('RestoreCourses/'.$courses->id) }}">Restore</a></td>

        </tr>
    @endforeach
    @else
        <tr>
            <td colspan="6"class="text-center"><b>No Trashed Mpesa Payments Made</b></td>
        </tr>
    @endif
</table>
</body>
</html>
