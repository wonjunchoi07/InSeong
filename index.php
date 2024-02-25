<?php
include('./config/dbconnect.php');

$request = $_SERVER['REQUEST_URI'];
$path = explode("?",$request);
$path[1] = isset($path[1]) ? $path[1] : null;
$resource = explode("/",$path[0]);
echo "<script>console.log('path[0]= ".$path[0]."');</script>";
echo "<script>console.log('path[1]= ".$path[1]."');</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/global.css">
</head>
<body>
    <?php
        $page = '';
        include('./components/header.php');
        switch ($resource[1]){
            case '':
                $page = './pages/main.php';
                break;
            case 'login':
                $page = './pages/login.php';
                break;
            case 'register':
                $page = './pages/admin.php';
                break;
            case 'write' :
                $page = './pages/write.php';
                break;
            case 'logout' : 
                $page = './pages/logout.php';
                break;
            case 'posts' :
                $page = './pages/posts.php';
                break;
            case 'maneger' : 
                $page = './pages/maneger.php';
                break;
            case 'modify' : 
                $page = './pages/modify.php';
                break;
            default:
                $page = "./pages/404.php";
                break;
        }
        include($page);
        /**
        * URL : https://naver.com/blog
        * protocal을 포함한 모든 주소
        * URI : naver.com/blog
        * 호스트 명 + 상세 정보(path)
        * URN : blog
        * 상세 정보(Path)
        */
    ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</body>
</html>