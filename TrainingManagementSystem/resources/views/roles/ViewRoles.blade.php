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


    </head>
<body>

    <h3 style="color: rgb(160,82,45);" id="heading"> Roles </h3>
    <h3 style="color: rgb(160,82,45);" id="heading"> All |<a id="heading" href="role"> Add </a>|<a id="heading" href="ViewTrashedRoles"> Trashed </a> </h3>

<table>
    <tr>
        <th>Role Name</th>
        <th>Role Description</th>
        <th colspan="3">Action</th>
    </tr>
    @if(count($roles) > 0 )
    @foreach($roles as $role)
    <tr>
        <td>{{ $role-> roleName }}</td>
        <td>{{ $role-> roleDescription }}</td>
        <td><a class="editbutton" href="{{url ('EditRole/'.$role->id) }}">Edit</a></td>
        <td><a class="deletebutton" href="{{url ('DeleteRole/'.$role->id) }}">Delete</a></td>
        <td><a class="deletebutton" href="{{url ('ForceDeleteRoles/'.$role->id) }}">Delete Forever</a></td>

    </tr>
    @endforeach
    @else
        <tr>
            <td colspan="6"class="text-center"><b>No Roles Found</b></td>
        </tr>
    @endif
</table>
    <div class="d-flex justify-content-center">
        {{--    To display on each side of the selected page if the pages are too many--}}
        {{$roles->onEachSide(1)->links()}}
    </div>

</body>
</html>
