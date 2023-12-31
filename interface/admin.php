<?php
include '../header.php';
include '../Controller/admin-controller.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Admin Panel</title>
</head>

<body>

    <div class="alert alert-danger" role="alert">
        ADMIN PANEL: IT IS THE ADMINISTRATORS RESPONSIBILITY TO INSURE STRUCTURAL INTEGRITY OF THE DATA AND ITS MODIFICATION. PLEASE AMEND WITH CAUTION.
    </div>
    <div class="container mt-5">
        <h2>Employee attendance report</h2>
        <form method="post">
            <div class="mb-3">
                <div class="userDate">
                    <div class="item">
                        <label for="dateInput" class="form-label">Select a Date:</label>
                        <input type="date" class="form-control" id="dateInput" name="date">
                    </div>
                    <div class="item">
                        <label for="dateInput" class="form-label">Select a specific user: (keep empty to see all employees)</label>
                        <input type="text" class="form-control" name="user_id">
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
                    <th scope="col">Total work Hours</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                <?php
                //display query results here
                if (isset($search_results) && $search_results->num_rows > 0) {
                    while ($row = $search_results->fetch_assoc()) {
                ?>

                        <tr>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['check_in']; ?></td>
                            <td><?php echo $row['check_out']; ?></td>
                            <td><?php echo $row['total_hours']; ?></td>
                            <td><button type="" class="btn btn-danger">Send Compliance</button></td>
                        </tr>

                <?php
                    }
                } else {
                    echo 'no records found';
                }

                ?>


            </tbody>
        </table>

    </div>

</body>

<?php
include '../footer.php';

?>

</html>