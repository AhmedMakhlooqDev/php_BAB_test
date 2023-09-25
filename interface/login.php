<?php
include '../header.php';
include '../database.php';

$script_injection = "";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sqlQuery = $mysqli->prepare("SELECT * FROM `users` WHERE email = ?");
    $sqlQuery->bind_param("s", $email);

    if ($sqlQuery->execute()) {

        $result = $sqlQuery->get_result();

        if ($result->num_rows > 0) {

            //store query data in an array format
            $user = $result->fetch_assoc();

            //uncomment for debugging
            // $user_string = implode(', ', $user);
            // echo($user_string);

            //password verification
            if (password_verify($password, $user["password"])) {

                //=================DEBUGING=====================================
                // // Uncomment for debugging
                // echo('Hashed Password from Database: ' . $user["password"]);
                // echo('User-Entered Password: ' . $password);

                // echo 'this condition has been retrieved';
               
                //===================================================================
                
                echo 'login success';
                $alertMessage = '<div class="alert alert-success" role="alert">
                Login Successful, Redirecting
                </div>';

                // this script will redirect to dashboard after 3 seconds
                $script_injection =
                    "<script> 
                        setTimeout(() => {
                            var baseUrl = window.location.protocol + '//' + window.location.host + '/Bab_test_case/php_BAB_test'; // <-- the last is there because it is hosted with other project on apache, and it should be taken out when hosting for production
                            window.location.href = baseUrl + '/interface/dashboard.php';
                        }, 3000);
                    </script> 
                    ";


                // this will create the logged in session
                $_SESSION["loggedin"] = true;
                $_SESSION["email"] = $email;
                $_SESSION["user_id"] = $user["user_id"];


            }
            else {

                // Password is incorrect
                $alertMessage = '<div class="alert alert-danger" role="alert">
                    Invalid email or password.
                </div>';

            }
        }
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
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>


    <?php
    if (isset($alertMessage)) {
        echo $alertMessage;
    }

    echo $script_injection;
    ?>

    <div class="title">
        <h1>Welcome, Please Sign in to access platform </h1>
    </div>

    <div class="container">

        <img class="image" src="../images/sm.png" width="300" height="300" />

        <form method="post">
            <div class="form-group">
                <label for="emailTxt">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" />
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="passwordTxt">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" />
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

</body>

<?php
include '../footer.php';
?>

</html>