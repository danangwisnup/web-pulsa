<?php
session_start();
$email = $_SESSION['email'];
require('../../includes/config.php');

$id = $_POST['id'];

$return_arr = array();

$query = mysqli_query($mysqli, "SELECT * FROM history_pembelian WHERE id_pembelian = '$id'");
$result = mysqli_fetch_array($query);

$return_arr = array(
    "id_pembelian" => $result['id_pembelian'],
    "email" => $result['email'],
    "deskripsi" => "Top up via " . $result['deskripsi'],
    "harga" => $result['harga'],
    "tanggal" => $result['tanggal'],
    "status" => $result['status']
);

// Encoding array in JSON format
echo json_encode($return_arr);
