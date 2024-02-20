<?php
session_start();

if (isset($_SESSION["userIdx"])){
    $userIdx = $_SESSION["userIdx"];
    echo "로그인 됨";
}else{
    echo "로그인 안 됨";
}

function logout(){
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
</head>
<body>
    <form action="" method="post">
        <button id="logout" name="logout" type="submit" onclick="<?php echo logout() ?>">logout</button>
    </form>
</body>
</html>

