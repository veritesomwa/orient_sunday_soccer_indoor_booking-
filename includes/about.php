<?php 
session_start();
$getPosistion = strpos($_SESSION['user_email'], "@");
$username = substr($_SESSION['user_email'], 0, $getPosistion);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Indoor Soccer Booking</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cd1fac6b09.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link href="../main.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .hero {
            background: linear-gradient(to right, #ff5733, #ff5799) no-repeat center/cover;
            color: #fff;
            padding: 100px 20px;
            text-align: center;
        }
        .hero h1 {
            font-size: 3rem;
        }
        .hero p {
            font-size: 1.2rem;
        }
        .feature-icon {
            font-size: 2rem;
            color: #007bff;
        }
    </style>
    <style>
    #navBar{
        position: fixed;
        top:0;
        width: 100%;
    }
    body{
        /* background-image: url("includes/images/Untitled-1344-x-896-px.png"); */
    }

    .card{
        /* border-radius: 20px; */
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
        padding: 30px;
        margin-bottom: 20px;
    }

    @media (max-width: 450px) {
        body{
            /* background-image: url("includes/images/indoor-soccer-mobile.jpeg"); */
        }
    }
</style>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

<style>
    .divider:after,
    .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
    }
    .h-custom {
    min-height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
    .h-custom {
    min-height: 100%;
    }
    }
</style>
<nav id="navBar">

<ul class="menu">
    <li class="logo"><a href="<?php echo $SERVER['HTTP_REFERER']?>"><img class="banner" src="images/icons/favicon.ico" alt="bigwordalert" width="80" height="80"></a></li>
    <li class="item"><a href="../">Bookings</a></li>
    <li class="item"><a href="contacts.php">Contacts</a></li>
    <li class="item"><a class="activepage" href="">About</a></li>
    <!-- <li class="item"><a href="#">Services</a></li> -->
    <div class="dropdown button item">
        <a href="#" id="dropdown-link" class="dropdown-toggle" data-bs-toggle="dropdown"><?php echo $username;?></a>
        <div class="dropdown-menu">
            <a href="includes/logout.php" class="dropdown-item">Log Out</a>
        </div>
    </div>
    <!-- <li class="item button secondary"><a href="#" class="fab fa-add" style="font-size:20px"></a></li> -->
    <li class="toggle"><span class="bars"></span></li>
</ul>

</nav>
<div style="height:100px">

</div>

    <!-- Hero Section -->
    <div class="hero">
        <h1>About Us</h1>
        <p>Your home for the best indoor soccer experience</p>
    </div>

    <!-- About Indoor Soccer Section -->
    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>What We Offer</h2>
                <p>
                    Welcome to the ultimate indoor soccer experience! Our facility is designed to provide players of all ages and skill levels with a fun, safe, and exciting environment to enjoy the beautiful game. Whether you're looking to book a match with friends, join a league, or host a special event, we've got you covered.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="images/grass.jpg" class="img-fluid rounded" alt="Indoor Soccer Action">
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Why Choose Our Facility?</h2>
        <div class="row text-center g-4">
            <div class="col-md-4">
                <div class="feature-icon">
                    <i class="bi bi-trophy-fill"></i>
                </div>
                <h4>State-of-the-Art Fields</h4>
                <p>Play on high-quality turf fields designed for optimal performance and safety.</p>
            </div>
            <div class="col-md-4">
                <div class="feature-icon">
                    <i class="bi bi-people-fill"></i>
                </div>
                <h4>Community</h4>
                <p>Join a welcoming and vibrant community of soccer enthusiasts.</p>
            </div>
            <div class="col-md-4">
                <div class="feature-icon">
                    <i class="bi bi-clock-fill"></i>
                </div>
                <h4>Flexible Scheduling</h4>
                <p>Easily book your preferred time slots with our simple scheduling system.</p>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="text-center py-5" style="background-color: #007bff; color: white;">
        <h3>Ready to Play?</h3>
        <p>Book your game now and enjoy the best indoor soccer experience in town!</p>
        <a href="../" class="btn btn-light btn-lg">Book Now</a>
    </div>




<div
class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-dark">
<!-- Copyright -->
<div class="text-white mb-3 mb-md-0">
Copyright © 2023. otangobaby. All rights reserved.
</div>
<!-- Copyright -->

<!-- Right -->
<div>
<a href="#!" class="text-white me-4">
    <i class="fab fa-facebook-f"></i>
</a>
<a href="#!" class="text-white me-4">
    <i class="fab fa-twitter"></i>
</a>
<a href="#!" class="text-white me-4">
    <i class="fab fa-google"></i>
</a>
<a href="#!" class="text-white">
    <i class="fab fa-linkedin-in"></i>
</a>
</div>
<!-- Right -->
</div>
</section>


<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>