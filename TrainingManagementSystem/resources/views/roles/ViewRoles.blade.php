@include('templates.dashboardSideBar')
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css') }}" />

    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css') }}" />

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{asset('css/style.css') }}" />

    <link rel="stylesheet" href="{{asset('css/style2.css') }}" />

    </head>
<body>

<h2>View Roles</h2>

<table>
    <tr>
        <th>Role Name</th>
        <th>Role Description</th>
        <th>
            Status
            <p><i>{If deleted, status is 1}</i></p>
        </th>
        <th colspan="2">Action</th>
    </tr>
    @foreach($roles as $role)
    <tr>
        <td>{{ $role-> roleName }}</td>
        <td>{{ $role-> roleDescription }}</td>
        <td>{{ $role-> isDeleted }}</td>
        <td><a class="editbutton" href="{{url ('EditRole/'.$role->id) }}">Edit</a></td>
        <td><a href="{{url ('DeleteRole/'.$role->id) }}" class="deletebutton">Delete</a></td>
    </tr>
    @endforeach
</table>

</body>
</html>
