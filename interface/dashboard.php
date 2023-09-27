<?php
include '../header.php';
include '../Controller/attendance-controller.php';
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

    <?php

    if (isset($alertMessage)) {
        echo $alertMessage;
    }

    ?>

    <div class="title">
        <h1>Employee Dashboard</h1>
    </div>
    <form method="post">

        <div class="container">

            <!-- ======================== check in to system ================================================== -->

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Check in</h5>
                    <p class="card-text">Mark your arrival attendance</p>
                    <button type="submit" class="btn btn-primary" name="checkin">Check In</button>
                </div>
            </div>

            <!-- ======================= check out to system ==================================================-->

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Checkout</h5>
                    <p class="card-text">Mark your Departure attendance </p>
                    <button type="submit" class="btn btn-primary" name="checkout">Check Out</button>
                </div>
            </div>

            <!-- ======================= View full attendance records ===========================================-->

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Attendance Records</h5>
                    <p class="card-text">View your full attendance log book</p>
                    <a href="AttendanceRecords.php" class="btn btn-primary">confirm</a>
                </div>
            </div>

            <?php




            ?>

        </div>


    </form>

</body>


<?php
include '../footer.php';
?>

</html>