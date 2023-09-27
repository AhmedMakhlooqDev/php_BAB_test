<?php

include '../database.php';

//users that are not logged in and users who do not have admin priveleges are not allowed to view this page
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: ../interface/access-denied.php"); // Redirect to an access denied page
    exit();
}

if (isset($_POST['submit'])) {

    $userid = $_POST['user_id'];
    $date = $_POST['date'];

    //SQL query
    $sqlQueryStr = "SELECT u.user_id, u.username, u.role, a.date, TIME(a.check_in_time) AS check_in, TIME(a.check_out_time) AS check_out,
    HOUR(TIMEDIFF(a.check_in_time, a.check_out_time)) AS total_hours
    FROM users u
    LEFT JOIN attendance a ON u.user_id = a.user_id
    WHERE a.date = ?
    ";

    // if the admin put a value in the user id, concatenate the strings to have the user id.
    if (!empty($userid)) {
        $sqlQueryStr .= " AND u.user_id = ?";
    }

    //prapare query for excecution
    $sqlQuery = $mysqli->prepare($sqlQueryStr);

    //bind the parameters according to the user id being empty or not
    if (!empty($userid)) {
        $sqlQuery->bind_param("si", $date, $userid);
    } else {
        $sqlQuery->bind_param("s", $date);
    }

    $sqlQuery->execute();
    $search_results = $sqlQuery->get_result();
}

?>