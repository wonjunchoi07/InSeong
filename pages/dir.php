<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT user_idx, password, is_admin FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":username", $username);

        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && ($password == $user['password'])) {
           $_SESSION["user_idx"] = $user["user_idx"];
           $_SESSION["is_admin"] = $user["is_admin"];
           header("Location: /");
            exit;
        } else {
            echo "아이디 또는 비밀번호가 잘못되었습니다.";
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
