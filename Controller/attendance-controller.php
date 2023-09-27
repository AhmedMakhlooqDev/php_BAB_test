<?php

include '../database.php';
$user_id = $_SESSION["user_id"];
//if user is checking in:============================================

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

if (isset($_POST['checkout'])) {


    
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
        echo 'you have successfully checked out';
    } else {
        echo (mysqli_error($mysqli));
    }
    $sqlQuery->close();
}

?>