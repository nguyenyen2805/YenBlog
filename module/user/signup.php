<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = remove_bad_charactors($_POST['username']);
    $email = remove_bad_charactors($_POST['email']);
    $password = addslashes($_POST['password']);
    $confirm_password = addslashes($_POST['confirm_password']);

    if (strlen($password) >= 8 && strlen($password) <= 12) {
        if ($password === $confirm_password) {
            $query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                echo "<script>alert('Username or email exists.');</script>";
            } else {
                $query = "INSERT INTO users (`email`, `username`, `password`) VALUES ('$email', '$username', '$password')";
                $result = $conn->query($query);
                if ($result == true) {
                    header("Location: ?page=module/user&action=signin");
                }
            }
        } else {
            echo "<script>alert('Confirm password is incorrect.')</script>";
        }
    } else {
        echo "<script>alert('Password must be between 8 and 12 characters.');</script>";
    }
}

?>

<style>
    .input-field {
        width: 90%;
    }
</style>

<div class="form signup">
    <span class="title">Sign up</span>
    <form method="POST">
        <div class="input-field">
            <input type="text" name="username" placeholder="Enter your username" required />
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="input-field">
            <input type="text" name="email" placeholder="Enter your email" required />
            <i class="fa-solid fa-envelope"></i>
        </div>
        <div class="input-field">
            <input type="password" name="password" placeholder="Create a password" required />
            <i class="fa-solid fa-lock"></i>
        </div>
        <div class="input-field">
            <input type="password" name="confirm_password" placeholder="Confirm a password" required />
            <i class="fa-solid fa-lock"></i>
        </div>

        <div class="input-field button">
            <button>Sign Up</button>
        </div>
    </form>
    <div class="login-signup">
        <span class="text">Have an account? Sign in
            <a href="?page=module/user&action=signin" class="text login-link">here.</a>
        </span>
    </div>
</div>