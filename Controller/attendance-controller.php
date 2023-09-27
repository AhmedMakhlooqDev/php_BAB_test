<?php

include '../database.php';
$user_id = $_SESSION["user_id"];

//==========================================HANDLE CHECK IN =============================================================

if (isset($_POST['checkin'])) {

    //VALIDATION TO MAKE SURE THE USER DOES NOT CHECK IN MULTIPLE TIMES A DAY
    $validateCheckin = $mysqli->prepare("SELECT user_id FROM `attendance` WHERE user_id = ? AND DATE(check_in_time) = CURDATE()");
    $validateCheckin->bind_param("i", $user_id);
    $validateCheckin->execute();
    $validateCheckin->store_result();

    //IF THE QUERYY HAS RETURNED RESULTS SHOW ALERT.
    if ($validateCheckin->num_rows() > 0) {
        $alertMessage = '<div class="alert alert-danger" role="alert">
                You have already checked in.
                </div>';
    } else {
        //=============DEBUG DATABASE CONNECTION===========================
        // if ($mysqli->connect_error) {
        //     die("Connection failed: " . $mysqli->connect_error);
        // }

        $sqlQuery = $mysqli->prepare("INSERT INTO `attendance` (user_id, date, check_in_time) VALUES (?, NOW(), NOW())");

        //=============DEBUG QUERY===========================
        // if (!$sqlQuery) {
        //     die("Error in prepare statement: " . $mysqli->error);
        // }

        $sqlQuery->bind_param("i", $user_id);

        //on successful excecution display success alert
        if ($sqlQuery->execute()) {
            $alertMessage = '<div class="alert alert-success" role="alert">
            You have successfuly checked in.
            </div>';
        } else {
            echo (mysqli_error($mysqli));
        }
        $sqlQuery->close();
    }
}








//==========================================HANDLE CHECKOUT================================================= 

if (isset($_POST['checkout'])) {

    //VALIDATE THAT THE USER IS CHECKED IN
    $validateCheckOut = $mysqli->prepare("SELECT user_id FROM `attendance` WHERE user_id = ? AND DATE(check_in_time) = CURDATE() AND check_out_time IS NULL");
    $validateCheckOut->bind_param("i", $user_id);
    $validateCheckOut->execute();
    $validateCheckOut->store_result();

    //IF THE QUERYY HAS RETURNED RESULTS SHOW ALERT.
    if ($validateCheckOut->num_rows() > 0) {

        //=============DEBUG DATABASE CONNECTION===========================
        // if ($mysqli->connect_error) {
        //     die("Connection failed: " . $mysqli->connect_error);
        // }


        $sqlQuery = $mysqli->prepare("UPDATE `attendance` SET check_out_time = NOW() WHERE user_id = ? AND check_out_time IS NULL");

        //=============DEBUG QUERY===========================
        // if (!$sqlQuery) {
        //     die("Error in prepare statement: " . $mysqli->error);
        // }

        $sqlQuery->bind_param("i", $user_id);


        if ($sqlQuery->execute()) {
            $alertMessage = '<div class="alert alert-success" role="alert">
                    You have successfuly checked out.
                </div>';
        } else {
            echo (mysqli_error($mysqli));
        }
        $sqlQuery->close();
    } else if ($validateCheckOut->num_rows() == 0){

        $alertMessage = '<div class="alert alert-danger" role="alert">
                You are already checked out.
                </div>';
    }
   
}
