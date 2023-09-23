<?php

include '../header.php';
include '../database.php';

//if the submit button has been clicked
if (isset($_POST['submit'])) {

    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sqlQuery = $mysqli->prepare("INSERT INTO `users` (username, password, email, user_type) values (?,?,?,'user')");
    $sqlQuery->bind_param("sss", $name, $password, $email);

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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/register.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Display the Bootstrap alert here -->
    <?php
    if (isset($alertMessage)) {
        echo $alertMessage;
    }
    ?>

    <div class="title">
        <h1>Welcome, Please Sign up to access platform </h1>
    </div>

    <div class="container">

        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="username" name="username">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>