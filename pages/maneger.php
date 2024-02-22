<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE posts SET is_deleted = 1 WHERE post_idx = :post_idx";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':post_idx',$_POST["post_idx"]);
    $stmt->execute();
}

if (!isset($_SESSION["user_idx"])) {
    echo "<script>alert('로그인 후 이용 가능합니다.'); location.href = '/login';</script>";
    exit; // 실행을 중단하여 더 이상 진행되지 않도록 합니다.
}

// 사용자가 관리자인지 확인합니다.
$is_admin = $_SESSION['is_admin'];

if ($is_admin != True) {
    echo "<script>alert('관리자만 사용 가능합니다.');</script>";
    exit; // 실행을 중단하여 더 이상 진행되지 않도록 합니다.
}
?>

<div class="container mt-5">
    <h1>관리자 페이지</h1>
    <?php
        $sql = "SELECT * FROM posts WHERE is_deleted = 0 ORDER BY write_date DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($posts){
            foreach ($posts as $post){
                $sql = "SELECT * FROM users WHERE user_idx = :user_idx";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":user_idx", $post["user_idx"]);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                $divinnertext = "";
                $divinnertext .= "<div  class='post'";
                $divinnertext .= "<h2>".$post["title"]."</h2";
                $divinnertext .= "<p>작성자 ID : ".$user["username"]."</p>";
                $divinnertext .= "<p>게시글 ID : ".$post["post_idx"]."</p>";
                $divinnertext .= "<p>게시글 작성일 : ".$post["write_date"]."</p>";
                $divinnertext .= "<p>".$post["content"]."</p>";
                $divinnertext .= "<button id='".$post["post_idx"]."' onclick='postDelete(this);'>삭제</button>";
                $divinnertext .= "</div>";
                echo $divinnertext;
            }
        }
    ?>
</div>
<script>
    function postDelete(elem){
        const post_idx = elem.id;
        const isConfirm = confirm(`정말로 ${post_idx}번 게시글을 삭제하시겠습니까?`);
        if (isConfirm){
            $.ajax({
                url:'/maneger',
                type: 'POST',
                data: {"post_idx":post_idx},
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