<?php

include '../database.php';

//to bind the user_id with the queries below
$user_id = $_SESSION["user_id"];

// retrieve logged in employee data
$employee_query = $mysqli->prepare("SELECT * FROM `users` WHERE user_id = ?");
$employee_query->bind_param("i", $user_id);
$employee_query->execute();
$employee_result = $employee_query->get_result();


// retrieve logged in employee attendance data
$attendance_query = $mysqli->prepare("SELECT *, TIME(check_in_time) AS check_in_time_converted, TIME(check_out_time) AS check_out_time_converted FROM `attendance` WHERE user_id = ?");
$attendance_query->bind_param("i", $user_id);
$attendance_query->execute();
$attendance_result = $attendance_query->get_result();


?>