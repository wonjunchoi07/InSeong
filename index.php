<?php
include('./config/dbconnect.php');

$request = $_SERVER['REQUEST_URI'];
$path = explode("?",$request);
$path[1] = isset($path[1]) ? $path[1] : null;
$resource = explode("/",$path[0]);
echo "<script>console.log('path[0]= ".$path[0]."');</script>";
echo "<script>console.log('path[1]= ".$path[1]."');</script>";

switch ($resource[1]){
    case '':
        $page = './pages/main.php';
        break;
    case 'login':
        $page = './pages/dir.php';
        break;
    case 'register':
        $page = './pages/admin.php';
        break;
    case 'write' :
        $page = './pages/write.php';
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