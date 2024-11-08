<style>
    .header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        padding: 20px 10%;
        /* margin-left: 7%; */
        background: transparent;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 100;
        background-color: white;
    }

    .logo {
        font-size: 25px;
        color: #00abf0;
        text-decoration: none;
        font-weight: 600;
    }

    .navbar a {
        font-size: 18px;
        color: black;
        text-decoration: none;
        font-weight: 500;
        margin-left: 35px;
        transition: .3s;
    }

    .navbar a:hover {
        color: #00abf0;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .user-icon {
        font-size: 24px;
        color: #00abf0;
        cursor: pointer;
        padding: 5px;
    }

    .dropdown em {
        font-style: normal;
        padding-left: 5px;
        color: #333;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        border-radius: 4px;
    }

    .dropdown-content a {
        color: #333;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        font-size: 14px;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
        color: #00abf0;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-content .btn {
        font-weight: bold;
        color: #00abf0;
    }

    .dropdown-content .btn:hover {
        background-color: #e0f0ff;
    }
    
</style>
<div class="header">

    <div class="logo">
        <a href="index.php" class="logo">YenBlog</a>
    </div>

    <div class="navbar">
        <a href="?page=module/blog&action=listblog">Forum</a>
        <a href="?page=module/user&action=ublog">My blog</a>
        <a href="#">Contact</a>
        <a href="#about">About</a>
    </div>

    <div class="dropdown">
        <i class="fa fa-user-circle user-icon"></i>
        <em> <?= isset($_SESSION['username']) ? $_SESSION['username'] : null ?>
            <div class="dropdown-content">
                <a href="?page=module/user&action=profile">My profile</a>

                <?php if (isset($_SESSION['username'])): ?>
                    <a href="?page=module/user&action=signout" class="btn">Sign out</a>
                <?php else : ?>
                    <a href="?page=module/user&action=signin" class="btn">Sign in</a>
                <?php endif ?>

            </div>
    </div>
</div>