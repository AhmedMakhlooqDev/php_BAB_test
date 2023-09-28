<?php

include '../header.php';
include '../Controller/attendance-records-controller.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/AttendanceRecords.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Attendance Records</title>
</head>
<!-- php will be in the body -->

<body>
    <h1 class="title">Attendance Records</h1>
    
    <div class="container">
        <!-- display Employee data      -->
        <div class="empInfo">
            <?php
            if ($employee_result->num_rows > 0) {
                $employee_data = $employee_result->fetch_assoc();
            ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        <p class="pTitle">NAME: </p><?php echo $employee_data["username"]; ?>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <p class="pTitle">E-MAIL: </p> <?php echo $employee_data["email"]; ?>
                        </li>
                        <li class="list-group-item">
                            <p class="pTitle">NUMBER: </p><?php echo $employee_data["number"]; ?>
                        </li>
                        <li class="list-group-item">
                            <p class="pTitle">ROLE: </p> <?php echo $employee_data["role"]; ?>
                        </li>
                        <li class="list-group-item">
                            <p class="pTitle">EMPID: </p> <?php echo $employee_data["user_id"]; ?>
                        </li>
                        <li class="list-group-item">
                            <p class="pTitle">PRVLG: </p> <?php echo $employee_data["user_type"]; ?>
                        </li>
                    </ul>
                </div>
        </div>
    <?php
            } else {
                echo 'no such employee';
            }
    ?>
    <!-- for every attendance record display this list otherwise print that there are no records -->
    <div class="AttendList">
        <?php
        if ($attendance_result->num_rows > 0) {
            while ($attendance_data = $attendance_result->fetch_assoc()) {
        ?>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"> Date: <?php echo $attendance_data["date"]; ?></h5>
                        </div>
                        <p class="mb-1"><span>Attendance Time:</span> <?php echo $attendance_data["check_in_time_converted"]; ?> </p>
                        <p class="mb-1"><span> Departure Time: </span> <?php echo $attendance_data["check_out_time_converted"]; ?></p>
                    </a>
                </div>
        <?php
            }
        } else {
            echo 'no records found';
        }
        ?>
    </div>

    </div>

</body>

<?php
include '../footer.php';
?>

</html>