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
            if(isset($_SESSION["user_idx"])) {
                if($_SESSION["is_admin"] == 1) {
                    echo "
                    <li><a href='./posting'>게시글 작성</a></li>
                    <li><a href='./posts'>게시글 보기</a></li>
                    <li><a href='./admin'>관리자 페이지</a></li>
                    <li><a href='./logout'>로그아웃</a></li>
                    ";
                }else{
                    echo "
                    <li><a href='./posting'>게시글 작성</a></li>
                    <li><a href='./posts'>게시글 보기</a></li>
                    <li><a href='./logout'>로그아웃</a></li>
                    ";
                }
            } else {
                echo "
                <li><a href='./posts'>게시글 보기</a></li>
                <li><a href='./login'>로그인</a></li>
                <li><a href='./register'>회원가입</a></li>
                ";
            }
            ?>
            </ul>
        </div>
    </header>
</body>
</html>