<?php


//database credentials
$host = "localhost";
$dbname = "bab_employee_attendance_system";
$username = "root";
$password = "";

//MYSQLI initiation
$mysqli = new mysqli(hostname: $host, 
                    username: $username, 
                    password: $password,
                    database: $dbname);

// check for database establishment errors

if($mysqli->connect_errno){
    die("Connection Error: " . $mysqli->connect_error);
}
elseif($mysqli){
    echo "connection successful";
}

return $mysqli;