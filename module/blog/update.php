<?php

if (isset($_GET['blog_id'])) {
    $blog_id = intval($_GET['blog_id']);

    $query = "SELECT * FROM blogs WHERE blog_id = $blog_id";
    $result = $conn->query($query)->fetch_assoc();

    $title = $result['title'];
    $content = $result['content'];
    $new_avatar_path = $result['avatar_path'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $new_title = addslashes($_POST['title']);
        $new_content = addslashes($_POST['content']);

        if ($_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $image = $_FILES['image'];
            $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
            $target_dir = 'uploads/blogs/';
            $new_avatar_path = $target_dir . uniqid() . '.' . $extension;
        }

        $sql = "UPDATE `blogs` SET `title`='$new_title',`content`='$new_content',`avatar_path`='$new_avatar_path' WHERE blog_id = $blog_id";
        if ($conn->query($sql)) {
            move_uploaded_file($image['tmp_name'], $new_avatar_path);
            header("Location: ?page=module/blog&action=read&blog_id=$blog_id");
        }
    }
}

?>

<style>
    .input-field {
        width: 90%;
    }

    button {
        margin-top: 30px;
    }
</style>

<div class="form update-post" style="width: 200%;">

    <span class="title">Edit post</span>

    <form method="POST" enctype="multipart/form-data">

        <div class="input-field">
            <input type="text" name="title" value="<?= $title ?>" />
            <i class="fa-solid fa-paragraph"></i>
        </div>
        <div class="input-field">
            <textarea name="content" id=""><?= $content ?></textarea>
            <i class="fa-solid fa-paragraph"></i>
        </div>
        <div class="input-field">
            <i style="color: #00abf0;" class="fa-solid fa-image"></i>
            <input type="file" name="image" accept="image/png, image/jpeg">
        </div>

        <button>Update</button>

    </form>
</div>