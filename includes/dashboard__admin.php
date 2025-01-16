
<style>
    #navBar{
        position: fixed;
        top:0;
        width: 100%;
    }

</style>
<?php 

$getPosistion = strpos($_SESSION['user_email'], "@");
$username = substr($_SESSION['user_email'], 0, $getPosistion);

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


<section class="vh-100" id="containers">
        <div class="h-custom">
        <!-- <a href="includes/logout.php"><button class="btn btn-primary">Sign Out</button></a> -->

        <div style="height:100px">

        </div>

        <div id="adminContainer" class="container">
            
            <br>
            
            <div id="booking">
                <h1>Bookings</h1>

                <?php 
                // Function to check existing bookings
                function checkExistingBooking($conn, $id, $intime){
                    $query = "SELECT * FROM `bookings` WHERE `user_id`='".$id."' AND `in_time`='".$intime."'";
                    $result = mysqli_query($conn, $query);
                    if($num_rows = mysqli_num_rows($result) == 0){
                    return false;
                    }else{
                    return true;
                    }
                }

                    

                ?>

                <div class="table-responsive">

                <center><h2>Booking for 6pm - 7pm</h2></center>
                <table class="table table-info table-striped table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Number</th>
                        <th scope="col">Revoke Booking</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php

                        $query = "SELECT * FROM users, bookings WHERE users.user_id = bookings.user_id AND bookings.booked='true' AND bookings.in_time='18:00:00'";
                        $query_run = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($query_run)){
                            
                            ?>
                                <tr class="<?php if ($row['user_id'] == $_SESSION['user_id']) {echo "table-success";}?>">
                                    <th scope="row"><?php echo $row['user_id']?></th>
                                    <td><?php echo $row['user_firstname']?></td>
                                    <td class="activate"><?php echo $row['user_lastname']?></td>
                                    <td class="activate"><?php echo $row['user_email']?></td>
                                    <td><?php echo $row['user_number']?></td>
                                    <?php 
                                    if($row['privilege'] == "user"){
                                        ?>
                                        <td><form action="" method="post"><button class="btn btn-danger" type="submit" name="user<?php echo $row['user_id'] ?>67">✕</button></form></td>
                                        <?php
                                    }
                                        ?>

                                        <!-- Handle Revoke booking -->
                                        <?php 
                                        
                                        if (isset($_POST['user'.$row['user_id']."67"])){
                                            
                                            // remove booking for user

                                            $sql_del = "DELETE FROM `bookings` WHERE user_id='". $row['user_id']."' AND `in_time`='18:00:00'";
                                            $sql_del_run = mysqli_query($conn, $sql_del);
                                            echo "<script>alert('User Booking Revoked successfully')</script>";
                                            header('location: index.php');
                                
                                        }
                                    
                                    ?>
                                </tr>
                            <?php
                        }
                    
                    ?>
                        
                    </tbody>

                <table>
                    <br>
                <center><h2>Booking for 7pm - 8pm</h2></center>
                <table class="table table-success table-striped table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Number</th>
                        <th scope="col">Revoke Booking</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php

                        $query = "SELECT * FROM users, bookings WHERE users.user_id = bookings.user_id AND bookings.booked='true' AND bookings.in_time='19:00:00'";
                        $query_run = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($query_run)){
                            
                            ?>
                                <tr class="<?php if ($row['user_id'] == $_SESSION['user_id']) {echo "table-success";}?>">
                                    <th scope="row"><?php echo $row['user_id']?></th>
                                    <td><?php echo $row['user_firstname']?></td>
                                    <td class="activate"><?php echo $row['user_lastname']?></td>
                                    <td class="activate"><?php echo $row['user_email']?></td>
                                    <td><?php echo $row['user_number']?></td>

                                    <?php 
                                    if($row['privilege'] == "user"){
                                        ?>
                                        <td><form action="" method="post"><button class="btn btn-danger" type="submit" name="user<?php echo $row['user_id'] ?>78">✕</button></form></td>
                                        <?php
                                    }
                                        ?>

                                        <!-- Handle Revoke booking -->
                                        <?php 
                                        
                                        if (isset($_POST['user'.$row['user_id']."78"])){
                                            
                                            // remove booking for user

                                            $sql_del = "DELETE FROM `bookings` WHERE user_id='". $row['user_id']."' AND `in_time`='19:00:00'";
                                            $sql_del_run = mysqli_query($conn, $sql_del);
                                            echo "<script>alert('User Booking Revoked successfully')</script>";
                                            header('location: index.php');
                                
                                        }
                                    
                                    ?>
                                </tr>
                            <?php
                        }
                    
                    ?>
                        
                    </tbody>

                <table>

                <br>

                <center><h2>Booking for 8pm - 9pm</h2></center>
                <table class="table table-dark table-striped table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Number</th>
                        <th scope="col">Revoke Booking</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php

                        $query = "SELECT * FROM users, bookings WHERE users.user_id = bookings.user_id AND bookings.booked='true' AND bookings.in_time='20:00:00'";
                        $query_run = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($query_run)){
                            
                            ?>
                                <tr class="<?php if ($row['user_id'] == $_SESSION['user_id']) {echo "table-success";}?>">
                                    <th scope="row"><?php echo $row['user_id']?></th>
                                    <td><?php echo $row['user_firstname']?></td>
                                    <td class="activate"><?php echo $row['user_lastname']?></td>
                                    <td class="activate"><?php echo $row['user_email']?></td>
                                    <td><?php echo $row['user_number']?></td>
                                    <?php 
                                    if($row['privilege'] == "user"){
                                        ?>
                                        <td><form action="" method="post"><button class="btn btn-danger" type="submit" name="user<?php echo $row['user_id'] ?>89">✕</button></form></td>
                                        <?php
                                    }
                                ?>

                                 <!-- Handle Revoke booking -->
                                <?php 
                                
                                if (isset($_POST['user'.$row['user_id']."89"])){
                                    
                                    // remove booking for user

                                    $sql_del = "DELETE FROM `bookings` WHERE user_id='". $row['user_id']."' AND `in_time`='20:00:00'";
                                    $sql_del_run = mysqli_query($conn, $sql_del);
                                    echo "<script>alert('User Booking Revoked successfully')</script>";
                                    header('location: index.php');
                        
                                }
                            
                            ?>
                                </tr>
                            <?php
                        }
                    
                    ?>
                        
                    </tbody>

                <table>
                </div>


                </div>
            </div>
        
        
        <div id="members" class="container">
            <br>
            <h1>Members</h1>


            <div class="table-responsive">
            <table class="table table-light table-striped table-bordered">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Number</th>
                    <th scope="col">Privilege</th>
                    <th scope="col">Delete User</th>
                    </tr>
                </thead>
                <tbody>

                <?php
            
                    $query = "SELECT * FROM users";
                    $query_run = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($query_run)){
                        
                        ?>
                            <tr class="<?php if ($row['user_id'] == $_SESSION['user_id']) {echo "table-success";}?>">
                                <th scope="row"><?php echo $row['user_id']?></th>
                                <td><?php echo $row['user_firstname']?></td>
                                <td class="activate"><?php echo $row['user_lastname']?></td>
                                <td class="activate"><?php echo $row['user_email']?></td>
                                <td><?php echo $row['user_number']?></td>
                                <?php echo "<td>".$row["privilege"]."</td>"?>

                                <?php 
                                    if($row['privilege'] == "user"){
                                        ?>
                                        <td><form action="" method="post"><button class="btn btn-danger" type="submit" name="user<?php echo $row['user_id'] ?>">✕</button></form></td>
                                        <?php
                                    }
                                ?>

                                 <!-- Handle delete -->
                                <?php 
                                
                                if (isset($_POST['user'.$row['user_id']])){
                                    
                                    $id = $row['user_id'];
                                    $sql_delete = "DELETE FROM users WHERE user_id = $id";
                                    $sql_delete_run = mysqli_query($conn, $sql_delete);
                                    if($sql_delete_run){
                                        echo "<script>alert('User deleted successfully')</script>";
                                        header('location: index.php');
                                    }
                                }
                            
                            ?>
                                
                            </tr>
                        <?php
                    }
                
                ?>
                    
                </tbody>
            </table>
           
            </div>
            
        </div>

        </div>

<nav id="navBar">

<ul class="menu">
<li class="logo"><a href="<?php echo $SERVER['HTTP_REFERER']?>"><img class="banner" src="includes/images/icons/favicon.ico" alt="bigwordalert" width="80" height="80"></a></li>
    <li class="item"><a href="#bookings">Bookings</a></li>
    <li class="item"><a href="#members">Members</a></li>
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
    
    

        

        
    </section>
    


<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>