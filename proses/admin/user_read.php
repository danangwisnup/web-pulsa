<?php
require('../../includes/config.php');

$id = $_POST['id'];

$return_arr = array();

$query = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user = '$id'");
$result = mysqli_fetch_array($query);

$return_arr = array(
    "nama" => $result['nama'],
    "level" => $result['level'],
    "email" => $result['email'],
    "balance" => $result['balance'],
    "status" => $result['status']
);

// Encoding array in JSON format
echo json_encode($return_arr);
