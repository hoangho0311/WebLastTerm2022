<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookCar</title>
    <link rel="icon"  href="/image/logo.png">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link href="https://fonts.gstatic.com" rel="preconnect">
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
  <div class="loader">
 </div>  
  <nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="/image/logo.png" alt="">
        </div>

        <span class="logo_name">BookCar</span>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="{{route("dashboard")}}">
                <i class="uil uil-estate"></i>
                <span class="link-name">Dahsboard</span>
            </a></li>
            <li><a href="{{ route("sellcar") }}">
                <i class="uil uil-files-landscapes"></i>
                <span class="link-name">Car</span>
            </a></li>
            <li><a href="{{route("analytics")}}">
                <i class="uil uil-chart"></i>
                <span class="link-name">Analytics</span>
            </a></li>
            <li><a href="{{route("profile")}}">
                <i class="fa-regular fa-user"></i>
                <span class="link-name">Profile</span>
            </a></li>
            <li><a href="{{route("commentpage")}}">
                <i class="uil uil-comments"></i>
                <span class="link-name">Comment</span>
            </a></li>
            <li><a href="{{route("details")}}">
                <i class="fa-solid fa-charging-station"></i>
                <span class="link-name">Test drive</span>
            </a></li>
            <li><a href="#">
                <i class="uil uil-share"></i>
                <span class="link-name">Share</span>
            </a></li>
        </ul>
        
        <ul class="logout-mode">
            <li><a href="{{route("logout")}}">
                <i class="uil uil-signout"></i>
                <span class="link-name">Logout</span>
            </a></li>

            <li class="mode">
                <a href="#">
                    <i class="uil uil-moon"></i>
                <span class="link-name">Dark Mode</span>
            </a>

            <div class="mode-toggle">
              <span class="switch"></span>
            </div>
        </li>
        </ul>
    </div>
</nav>

<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>

        <div class="search-box">
            <i class="uil uil-search"></i>
            <input type="text" placeholder="Search here...">
        </div>
        
        <div class="dropdown">
            <button class="dropbtn" ><img src="/image/avater.jpg" alt=""></button>
            <div class="dropdown-content" id="myDropdown">
                <a href="#"><div class="section">
                    <img src="/image/avater.jpg">
                    <h3>name</h3>
                </div>
                </a>
                <hr class="dropdown-divider">
                <a href="{{route("profile")}}"><i class="fa-regular fa-user"></i>
                    <span class="link-name">Profile</span></a>
                <a href="{{route("analytics")}}"><i class="fa-solid fa-chart-line"></i>
                    <span class="link-name">Dashboard</span></a>
                <a href="#"><i class="fa-solid fa-sliders"></i>
                    <span class="link-name">Setting</span></a>
                <hr class="dropdown-divider">
                <a href="{{route("logout")}}"><i class="uil uil-signout"></i>
                <span class="link-name">Logout</span></a>
            </div>

        </div> 
        
    </div>
    
    @yield('content')

    
    
</section>        

<script src="/js/analys.js"></script>
<script src="/js/main.js"></script>
</body>
</html>