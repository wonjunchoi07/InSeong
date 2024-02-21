<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/haeder.css">
</head>
<body>
    <header>
        <div id="left">
            <span>인성터진 게시판</span>
        </div>
        <div id="right">
            <ul>
                <?php
                if(isset($_SESSION["user_idx"])){
                    echo "<li><a href='./logout'>logout</a></li>";
                }else{
                    echo "
                    <li><a href='./dir.php'>로그인</a></li>
                    <li><a href='./admin.php'>회원가입</a></li>";
                }
                    
                ?>
            </ul>
        </div>
    </header>
</body>
</html>