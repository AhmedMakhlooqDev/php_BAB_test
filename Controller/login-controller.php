<?php

include '../database.php';

$script_injection = "";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

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

                //echo 'login success';
                $alertMessage = '<div class="alert alert-success" role="alert">
                Login Successful, Redirecting
                </div>';
                //var_dump($_SESSION);


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
                $_SESSION["user_type"] = $user["user_type"];

            } else {

                // Password is incorrect
                $alertMessage = '<div class="alert alert-danger" role="alert">
                    Invalid email or password.
                </div>';
            }
        } else {
            $alertMessage = '<div class="alert alert-danger" role="alert">
                    user does not exist.
                </div>';
        }
    } else {
        $alertMessage = '<div class="alert alert-danger" role="alert">
            Error! : ' . mysqli_error($mysqli) . '
            </div>';
    }

    $sqlQuery->close();
}

?>