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

<h2> View Users </h2>


<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Telephone Number</th>
        <th>Email</th>
        <th>Role</th>
        <th>Course Name</th>
        <th>
            Status
            <p><i>{If deleted, status is 1}</i></p>
        </th>
        <th colspan="2">Action</th>
    </tr>
{{--    $school=School::find(Auth::user()->school_id);--}}
{{--    if($school->paymentStatus == 'approved'){}--}}
    @foreach($users as $user)
        <tr>
            <td>{{ $user-> firstName }}</td>
            <td>{{ $user-> lastName }}</td>
            <td>{{ $user-> telephoneNumber }}</td>
            <td>{{ $user-> email }}</td>
            <td>{{ App\Http\Controllers\RoleController::getRoleName($user->roleID) }}</td>
            <td>{{ App\Http\Controllers\CourseController::getCourseName($user->courseID) }}</td>
            <td>{{ $user-> isDeleted }}</td>
{{--            <td><a class="editbutton" href="{{url ('EditCourse/'.$course->id) }}">Edit</a></td>--}}
            <td><a href="{{url ('DeleteUsers/'.$user->id) }}" class="deletebutton">Delete</a></td>
        </tr>
    @endforeach
</table>

</body>
</html>
