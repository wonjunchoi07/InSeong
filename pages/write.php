<?php
if(isset($_SESSION["user_idx"])){
    echo "<script>alert('로그인 후 이용 가능합니다.'); location.herf = '/login';</script>";
}
//글 작성 로직
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_idx = $_SESSION["user_idx"];
    //$write_date = $_POST['write_date'];
    //$is_deleted = $_POST['is_deleted'];

    try {
        $sql = "INSERT INTO posts(user_idx, title, content) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_idx, $title, $content]);
        echo "글 등록이 정상적으로 완료되었습니다.";
    }catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 작성</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group textarea {
            height: 200px;
        }

        .form-group input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>게시글 작성</h2>
        <form action="posting" method="post">
            <div class="form-group">
                <label for="title">제목</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">내용</label>
                <input type="text" id="content" name="content" required></input>
            </div>
            <div class="form-group">
                <input type="submit" value="작성">
            </div>
        </form>
    </div>
</body>
</html>