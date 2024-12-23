
<style>
    #navBar{
        position: fixed;
        top:0;
        width: 100%;
    }
    body{
        background-image: url("includes/images/Untitled-1344-x-896-px.png");
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
<?php 
$getPosistion = strpos($_SESSION['user_email'], "@");
$username = substr($_SESSION['user_email'], 0, $getPosistion);

function checkExistingBooking($conn, $userid, $intime){
    $query = "SELECT * FROM `bookings` WHERE user_id='".$userid."' AND `booked`='true' AND `in_time`='".$intime."'";
    if ($query_run = mysqli_query($conn, $query)){
        if ($num_rows = mysqli_num_rows($query_run) > 0){
            return true;
        }else{
            return false;
        }
    }
}

function revokeBooking($conn, $userid, $intime){
    $query = "DELETE from `bookings` WHERE booked='true' AND user_id='".$userid."' AND `in_time`='".$intime."'";
    if ($query_run = mysqli_query($conn, $query)){
        return true;
    }else{
        return false;
    }
}

function getNumberOfBookedUsers($conn, $intime){
    $query = "SELECT COUNT(*) as count FROM `bookings` WHERE `in_time`='".$intime."' AND `booked`='true'";
    if ($query_run = mysqli_query($conn, $query)){
        $row = mysqli_fetch_assoc($query_run);
        return $row['count'];
    }
}

if(isset($_POST['revoke67'])){
    revokeBooking($conn, $_SESSION['user_id'], '18:00:00');
}
if(isset($_POST['revoke78'])){
    revokeBooking($conn, $_SESSION['user_id'], '19:00:00');
}
if(isset($_POST['revoke89'])){
    revokeBooking($conn, $_SESSION['user_id'], '20:00:00');
}

if(isset($_POST['book67'])){

    if (checkExistingBooking($conn, $_SESSION['user_id'], "18:00:00")){
        $msgBook = "You are already booked.";
        ?><script>alert("You are already booked.")</script><?php
    }else{
        $sql_book = "INSERT INTO `bookings` (user_id, booked, in_time, out_time) VALUES ('".$_SESSION['user_id']."', 'true', '18:00:00', '19:00:00')";
        $sql_book_run = mysqli_query($conn, $sql_book);
        if($sql_book_run){
        ?><script>alert("Booking successful. Check your email for booking details.")</script><?php
        }else{
        ?><script>alert("Failed to book. Please try again.")</script><?php
        }
    }

}

if(isset($_POST['book78'])){
    if (checkExistingBooking($conn, $_SESSION['user_id'],"19:00:00")){
        $msgBook = "You are already booked.";
        ?><script>alert("You are already booked.")</script><?php
    }else{
        $sql_book = "INSERT INTO `bookings` (user_id, booked, in_time, out_time) VALUES ('".$_SESSION['user_id']."', 'true', '19:00:00', '20:00:00')";
        $sql_book_run = mysqli_query($conn, $sql_book);
        if($sql_book_run){
        ?><script>alert("Booking successful. Check your email for booking details.")</script><?php
        }else{
        ?><script>alert("Failed to book. Please try again.")</script><?php
        }
    }
}

if(isset($_POST['book89'])){
    if (checkExistingBooking($conn, $_SESSION['user_id'],"20:00:00")){
        $msgBook = "You are already booked.";
        ?><script>alert("You are already booked.")</script><?php
    }else{
        $sql_book = "INSERT INTO `bookings` (user_id, booked, in_time, out_time) VALUES ('".$_SESSION['user_id']."', 'true', '20:00:00', '21:00:00')";
        $sql_book_run = mysqli_query($conn, $sql_book);
        if($sql_book_run){
        ?><script>alert("Booking successful. Check your email for booking details.")</script><?php
        }else{
        ?><script>alert("Failed to book. Please try again.")</script><?php
        }
    }
}

?>
    
    <script>

  $(function(){
    $(".toggle").on("click", function(){
      if($(".item").hasClass("active")){
        $(".item").removeClass("active");
      }else{
        $(".item").addClass("active");
      }
    });
  });
    </script>

    
    <section id="container" class="vh-100">
        <div class="h-custom">
        <!-- <a href="includes/logout.php"><button class="btn btn-primary">Sign Out</button></a> -->
        <div class="container my-5">
        <h1 class="text-center mb-4" style="color:#FF5733;background:#333;box-shadow:0px 3px 8px rgba(0,0,0,0.24)">Orient Sunday Soccer Game Booking</h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            <!-- Card 1 -->
             <?php 
                if(checkExistingBooking($conn, $_SESSION['user_id'],"18:00:00")){

                    ?>
                        <div class="col">
                        <div style="opacity:.6" class="card h-100 bg-secondary text-white" style="width: 100%;">
                            <img src="includes/images/19-Lamine-M.webp" class="card-img-top" alt="Soccer field">
                            <div class="card-body">
                                <div style="font-size:70px">BOOKED</div>
                                <h5 class="card-title">6:00 PM - 7:00 PM</h5>
                                <p class="card-text">Book your soccer game during this time slot.
                                The Hourly price will be distributed amongst the people who book.</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Day: Sunday</li>
                                <li class="list-group-item">Price: R300 an hour</li>
                                <li class="list-group-item">Number of Members booked:
                                    <?php
                                        $booked_users = getNumberOfBookedUsers($conn, "18:00:00");
                                        echo $booked_users;
                                    ?>
                                </li>
                                <li class="list-group-item">Amount to pay: R <?php if($booked_users == 0){echo "300";}else{echo 300/$booked_users;} ?></li>
                            </ul>
                            <div class="card-body text-center">
                                <form action="" method="post">
                                    <button type="submit" name="book67" class="btn disabled btn-primary w-100">Book Now</button>
                                </form>
                                
                            </div>
                        </div>
                        <form action="" method="POST"><button style="width:100%" name="revoke67" class="btn btn-danger" type="submit">Revoke Booking</button></form>
                    </div>
                    <?php
                }else{
             ?>
            <div class="col">
                <div class="card h-100" style="width: 100%;">
                    <img src="includes/images/19-Lamine-M.webp" class="card-img-top" alt="Soccer field">
                    <div class="card-body">
                        <h5 class="card-title">6:00 PM - 7:00 PM</h5>
                        <p class="card-text">Book your soccer game during this time slot.
                        The Hourly price will be distributed amongst the people who book.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Day: Sunday</li>
                        <li class="list-group-item">Price: R300 an hour</li>
                        <li class="list-group-item">Number of Members booked:
                            <?php
                                $booked_users = getNumberOfBookedUsers($conn, "18:00:00");
                                echo $booked_users;
                            ?>
                        </li>
                        <li class="list-group-item">Amount to pay: R <?php if($booked_users == 0){echo "300";}else{echo 300/$booked_users;} ?></li>
                    </ul>
                    <div class="card-body text-center">
                        <form action="" method="post">
                            <button type="submit" name="book67" class="btn btn-primary w-100">Book Now</button>
                        </form>
                        
                    </div>
                </div>
            </div><?php } ?>
            <!-- Card 2 -->
            <?php 
                if(checkExistingBooking($conn, $_SESSION['user_id'],"19:00:00")){

                    ?>
                        <div class="col">
                        <div style="opacity:.6" class="card h-100 bg-secondary text-white" style="width: 100%;">
                            <img src="includes/images/ronaldo.webp" class="card-img-top" alt="Soccer field">
                            <div class="card-body">
                                <div style="font-size:70px">BOOKED</div>
                                <h5 class="card-title">7:00 PM - 8:00 PM</h5>
                                <p class="card-text">Book your soccer game during this time slot.
                                The Hourly price will be distributed amongst the people who book.</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Day: Sunday</li>
                                <li class="list-group-item">Price: R300 an hour</li>
                                <li class="list-group-item">Number of Members booked:
                                    <?php
                                        $booked_users = getNumberOfBookedUsers($conn, "19:00:00");
                                        echo $booked_users;
                                    ?>
                                </li>
                                <li class="list-group-item">Amount to pay: R <?php if($booked_users == 0){echo "300";}else{echo 300/$booked_users;} ?></li>
                            </ul>
                            <div class="card-body text-center">
                                <form action="" method="post">
                                    <button type="submit" name="book78" class="btn disabled btn-primary w-100">Book Now</button>
                                </form>
                                
                            </div>
                            
                        </div>
                        <form action="" method="POST"><button style="width:100%" name="revoke78" class="btn btn-danger" type="submit">Revoke Booking</button></form>
                    </div><br><br>

                    <?php
                }else{
             ?>
            <div class="col">
                <div class="card h-100" style="width: 100%;">
                    <img src="includes/images/ronaldo.webp" class="card-img-top" alt="Soccer field">
                    <div class="card-body">
                        <h5 class="card-title">7:00 PM - 8:00 PM</h5>
                        <p class="card-text">Book your soccer game during this time slot.
                        The Hourly price will be distributed amongst the people who book.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Day: Sunday</li>
                        <li class="list-group-item">Price: R300 an hour</li>
                        <li class="list-group-item">Number of Members booked:
                            <?php
                                $booked_users = getNumberOfBookedUsers($conn, "19:00:00");
                                echo $booked_users;
                            ?>
                        </li>
                        <li class="list-group-item">Amount to pay: R <?php if($booked_users == 0){echo "300";}else{echo 300/$booked_users;} ?></li>
                    </ul>
                    <div class="card-body text-center">
                        <form action="" method="post">
                            <button type="submit" name="book78" class="btn btn-primary w-100">Book Now</button>
                        </form>
                        
                    </div>
                </div>
            </div><?php } ?>
            <!-- Card 3 -->
            <?php 
                if(checkExistingBooking($conn, $_SESSION['user_id'],"20:00:00")){

                    ?>
                        <div class="col">
                        <div style="opacity:.6" class="card h-100 bg-secondary text-white" style="width: 100%;">
                            <img src="includes/images/messi.webp" class="card-img-top" alt="Soccer field">
                            <div class="card-body">
                                <div style="font-size:70px">BOOKED</div>
                                <h5 class="card-title">8:00 PM - 9:00 PM</h5>
                                <p class="card-text">Book your soccer game during this time slot.
                                The Hourly price will be distributed amongst the people who book.</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Day: Sunday</li>
                                <li class="list-group-item">Price: R300 an hour</li>
                                <li class="list-group-item">Number of Members booked:
                                    <?php
                                        $booked_users = getNumberOfBookedUsers($conn, "20:00:00");
                                        echo $booked_users;
                                    ?>
                                </li>
                                <li class="list-group-item">Amount to pay: R <?php if($booked_users == 0){echo "300";}else{echo 300/$booked_users;} ?></li>
                            </ul>
                            <div class="card-body text-center">
                                <form action="" method="post">
                                    <button type="submit" name="book89" class="btn disabled btn-primary w-100">Book Now</button>
                                </form>
                                
                            </div>
                        </div>
                        <form action="" method="POST"><button style="width:100%" name="revoke89" class="btn btn-danger" type="submit">Revoke Booking</button></form>
                    </div>
                    <br><br>
                    <?php
                }else{
             ?>
            <div class="col">
                <div class="card h-100" style="width: 100%;">
                    <img src="includes/images/messi.webp" class="card-img-top" alt="Soccer field">
                    <div class="card-body">
                        <h5 class="card-title">8:00 PM - 9:00 PM</h5>
                        <p class="card-text">Book your soccer game during this time slot.
                        The Hourly price will be distributed amongst the people who book.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Day: Sunday</li>
                        <li class="list-group-item">Price: R300 an hour</li>
                        <li class="list-group-item">Number of Members booked:
                            <?php
                                $booked_users = getNumberOfBookedUsers($conn, "20:00:00");
                                echo $booked_users;
                            ?>
                        </li>
                        <li class="list-group-item">Amount to pay: R <?php if($booked_users == 0){echo "300";}else{echo 300/$booked_users;} ?></li>
                    </ul>
                    <div class="card-body text-center">
                        <form action="" method="post">
                            <button type="submit" name="book89" class="btn btn-primary w-100">Book Now</button>
                        </form>
                        
                    </div>
                </div>
            </div><?php } ?>
        </div>
                
    </div>
        <nav id="navBar">

            <ul class="menu">
                <li class="logo"><a href="<?php echo $SERVER['HTTP_REFERER']?>"><img class="banner" src="includes/images/icons/favicon.ico" alt="bigwordalert" width="80" height="80"></a></li>
                <li class="item"><a class="activepage" href="#bookings">Bookings</a></li>
                <li class="item"><a href="includes/contacts.php">Contacts</a></li>
                <li class="item"><a href="includes/about.php">About</a></li>
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