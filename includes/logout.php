
<?php 
require 'server.php';
// destroys the session
session_destroy();
header("Location: ../index.php");

?>