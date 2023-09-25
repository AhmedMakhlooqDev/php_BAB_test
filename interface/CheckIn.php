<?php

include '../header.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/CheckInOut.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="flexItem">
            <h1>Thank You, You Attendance has been marked.</h1>
        </div>
        <div class="flexItem">
            <!-- add time that Employee checked in here through sql  -->
            <h2>Check in Time: 6:01:02 AM</h2>
        </div>
        <div class="flexItem"> <button type="button" class="btn btn-primary btn-lg">View Attendance Records</button>
        </div>

    </div>


</body>

<?php

include '../footer.php';


?>

</html>