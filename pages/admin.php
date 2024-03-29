<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $phone_number = $_POST['phone_number'];
  $gender = $_POST['gender'];

  try {
    $sql = "INSERT INTO users(username, password, email, phone_number, gender) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $password, $email, $phone_number, $gender]);
    echo "회원가입이 성공적으로 완료되었습니다.";
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 페이지</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="signup-container">
        <form action="" method="post" class="signup-form">
            <h2>회원가입</h2>
            <div class="form-group">
                <label for="username">아이디:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">비밀번호:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password">email:</label>
                <input type="password" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">전화번호:</label>
                <input type="text" id="phone_number" name="phone_number" required>
            </div>
            <div class="form-group">
                <label>성별:</label><br>
                <input type="radio" id="gender" name="gender" value="male" required>
                <label for="male">남자</label>
                <input type="radio" id="gender" name="gender" value="female">
                <label for="female">여자</label>
            </div>
            <button type="submit">가입하기</button>
        </form>
    </div>
</body>
</html>
