<?php

$blog_id = isset($_GET['blog_id']) ? intval($_GET['blog_id']) : null;
$query = "SELECT u.avatar_path, u.username, cmt.content, cmt.created_at FROM `comments` AS cmt INNER JOIN `users` AS u ON cmt.user_id = u.user_id WHERE blog_id = $blog_id ORDER BY cmt.created_at DESC;";
$result = $conn->query($query);

?>

<div style="overflow: scroll; max-height: 500px; width: 500px;">
    <?php if ($result->num_rows > 0) : ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <img style="width: 100px; height: 100px; border-radius: 50px" src="<?= $row['avatar_path'] ?>" alt="User image">

            <p><?= $row['username'] ?></p>

            <p><?= $row['content'] ?></p>

            <em>Post on: <?=$row['created_at']?></em>
            <div class="btn-box">
                <?php if (isset($_COOKIE['username']) && $row['username'] === $_COOKIE['username']): ?>
                    <a href='?page=module/comment&action=update&comment_id=<?= $row['comment_id']?>&blog_id=<?= $blog_id?>' class='btn'>Update</a>
                    <a href='?page=module/comment&action=delete&comment_id=<?= $row['comment_id']?>&blog_id=<?= $blog_id?>' class='btn'>Delete</a>

                <?php endif ?>
            </div>
        <?php endwhile ?>
    <?php else: ?>
        <p>No comments found.</p>

    <?php endif ?>

</div>