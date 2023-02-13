
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/style2.css') }}" />

    <link rel="stylesheet" href="{{ asset('path/to/font-awesome/css/font-awesome.min.css') }}" />
{{--    <!-- Favicons -->--}}
{{--    <link href="assets/img/favicon.png" rel="icon">--}}
{{--    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">--}}

{{--    <!-- Google Fonts -->--}}
{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">--}}

{{--    <!-- Vendor CSS Files -->--}}
{{--    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">--}}
{{--    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">--}}
{{--    <link href="assets/vendor/aos/aos.css" rel="stylesheet">--}}
{{--    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">--}}
{{--    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">--}}


    <title>TMS</title>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-black p-3">
    <div class="container-fluid">
        <a style="color: rgb(160,82,45); font-family: 'Raleway', sans-serif;" class="navbar-brand font-weight-bolder" href="/">TMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a style="color: rgb(160,82,45);font-family: 'Raleway', sans-serif;" class="nav-link mx-2 active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a style="font-family: 'Raleway', sans-serif;" class="nav-link mx-2 font-weight-lighter text-white" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a style="font-family: 'Raleway', sans-serif;" class="nav-link mx-2 font-weight-lighter text-white" href="#">Courses</a>
                </li>
                <li class="nav-item">
                    <a style="font-family: 'Raleway', sans-serif;"class="nav-link mx-2 font-weight-lighter text-white" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a style="font-family: 'Raleway', sans-serif;" class="nav-link mx-2 font-weight-lighter text-white" href="{{url('/login')}}">Account</a>
                </li>
                <li class="nav-item">
                    <a style="font-family: 'Raleway', sans-serif;" class="nav-link mx-2 font-weight-lighter text-white" href="{{url('/logout')}}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</body>
</html>
