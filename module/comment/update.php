<?php

if (isset($_GET['comment_id'])) {
    $comment_id = intval($_GET['comment_id']);
    $blog_id = intval($_GET['blog_id']);
    $query = "SELECT * FROM comments WHERE comment_id = $comment_id";
    $result = $conn->query($query);
    $comment = $result->fetch_assoc()['content'];



    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $new_comment = addslashes($_POST['comment-text']);
        $query = "UPDATE `comments` SET `content`= '$new_comment' WHERE comment_id = $comment_id";
        $result = $conn->query($query);

        if ($result == true) {
            header("Location: ?page=module/blog&action=read&blog_id=$blog_id");
        }
    }
}

?>

<form method="post" class="comment">

    <h3>Post your comment</h3>

    <input type="text" value="<?= $comment ?>" name="comment-text" placeholder="Enter new comment">

    <button>Submit</button>
</form>