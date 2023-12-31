<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-danger">
        <a class="navbar-brand" href="#">BAB Attendance system</a>
        <?php
        //session_start();

        if (isset($_SESSION['email'])) {


            echo ' <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              
                <li class="nav-item">
                    <a class="nav-link" href="../interface/dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../interface/AttendanceRecords.php">Attendance Records</a>
                </li>';
                
                // if the user has admin priviliges he shall be granted access to admin panel 
                if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin') {
                echo ' <li class="nav-item">
                <a class="nav-link" href="../interface/admin.php">Admin Panel</a>
                </li>';
                }
            

                echo '<li class="nav-item">
                <a class="nav-link" href="../interface/logout.php">Logout</a>
            </li>
            <li class="nav-item">
                
            </ul>
        </div>';
        } else {


            echo ' <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="../interface/login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../interface/register.php">Sign Up</a>
                </li>
               
                
            </ul>
        </div>';
        }




        ?>


    </nav>

</body>

</html>