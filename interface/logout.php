<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

unset($_SESSION["loggedin"]);
unset($_SESSION["email"]);

session_start();
session_unset();
session_destroy();
header("location: login.php");