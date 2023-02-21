<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<section style="background-color: #fff;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
        @if (session('message'))
            <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
        @endif

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img style="width: 320px" src = "{{asset($users->userProfile)}}" alt="User Profile"
                             class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">{{$users->firstName .' '.$users->lastName }}</h5>
                        <p class="text-muted mb-1">Full Stack Developer</p>
                        <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                    </div>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body p-0">
                        <input type="file">
                    </div>
                </div>
                </form>

            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{url('changeDetails/'.$users->id)}}" method="POST">
                            @csrf
                        <div class="mb-3">
                            <label for="">First Name</label>
                            <input type="text" name="firstName" value="{{$users->firstName}}" class="form-control">
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="">Last Name</label>
                            <input type="text" name="lastName" value="{{$users->lastName}}" class="form-control">
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" value="{{$users->email}}" class="form-control">
                        </div>
                        <hr>
                        <div class="mb-3">
                                <label for="">Telephone Number</label>
                            <input type="text" name="telephoneNumber" value="{{$users->telephoneNumber}}" class="form-control">
                        </div>
                        <div class="mb-3 text-end">
                            <hr>
                            <button type="submit" class="btn btn-primary">Update Details</button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="{{route('changePassword')}}" method="POST">
                                    @csrf
                                <div class="mb-3">
                                    <label for="">Old Password</label>
                                    <input type="password" name="oldPassword" class="form-control">
                                    @if($errors->has('oldPassword'))
                                        <span style="color: red;" class="text-danger">{{ $errors->first('oldPassword') }}</span>
                                    @endif
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <label>New Password</label>
                                    <input type="password" name="password" class="form-control" />
                                    @if($errors->has('password'))
                                        <span style="color: red;" class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <label>Confirm Password</label>
                                    <input type="password" name="confirmPassword" class="form-control">
                                    @if($errors->has('confirmPassword'))
                                        <span style="color: red;" class="text-danger">{{ $errors->first('confirmPassword') }}</span>
                                    @endif
                                    </div>
                                    <div class="mb-3 text-end">
                                        <hr>
                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                    </div>
                                </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    </div>
                </div>
    </div>
    </div>
</section>
<script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</script>
