<?php

if (isset($_COOKIE['username'])) {
    setcookie('username', $username, time() - 3600, '/', '', true, true);
    setcookie('stamp', $client_stamp, time() - 3600, '/', '', true, true);
    header("Location: index.php");
}
