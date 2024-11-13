<?php

if (isset($_GET['blog_id'])) {
    $blog_id = intval($_GET['blog_id']);

    // echo $blog_id;

    $query = "DELETE FROM blogs WHERE blog_id = $blog_id";
    // echo $query;
    $result = $conn->query($query);
    // echo $result;

    if ($result === true) {
        header("Location: ?page=module/user&action=ublog");
    } else {
        echo "fail";
    }
}
