<?php
include '../header.php';

//users that are not logged in and users who do not have admin priveleges are not allowed to view this page
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: ../interface/access-denied.php"); // Redirect to an access denied page
    exit();
}

if(isset($_POST['submit'])){

$userid = $_POST['user_id'];
$date = $_POST['date'];

$sqlQuery = $mysqli->prepare("SELECT u.username, u.role, a.date, a.check_in_time, a.check_out_time
FROM user u
LEFT JOIN attendance a ON u.user_id = a.user_id
WHERE a.date = ?");

if(!empty($userid)){
    $sqlQuery .= " AND u.user_id = ?";
}

if(!empty($userid)){
    $sqlQuery->bind_param("si", $date, $user_id);
}
else{
    $sqlQuery->bind_param("s", $date);

}

$sqlQuery->execute();
$search_results = $employee_query->get_result();

}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>

    <div class="alert alert-danger" role="alert">
        ADMIN PANEL: IT IS THE ADMINISTRATORS RESPONSIBILITY TO INSURE STRUCTURAL INTEGRITY OF THE DATA AND ITS MODIFICATION. PLEASE AMEND WITH CAUTION.
    </div>

    <div class="container mt-5">
        <h2>Employee attendance report</h2>
        <form>
            <div class="mb-3">
                <div class="userDate">
                    <div class="item">
                        <label for="dateInput" class="form-label">Select a Date:</label>
                        <input type="date" class="form-control" id="dateInput" name="date">
                    </div>
                    <div class="item">
                        <label for="dateInput" class="form-label">Select a specific user: (keep empty to see all employees)</label>
                        <input type="text" class="form-control" id="dateInput" name="user_id">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
            
        </form>
    </div>

    <div class="container">

        <!-- calendar for seeing report that day -->
        <!-- filter by user id -->

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Employee ID</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">role</th>
                    <th scope="col">date</th>
                    <th scope="col">check in time</th>
                    <th scope="col">check out time</th>
                    <th scope="col">stat</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                <?php if($result->num_rows > 0) {
                    
                    ?>
             
                <tr>
                    <td><?php echo $employee['id']; ?></td>
                    <td><?php echo $employee['id']; ?></td>
                    <td><?php echo $employee['id']; ?></td>
                    <td><?php echo $employee['id']; ?></td>
                    <td><?php echo $employee['id']; ?></td>
                    <td><?php echo $employee['id']; ?></td>
                    <td><?php echo $employee['id']; ?></td>
                    <td><button type="" class="btn btn-danger">Send Compliance</button></td>
                </tr>

                <?php } 
                
                ?>


            </tbody>
        </table>

    </div>

</body>

<?php
include '../footer.php';

?>

</html>