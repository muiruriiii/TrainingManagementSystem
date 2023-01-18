
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Role</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{URL::asset("css/registerstyle.css")}}">

</head>

<body>

<div class="wrapper">
    <div class="inner">
        <form action="{{url ('/RolesEdit/'.$roles->id)}}" method="POST">
            @csrf
            <div style="width: 500px;" class="container">
                <h3> Edit Role Content </h3>
                <div class="form-wrapper">
                    <label for="">Role Name</label>
                    <input type="text" name="roleName" class="form-control">
                    @if($errors->has('roleName'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('roleName') }}</span>
                    @endif
                </div>


                <div class="form-wrapper">
                    <label for="">Role Description</label>
                    <input type="text" name="roleDescription" class="form-control">
                    @if($errors->has('roleDescription'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('roleDescription') }}</span>
                    @endif
                </div>


                <button style="rgb(160,82,45);"> Submit</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
