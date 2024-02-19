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
        echo "Root Directory Access";
        break;

    case 'login':
        $page = './pages/index.php';
        break;
    case 'register':
        $page = './pages/admin.php';
        break;
    default:
    echo "이도저도 아무것도 아닌 그러하지 못한 그렇지 아니하지 아니하여 아니하지 아니못하여 아무것도 아닌 곳";
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