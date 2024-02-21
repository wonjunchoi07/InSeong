<?php
session_start();

if(isset($_SESSION["user_idx"])){
    echo "로그인 됨";
}else{
    echo "로그인 안 됨";
}

function logout(){
    session_destroy();
}
logout();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>님 로그아웃 됨 ㅅㄱ 아무것도 못함ㅋㅋ</h3>
</body>
</html>