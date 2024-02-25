<?php
session_start();

$sql = "SELECT * FROM posts WHERE is_deleted = 0 ORDER BY write_date DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container mt-5">
    <h1>게시글 목록</h1>
    <?php
        if ($posts){
            foreach ($posts as $post){
                $sql = "SELECT * FROM users WHERE user_idx = :user_idx";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":user_idx", $post["user_idx"]);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                $divinnertext = "";
                $divinnertext .= "<div class='post'";
                $divinnertext .= "<h2>".$post["title"]."</h2";
                $divinnertext .= "<p>작성자 ID : ".$user["username"]."</p>";
                $divinnertext .= "<p>게시글 ID : ".$post["post_idx"]."</p>";
                $divinnertext .= "<p>게시글 작성일 : ".$post["write_date"]."</p>";
                $divinnertext .= "<p>".$post["content"]."</p>";
                if($post["user_idx"] == $_SESSION["user_idx"]) {
                    $divinnertext .= "<a href='./modify?postId=" . $post["post_idx"] . "'><button type='submit'>수정하기</button></a>";
                }
                $divinnertext .= "</div>";
                echo $divinnertext;
            }
        }
    ?>
</div>
