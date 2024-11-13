<?php

// checkAuthentication();

if (isset($_GET['blog_id'])) {
    $blog_id = intval($_GET['blog_id']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        checkAuthentication();
        $content = htmlspecialchars($_POST['comment-text']);

        if (isset($_COOKIE['username'])) {

            $user_id = getUserId();

            $sql = "INSERT INTO `comments`(`content`, `user_id`, `blog_id`, `parent_id`) VALUES ('$content','$user_id','$blog_id',0)";
            $result = $conn->query($sql);

            if ($result == true) {
                header("Location: ?page=module/blog&action=read&blog_id=$blog_id");
            } else {
                echo "Fault";
            }
        } else {
            header("Location: ?page=module/user&action=signin");
        }
    }
}

?>




<h3>Post your comment</h3>
    <form method="POST">
        <div class="input-field">
            <textarea name="comment-text" id="" placeholder="Enter your comment" required></textarea>
            <i class="fa-solid fa-comment"></i>
        </div>
        
        <div class="input-field button">
            <button>Submit</button>
        </div>
    </form>
