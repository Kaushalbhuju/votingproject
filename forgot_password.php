<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="login-container">
        <h1>Forgot Password</h1>
        <form action="php/forgot_password_process.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <button type="submit">Reset Password</button>
        </form>
        <br>
        <a href="login.html">Back to Login</a>
    </div>
</body>
</html>
