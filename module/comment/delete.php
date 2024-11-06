<?php

$comment_id = intval($_GET['comment_id']);
$blog_id = intval($_GET['blog_id']);
$query = "DELETE FROM comments WHERE comment_id = $comment_id";
$result = $conn->query($query);
if ($result == true) {
    header ("Location: ?page=module/blog&action=read&blog_id=$blog_id");
}
?>