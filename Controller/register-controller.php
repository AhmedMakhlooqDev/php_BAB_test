<?php

include '../database.php';

//if the submit button has been clicked
if (isset($_POST['submit'])) {

    //declare inout variables
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $role = $_POST['role'];

    // validate if the fields are empty
    if (empty($name) || empty($email) || empty($password) || empty($number) || empty($role)) {
        $alertMessage = '<div class="alert alert-danger" role="alert">
            Please fill in all fields.
        </div>';
    } else {
        //encrypt the password with hashing
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $sqlQuery = $mysqli->prepare("INSERT INTO `users` (username, password, email, number, role, user_type) values (?,?,?,?,?,'user')");

        //INSERT THE INPUT VALUES TO THE QUERY
        $sqlQuery->bind_param("sssss", $name, $password, $email, $number, $role);

        //On successful execution display success alert.
        if ($sqlQuery->execute()) {
            $alertMessage = '<div class="alert alert-success" role="alert">
        Data inserted successfuly!
        </div>';
        } else {
            $alertMessage = '<div class="alert alert-danger" role="alert">
        Error! : ' . mysqli_error($mysqli) . '
        </div>';
        }

        $sqlQuery->close();
    }
}
