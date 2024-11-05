<?php 

    checkAuthentication();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $title = addslashes($_POST['title']);
        $content = addslashes($_POST['content']);
        $image = $_FILES['image'];
    
        $targer_dir = 'uploads/blog/';
        $image_extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        $image_name = uniqid() . ".$image_extension";
        $avatar_path = $targer_dir . $image_name;
    
        if (move_uploaded_file($image['tmp_name'], $avatar_path)) {
            $user_id = getUserId();
            $query = "INSERT INTO blogs (`title`, `content`, `avatar_path`, `user_id`) VALUES ('$title', '$content', '$avatar_path', '$user_id')";
            $result = $conn->query($query);
    
            $blog_id = $conn->insert_id;
            // echo $blog_id;
            if ($result === true) {
                echo "Create successful.";
                header("Location: ?page=module/blog&action=read&blog_id=$blog_id");
            }
        }
    }

?>

<style>
    .form.profile {
        width: 200%;
    }

    .input-field {
        width: 90%;
    }
</style>

<div class="form profile">
    <span class="title">Create Post</span>

    <form method="POST" enctype="multipart/form-data">
        <div class="input-field">
            <input type="file" name="image" accept="image/png, image/jpeg" required/>
            <i class="fa-solid fa-image"></i>
        </div>
        <div class="input-field">
            <input type="text" name="title" placeholder="Enter your title" required/>
            <i class="fa-solid fa-paragraph"></i>
        </div>
        <div class="input-field">
            <textarea name="content" id=""placeholder="Enter your content" required></textarea>
            <!-- <input type="text" name="content" /> -->
            <i class="fa-solid fa-paragraph"></i>
        </div>
        <div class="input-field button">
            <button>Create</button>
        </div>
    </form>
</div>