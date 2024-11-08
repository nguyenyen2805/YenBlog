<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yen's Blog</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <?php
        session_start();
        include 'system/connectdb.php';
        include 'system/utilities.php';
        include 'layout/header.php';
        $page = isset($_GET['page']) ? $_GET['page'] : null;
        $action = isset($_GET['action']) ? $_GET['action'] : null;
        if (!isset($page) || empty($action)) {
            include "page/home.php";
        } else {
            $file = $page . '/' . $action . '.php';
            if (isset($file)) {
                include($file);
            } else {
                echo "<script>alert('404 NOT FOUND')</script>";
            }
        }
        include 'page/about.php';
        include 'layout/footer.php';
        ?>
    </div>
</body>

</html>