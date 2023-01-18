<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('fonts/icomoon/style.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('css/style2.css') }}" />

    </head>
<body>

<h2>View Roles</h2>

<table>
    <tr>
        <th>Role Name</th>
        <th>Role Description</th>
        <th colspan="2">Action</th>
    </tr>
    @foreach($roles as $role)
    <tr>
        <td>{{ $role-> roleName }}</td>
        <td>{{ $role-> roleDescription }}</td>
        <td><a class="editbutton" href="{{url ('EditRole/'.$role->id) }}">Edit</a></td>
        <td class="deletebutton">Delete</td>
    </tr>
    @endforeach
</table>

</body>
</html>
