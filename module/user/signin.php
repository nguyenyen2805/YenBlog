<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = remove_bad_charactors($_POST['username']);
    $password = addslashes($_POST['password']);

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: ?page=module/user&action=profile");
    }
    else {
        echo "<script>alert('Invalid username or password.')</script>";
    }
}
?>

<style>
    .input-field {
        width: 90%;
    }
</style>

<div class="form login">
    <span class="title">Sign in</span>
    <form action="#" method="POST">
        <div class="input-field">
            <input type="text" name="username" placeholder="Enter your username" required />
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="input-field">
            <input type="password" name="password" placeholder="Enter your password" required />
            <i class="fa-solid fa-lock"></i>
        </div>
        <div class="input-field button">
            <button>Sign in</button>
        </div>
    </form>
    <div class="login-signup">
        <span class="text">Don't have an account, sign up
            <a href="?page=module/user&action=signup" class="text signup-link">here.</a>
        </span>
    </div>
</div>