<?php

include '../header.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/AttendanceRecords.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<!-- php will be in the body -->

<body>
    <h1 class="title">Attendance Records</h1>
    <div class="container">
        <!-- display Employee data      -->
        <div class="empInfo">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                <p class="pTitle">NAME: </p>ahmed mahdi sulayman
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><p class="pTitle">E-MAIL: </p> ahmedmahdi@admin.com</li>
                    <li class="list-group-item"><p class="pTitle">NUMBER: </p>33446426</li>
                    <li class="list-group-item"><p class="pTitle">ROLE: </p> DevOps Engineer</li>
                    <li class="list-group-item"><p class="pTitle">EMPID: </p> 1234</li>
                    <li class="list-group-item"><p class="pTitle">PRVLG: </p> Admin</li>
                </ul>
            </div>
        </div>

        <!-- for every attendance record display this list otherwise print that there are no records -->
        <div class="AttendList">

            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"> Date: 25/9/2023</h5>
                    </div>
                    <p class="mb-1"><span>Attendance Time:</span> 8:00:21 AM </p>
                    <p class="mb-1"><span> Departure Time: </span> 4:00:21 PM</p>
                </a>
            </div>

            


        </div>


    </div>


</body>

<?php
include '../footer.php';
?>

</html>