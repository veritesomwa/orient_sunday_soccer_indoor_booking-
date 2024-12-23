<?php 
session_start();
$getPosistion = strpos($_SESSION['user_email'], "@");
$username = substr($_SESSION['user_email'], 0, $getPosistion);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts | Indoor Soccer Booking</title>
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
        .contact-info {
            background-color: #007bff;
            color: #fff;
            padding: 30px;
            border-radius: 10px;
        }
        .contact-info h4 {
            margin-bottom: 15px;
        }
        .form-control, .btn {
            border-radius: 0.5rem;
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
    <li class="item"><a class="activepage" href="">Contacts</a></li>
    <li class="item"><a href="about.php">About</a></li>
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
        <h1>Contact Us</h1>
        <p>We’re here to help! Get in touch with us for bookings, inquiries, or feedback.</p>
    </div>

    <!-- Contact Information Section -->
    <div class="container my-5">
        <div class="row g-4">
            <!-- Contact Info -->
            <div class="col-md-6">
                <div class="contact-info">
                    <h4>Our Location</h4>
                    <p>49 M L Sultan Rd, Greyville, Durban, 4001, South Africa</p>
                    <h4>Phone</h4>
                    <p><a href="tel:+27313091450" class="text-white">+27313091450</a></p>
                    <h4>Email</h4>
                    <p><a href="mailto:info@soccerbooking.com" class="text-white">info@soccerbooking.com</a></p>
                    <h4>Opening Hours</h4>
                    <p>Sundays Only: 17:30 PM - 21:30 PM</p>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-6">
                <h3>Send Us a Message</h3>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
                        <label class="form-label text-danger"><?php if (isset($nameError)) echo $nameError; ?></label>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                        <label class="form-label text-danger"><?php if (isset($emailError)) echo $emailError; ?></label>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" name="message" id="message" rows="5" placeholder="Your message here..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" name="submit">Send Message</button><br>
                    <div class="form-label text-danger"><?php if (isset($nameError)) echo $nameError; ?></div>
                    <br>
                </form>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="container my-5">
        <h3 class="text-center mb-4">Find Us Here</h3>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe 
                class="embed-responsive-item" 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509292!2d144.9554318153166!3d-37.81720997975171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf5772bff1b602b91!2sFederation%20Square!5e0!3m2!1sen!2sus!4v1615931869567!5m2!1sen!2sus" 
                width="100%" 
                height="400" 
                style="border:0;" 
                allowfullscreen=""
                title="Google Maps"
                loading="lazy">
            </iframe>
        </div>
    </div>



    <?php

function validateName($Name) {
    // Check if the name is alphabetic and has a maximum length of 50 characters
    if (preg_match('/^[a-zA-Z\s]{1,50}$/', $Name)) {
      return true; // Valid name
    } else {
      return false; // Invalid name
    }
  }


if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $err = 0;

    // Validate the name
    if(validateName(!$name)) {
        $err += 1;
        $nameError = "Invalid name format. Name should only contain alphabetic characters and have a maximum length of 50 characters.";
    }

    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format.";
        $err +=1;
    }

    if($err < 1){
        // Email details
        $to = "veritesomwa@gmail.com"; 
        $subject = "New Contact Form Message from $name";
        $body = "
            Name: $name\n
            Email: $email\n
            Message:\n$message
        ";
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Send email
        if (mail($to, $subject, $body, $headers)) {
            echo "<script>alert('Message sent successfully.')</script>";
        } else {
            echo "<script>alert('Failed to send message. Please try again.')</script>";
        }
    }else{
        echo "<script>alert('what up')</script>";
    }

    
}
?>

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