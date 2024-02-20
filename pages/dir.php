<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "inseong";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("연결실패: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT user_idx, username FROM users WHERE username = '$username' and password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION["userIdx"] = $row["user_idx"];
            header("location: ./pages/main.php");
        } else {
            $error = "아이디 또는 비밀번호가 잘못되었습니다.";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <form action="" method="post" class="login-form">
            <h2>Login</h2>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <p class="signup-link">Don't have an account? <a href="./admin.html">Sign Up</a></p>
        </form>
    </div>
</body>
</html>
