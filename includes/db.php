<?php 

$host = "localhost";
$user = "root";
$password = "";
$db_name = "orient_bookings";


$conn = mysqli_connect($host, $user, $password, $db_name);

if (!mysqli_errno($conn)){
    
}else{
    echo "not connected";
}


?>