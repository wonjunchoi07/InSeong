<?php
$host = 'localhost';
$dbname = 'InSeong';
$username = 'root';
$password = '';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;",$username,$password);   
}catch (PDOException $e){
    echo "<script>alert('데이터베이스 연결 실패: ".addslashes($e->getMessage())."');</script>";
}
?>