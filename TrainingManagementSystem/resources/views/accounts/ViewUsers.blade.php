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

<h3 style="color: rgb(160,82,45);" id="heading"> View Users </h3>
<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Telephone Number</th>
        <th>Email</th>
        <th>Role</th>
        <th>
            Status
            <p><i>{If deleted, status is 1}</i></p>
        </th>
        <th colspan="2">Action</th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{ $user-> firstName }}</td>
            <td>{{ $user-> lastName }}</td>
            <td>{{ $user-> telephoneNumber }}</td>
            <td>{{ $user-> email }}</td>
            <td>{{ $user->roles->roleName }}</td>
            <td>{{ $user-> isDeleted }}</td>

            @if($user-> userType == 'user' and $user-> isDeleted == 0){

{{--            <td><a class="editbutton" href="{{url ('EditCourse/'.$course->id) }}">Edit</a></td>--}}
            <td><a href="{{url ('DeleteUsers/'.$user->id) }}" class="deletebutton">Delete</a></td>
                }
            @elseif($user-> userType == 'user' and $user-> isDeleted == 1)
                {
                <td><b>Deleted User</b></td>
                }
            @else
            {
                <td><b>ADMIN</b></td>
            }

            @endif
        </tr>
    @endforeach
</table>

<div class="d-flex justify-content-center">
    {{--    To display on each side of the selected page if the pages are too many--}}
    {{$users->onEachSide(1)->links()}}
</div>

</body>
</html>
