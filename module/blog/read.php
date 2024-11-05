<div class="content" style="overflow: scroll;">
    <div class="blog">

        <?php if (isset($_GET['blog_id'])): ?>
            <?php
            $blog_id = intval($_GET['blog_id']);
            $query = "SELECT * FROM blogs WHERE blog_id=$blog_id";
            $result = $conn->query($query);

            ?>

            <?php if ($result->num_rows > 0 && $row = $result->fetch_assoc()): ?>
                <h2><?php echo $row['title'] ?></h2>
                <em>Created at: <?php echo $row['created_at'] ?></em><br>
                <img style="width: 100px; height: 100px;" src="<?php echo $row['avatar_path'] ?>" alt="">
                <p><?php echo $row['content'] ?></p>
            <?php endif ?>

            <?php if (isset($_COOKIE['username'])) : ?>
                <?php
                $username = $_COOKIE['username'];
                $query = "SELECT user_id FROM users WHERE username = '$username'";
                $result = $conn->query($query);
                $user_id = $result->fetch_assoc()['user_id'];
                ?>
                <div class="btn-box">
                    <?php if ($user_id === $row['user_id']): ?>
                        <a href='?page=module/blog&action=update&blog_id=<?php echo $blog_id ?>' class='btn'>Update</a>
                        <a href='?page=module/blog&action=delete&blog_id=<?php echo $blog_id ?>' class='btn'>Delete</a>

                    <?php endif ?>
                </div>
            <?php endif ?>

        <?php endif ?>

    </div>
    <div class="list-cmt">
        <?php include "module/comment/create.php" ?>
    </div>
    <div class="list-cmt">
        <?php include "module/comment/listcmt.php" ?>
    </div>


</div>