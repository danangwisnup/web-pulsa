<?php
date_default_timezone_set("Asia/Jakarta");

$db_host = 'localhost';
$db_database = 'webpulsa-pbp';
$db_username = 'root';
$db_password = '';


// connect database
$mysqli = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($mysqli->connect_errno) {
    die("Connect Failed " . $mysqli->connect_error);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
