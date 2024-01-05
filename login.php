<?php
error_reporting(E_ALL);

session_start();
include("connect.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $role = $_POST['Role'];

    // Sanitize the user inputs (optional but recommended)
    $mobile = mysqli_real_escape_string($connect, $mobile);
    $password = mysqli_real_escape_string($connect, $password);

    $query = "SELECT * FROM `user` WHERE `mobile`='$mobile' AND `role`='$role'";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $userdata = mysqli_fetch_array($result);
        $hashedPassword = $userdata['password']; // Assuming the hashed password is stored in the 'password' column of the 'user' table

       
        function check_password_function($password, $hashedPassword) {
            return password_verify($password, $hashedPassword);
        }
                // Check if the entered password matches the hashed password using the check_password_function
        if (check_password_function($password, $hashedPassword)) {
            // Password is correct, proceed with the login process
            // Fetch all candidates
            $candidateQuery = "SELECT * FROM user WHERE role = 2";
            $candidateResult = mysqli_query($connect, $candidateQuery);
            $candidatedata = mysqli_fetch_all($candidateResult, MYSQLI_ASSOC);

            $_SESSION['userdata'] = $userdata;
            $_SESSION['candidatedata'] = $candidatedata;

            echo '
            <script>
            window.location="../routes/dashboard.php";
            </script>
            ';
        } else {
            // Password is incorrect, set the flag for invalid password
            $invalidPassword = true;
        }
    } else {
        $invalidPassword = true; // To prevent revealing if mobile number or role is incorrect
    }

    if (isset($invalidPassword) && $invalidPassword) {
        echo '
        <script>
        alert("Invalid mobile or password!");
        window.location="../login.html";
        </script>';
    }
}