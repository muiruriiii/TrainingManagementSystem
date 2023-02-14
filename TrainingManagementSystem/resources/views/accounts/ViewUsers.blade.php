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

<h3 style="color: rgb(160,82,45);" id="heading"> All Users | <a id="heading" href="{{url('ViewTrashedUsers') }}">Trashed Users</a></h3>

@if(session()->has('success'))

    <div class="alert alert-success">
        {{ @session()->get('success') }}
    </div>
@endif
<div class="col col-md-6 text-right">


</div>

<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Telephone Number</th>
        <th>Email</th>
        <th>Role</th>
        <th colspan="3">Action</th>
    </tr>
    @if(count($users) > 0 )
    @foreach($users as $user)
        <tr>
            <td>{{ $user-> firstName }}</td>
            <td>{{ $user-> lastName }}</td>
            <td>{{ $user-> telephoneNumber }}</td>
            <td>{{ $user-> email }}</td>
            <td>{{ $user->roles->roleName }}</td>
            @if($user-> userType == 'admin' )
                <td colspan="2"><b>ADMIN</b></td>
            @else
            <td><a class="deletebutton" href="{{url ('DeleteUsers/'.$user->id) }}">Delete</a></td>
            <td><a class="deletebutton" href="{{url ('ForceDeleteUsers/'.$user->id) }}">Delete Forever</a></td>
            @endif
        </tr>


    @endforeach
    @else
    <tr>
        <td colspan="4"class="text-center">No Users Found</td>
    </tr>
    @endif
</table>

<div class="d-flex justify-content-center">
{{--        To display on each side of the selected page if the pages are too many--}}
    {{$users->links()}}
</div>

</body>
</html>
