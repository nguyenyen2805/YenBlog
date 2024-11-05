<?php

$query = "SELECT * FROM blogs";
$result = $conn->query($query);



?>

<style>
    .bottom {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;

    }

    .myblog {
        display: flex;
        margin: 20px 0;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .myblog .left img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 15px;
        border: 2px solid #ccc;
    }

    .myblog .right {
        margin-left: 20px;
        flex: 1;
    }

    .myblog .right h2 {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .myblog .right em {
        display: block;
        color: #777;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .myblog .right p {
        font-size: 16px;
        color: #555;
        line-height: 1.5;
    }

    .actions {
        margin-top: 20px;
    }

    .update-button,
    .delete-button,
    .create-button {
        display: inline-block;
        padding: 8px 15px;
        font-size: 14px;
        border-radius: 5px;
        text-decoration: none;
        color: #fff;
        margin-right: 10px;
        transition: background-color 0.2s;
    }


    .create-button {
        background-color: #4CAF50;
        text-align: center;
    }


    .update-button {
        background-color: #00abf0;
    }

    .delete-button {
        background-color: #f44336;
    }

    .update-button:hover {
        background-color: #008cba;
    }

    .delete-button:hover {
        background-color: #d32f2f;
    }

    .create-button:hover {
        background-color: #45a049;
    }
</style>

<div>
    <div class="bottom">
        <h1>My Blog</h1>
        <a href="?page=module/blog&action=create" class="create-button">Create your post</a>
    </div>

    <?php while ($row = $result->fetch_assoc()): ?>
        <?php $user_id = $row['user_id'];
        $sql = "SELECT username FROM users WHERE user_id=$user_id";
        $username = $conn->query($sql)->fetch_assoc()['username'];
        
        ?>
        <div class="myblog" onclick="document.location.href='?page=module/blog&action=read&blog_id=<?= $row['blog_id'] ?>' ">
            <div class="left">
                <img src="<?= $row['avatar_path'] ?>" alt="Blog image">
            </div>

            <div class="right">
                <h2><?= $row['title'] ?></h2>
                <em>Post on: <?= $row['created_at'] ?></em>
                <em>Author: <?= $username ?></em>
                <p><?= $row['content'] ?></p>

            </div>
        </div>
    <?php endwhile; ?>
</div>