<?php

function remove_bad_charactors($string)
{
    $bad_characters = ['&', ';', '|', '-', '$', '(', ')', '`', '\'', '\\', '"', '||', ' ', '%', "*"];
    return str_replace($bad_characters, '', $string);
}

function checkAuthentication()
{
    $username = $_SESSION['username'];

    if (!isset($username)) {
        header("Location: ?page=module/user&action=signin");
        die();
    }
}

function validateStamp($client_stamp, $server_stamp)
{
    return ($client_stamp === $server_stamp);
}

function generateStamp($username, $secret, $user_agent, $ip_address)
{
    return md5($username . $secret . $user_agent . $ip_address);
}
function getUserAgent()
{
    return $_SERVER['HTTP_USER_AGENT'];
}

function getIpAddress()
{
    if (getenv('HTTP_CLIENT_IP')) {
        return getenv('HTTP_CLIENT_IP');
    } else if (getenv('HTTP_X_FORWARDED_FOR')) {
        return getenv('HTTP_X_FORWARDED_FOR');
    } else if (getenv('HTTP_X_FORWARED')) {
        return getenv('HTTP_X_FORWARED');
    } else if (getenv('HTTP_FORWARDED')) {
        return getenv('HTTP_FORWARDED');
    } else if (getenv('REMOTE_ADDR')) {
        return getenv('REMOTE_ADDR');
    }
    return 'UNKNOWN';
}

function checkOwner($commentUsername) {
    return isset($_SESSION['username']) && $_SESSION['username'] === $commentUsername;
}

function getUserId()
{
    global $conn;
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);
    $user_id = $result->fetch_assoc()['user_id'];
    return $user_id;
}
