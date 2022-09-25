<?php
session_start();
if (!isset($_SESSION['email'])) {
    die("<script>window.location = '/'</script>");
}
?>

<?php

$email = $_SESSION['email'];
require('../../includes/config.php');
include('../../includes/query.php');

$return_arr = array();

$query = mysqli_query($mysqli, "SELECT * FROM user WHERE email = '$email'");
$data = mysqli_fetch_array($query);

$return_arr = array(
    "get_nama" => $data['nama'],
    "get_email" => $data['email'],
    "get_balance" => "Rp " . number_format((float)$data['balance'], 0, ',', '.') . ",00",
    "get_level" => $data['level'],
);

echo json_encode($return_arr);
