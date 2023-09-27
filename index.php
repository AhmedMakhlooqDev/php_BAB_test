<?php
session_start();
if(isset($_SESSION['user_id'])){
    header("Location: ./interface/dashboard.php");
}
else{
    header("Location: ./interface/login.php");
}

?>