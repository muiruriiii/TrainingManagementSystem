<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="{{asset('css/courseStyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/registerstyle.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}" />

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Courses Page</title>

</head>
<body>

<div class="sidebar">
    <div class="logo-details">

        <div class="logo_name">TMS</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>

    <ul class="nav-list">
        <li>
            <a style="background: rgb(160,82,45);" href="{{url('/')}}">
                <i class='bx bx-home'></i>
                <span class="links_name">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>
        <li>
            <a style="background: rgb(160,82,45);" href="{{url('courseContent/'.$courseID)}}">
                <i class='bx bx-notepad' ></i>
                <span class="links_name">Course Content</span>
            </a>
            <span class="tooltip">Course Content</span>
        </li>
        <li>
            <a style="background: rgb(160,82,45);" href="{{url('listTopics/'.$courseID)}}">
                <i class='bx bx-notepad' ></i>
                <span class="links_name">Course Topics</span>
            </a>
            <span class="tooltip">Course Topics</span>
        </li>
        <li>
            <a style="background: rgb(160,82,45);" href="/logout">
                <i class='bx bx-log-out' id="log_out" ></i>
                <span class="links_name">Log Out</span>
            </a>

            <a style="background: rgb(160,82,45);" href="">
                <span class="tooltip">Log Out</span>
            </a>
        </li>
    </ul>



</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("open");
        menuBtnChange();
    });

    searchBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("open");
        menuBtnChange();
    });


    function menuBtnChange() {
        if(sidebar.classList.contains("open")){
            closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        }else {
            closeBtn.classList.replace("bx-menu-alt-right","bx-menu");
        }
    }
</script>
</body>
</html>
