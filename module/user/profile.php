<?php

checkAuthentication();

$username = $_COOKIE['username'];
$query = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_email = $_POST['email'];
    $new_phone_number = $_POST['phone_number'];
    $new_address = $_POST['address'];
    $new_avatar_path = $row['avatar_path'];

    if ($_FILES['avatar']['error'] !== UPLOAD_ERR_NO_FILE) {
        $avatar = $_FILES['avatar'];
        $extension = pathinfo($avatar['name'], PATHINFO_EXTENSION);
        $target_dir = 'uploads/avatar/';
        $new_avatar_path = $target_dir . uniqid() . '.' . $extension;
        
    }

    $sql = "UPDATE `users` SET 
                `email` = '$new_email',
                `phone_number` = '$new_phone_number',
                `address` = '$new_address',
                `avatar_path` = '$new_avatar_path'
            WHERE `username` = '$username'";

    if ($conn->query($sql) === TRUE) {
        move_uploaded_file($avatar['tmp_name'], $new_avatar_path);
        header("Location: ?page=module/user&action=profile");
    }
}
?>

<style>
    .form.profile {
        width: 200%;
    }

    .form.profile .user {
        text-align: center;
        margin-top: 10%;
    }

    .user img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 2px solid #ccc;
        object-fit: cover;
    }

    .input-field {
        width: 90%;
    }
</style>

<div class="form profile">
    <span class="title">Profile</span>
    <div class="user">
        <img src="<?= $row['avatar_path'] ?>" alt="User Avatar">
        <h2><?= $row['username'] ?></h2>
    </div>

    <form method="POST" enctype="multipart/form-data">
        <div class="input-field">
            <input type="file" name="avatar" accept="image/png, image/jpeg" />
            <i class="fa-solid fa-image"></i>
        </div>
        <div class="input-field">
            <input type="email" name="email" value="<?= $row['email'] ?>" />
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="input-field">
            <input type="text" name="phone_number" value="<?= $row['phone_number'] ?>" />
            <i class="fa-solid fa-phone"></i>
        </div>
        <div class="input-field">
            <input type="text" name="address" value="<?= $row['address'] ?>" />
            <i class="fa-solid fa-address-book"></i>
        </div>
        <div class="input-field button">
            <button>Update Profile</button>
        </div>
    </form>
</div>