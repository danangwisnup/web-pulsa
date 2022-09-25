<?php
require('../../includes/config.php');

$id = $_POST['id'];

$return_arr = array();

$query = mysqli_query($mysqli, "SELECT * FROM history_topup WHERE id_topup = '$id'");
$result = mysqli_fetch_array($query);

$querey_metode_topup = mysqli_query($mysqli, "SELECT * FROM metode_topup WHERE id_metode = '$result[id_metode]'");
$result_metode_topup = mysqli_fetch_array($querey_metode_topup);

$return_arr = array(
    "id_topup" => $result['id_topup'],
    "email" => $result['email'],
    "deskripsi" => "Topup via " . $result_metode_topup['jenis'] . " - a/n " . $result_metode_topup['nama'],
    "nominal" => $result['nominal'],
    "tanggal" => $result['tanggal'],
    "status" => $result['status']
);

// Encoding array in JSON format
echo json_encode($return_arr);
