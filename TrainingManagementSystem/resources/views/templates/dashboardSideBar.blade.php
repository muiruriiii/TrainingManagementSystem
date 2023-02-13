<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">


    <link rel="stylesheet" href="{{asset('css/courseStyle.css')}}">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Page</title>

</head>
<body>

<div class="sidebar">
    <div class="logo-details">

        <div class="logo_name">TMS</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
        <li>
            <a style="background: rgb(160,82,45);" href="{{url('dashboard')}}">
                <i class='bx bx-home'></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>

        <li>
            <a style="background: rgb(160,82,45);" href="{{url('role')}}">
                <i class='bx bx-group' ></i>
                <span class="links_name">Add a Role</span>
            </a>
            <span class="tooltip">Add a Role</span>
        </li>

        <li>
            <a style="background: rgb(160,82,45);" href="{{url('course')}}">
                <i class='bx bx-notepad' ></i>
                <span class="links_name">Add a Course</span>
            </a>
            <span class="tooltip">Add a Course</span>
        </li>

        <li>
            <a style="background: rgb(160,82,45);" href="{{url('ViewUsers')}}">
                <i class='bx bx-group' ></i>
                <span class="links_name">View Users</span>
            </a>
            <span class="tooltip">View Users</span>
        </li>

        <li>
            <a style="background: rgb(160,82,45);" href="{{url('ViewPaypalPayments')}}">
                <i class='bx bx-dollar' ></i>
                <span class="links_name">View Payments</span>
            </a>
            <span class="tooltip">View Payments</span>
        </li>

        <li>
            <a style="background: rgb(160,82,45);" href="{{url('logout')}}">
                <i class='bx bx-log-out' id="log_out" ></i>
                <span class="links_name">Log Out</span>
            </a>
            <a style="background: rgb(160,82,45);" href="{{url('logout')}}">
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
