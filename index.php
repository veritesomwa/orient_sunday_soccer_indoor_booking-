<?php 
require "includes/db.php";
require "includes/server.php";

include "includes/header.php"
;
if (isset($_SESSION['user_id']) & !empty($_SESSION['user_id'])){
    if ($_SESSION['privilege'] == "admin"){
        include "includes/dashboard__admin.php";
    }else if ($_SESSION['privilege'] == "user"){
        include "includes/dashboard.php";
    }

    
}else{
    include "includes/login.php";
}

?>