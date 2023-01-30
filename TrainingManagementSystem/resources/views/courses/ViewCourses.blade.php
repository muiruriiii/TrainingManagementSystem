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

<h2> View Courses </h2>


<table>
    <tr>
        <th>Course Name</th>
        <th>Course Description</th>
        <th>Course Videos</th>
        <th>Course Notes</th>
        <th>
            Status
            <p><i>{If deleted, status is 1}</i></p>
        </th>
        <th colspan="2">Action</th>
    </tr>
    @foreach($courses as $course)
        <tr>
            <td>{{ $course-> courseName }}</td>
            <td>{{ $course-> courseDescription }}</td>
            <td>{{ $course-> courseVideos }}</td>
            <td>{{ $course-> courseNotes }}</td>
            <td>{{ $course-> isDeleted }}</td>
            <td><a class="editbutton" href="{{url ('EditCourse/'.$course->id) }}">Edit</a></td>
            <td><a href="{{url ('DeleteCourse/'.$course->id) }}" class="deletebutton">Delete</a></td>
        </tr>
    @endforeach
</table>

</body>
</html>
