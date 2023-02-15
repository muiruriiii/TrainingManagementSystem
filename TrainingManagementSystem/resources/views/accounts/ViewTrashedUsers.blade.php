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
<h3 style="color: rgb(160,82,45);" id="heading"> Users </h3>
<h3 style="color: rgb(160,82,45);" id="heading"> Trashed |<a id="heading" href="ViewUsers"> All </a></h3>

@if(session()->has('success'))

    <div class="alert alert-success">
        {{ @session()->get('success') }}
    </div>
@endif
<div class="col col-md-11 text-right">
    <span style="display: inline-block"><h3><a class="deletebutton" href="{{url('RestoreAllUsers') }}"><b>Restore All</b></a></h3></span>
    <i style="display: inline-block;color: rgb(160,82,45);" class="fa-sharp fa-solid fa-trash-arrow-up"></i>
</div>


<table>

    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Telephone Number</th>
        <th>Email</th>
        <th>Role</th>
        <th>Restore</th>
        {{--        <th colspan="2">Action</th>--}}
    </tr>
    @if(count($users) > 0 )
    @foreach($users as $user)
        <tr>
            <td>{{ $user-> firstName }}</td>
            <td>{{ $user-> lastName }}</td>
            <td>{{ $user-> telephoneNumber }}</td>
            <td>{{ $user-> email }}</td>
            <td>{{ $user->roles->roleName }}</td>
            <td><a class="deletebutton" href="{{url ('RestoreUsers/'.$user->id) }}">Restore</a></td>

        </tr>
    @endforeach
        @else
        <tr>
            <td colspan="6"class="text-center"> <b>No Trashed Users Found</b></td>
        </tr>
        @endif
</table>

{{--<div class="d-flex justify-content-center">--}}
{{--        To display on each side of the selected page if the pages are too many--}}
{{--    {{$users->onEachSide(1)->links()}}--}}
{{--</div>--}}

</body>
</html>
