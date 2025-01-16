<?php 

$host = "localhost";
$user = "root";
$password = "";
$db_name = "orient_bookings";

// Making connections to the database and storing it in the variable $conn
$conn = mysqli_connect($host, $user, $password, $db_name);

if (!mysqli_errno($conn)){
    
}else{
    echo "not connected";
}


?>