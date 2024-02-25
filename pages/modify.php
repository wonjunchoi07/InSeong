<?php
if(isset($_SESSION["user_idx"])){
    echo "<script>alert('로그인 후 이용 가능합니다.'); location.href = '/login';</script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    try {
        $sql = "UPDATE posts SET title = :title, content = :content WHERE post_idx = :postId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":postId", $postId);
        $stmt->execute();
        echo "<script>alert('글 수정이 정상적으로 완료되었습니다.');</script>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head contents -->
</head>
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
<body>
    <div class="container">
        <h2>수정글 작성</h2>
        <form action="modify" method="post">
            <div class="form-group">
                <label for="title">제목</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">내용</label>
                <input type="text" id="content" name="content" required></input>
            </div>
            <div class="form-group">
                <input type="submit" value="수정">
            </div>
        </form>
        <form action="" method="post">
            <input type="hidden" id="postId" name="postId" value="postId"> <!-- You need to provide postId -->
            <button onClick='postDelete(this)'>게시글 삭제</button>
        </form>
    </div>

    <script>
        function postDelete(elem){
            const postId = document.getElementById('postId').value;
            const isConfirm = confirm(`정말로 ${postId}번 게시글을 삭제하시겠습니까?`);
            if (isConfirm){
                $.ajax({
                    url:'/maneger',
                    type: 'POST',
                    data: {"post_idx": postId},
                    success: function(){
                        alert("정상적으로 게시글이 삭제되었습니다");
                        location.href='./maneger';
                    },
                    error: function(){
                        alert("게시글 삭제 중 문제가 발생하였습니다.");
                    }
                })
            }else{
                alert("게시글 삭제가 취소되었습니다.");
            }
            return console.log(elem);
        }
    </script>
</body>
</html>
