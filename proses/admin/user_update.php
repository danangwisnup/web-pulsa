<?php
session_start();
require('../../includes/config.php');

$email = $_POST['user_email'];
$nama = $_POST['user_nama'];
$level = $_POST['user_level'];
$balance = $_POST['user_balance'];
$status = $_POST['user_status'];

$return_arr = array();

if (!$email || !$nama || !$level || !$balance || !$status) {
    $return_arr = array(
        "status" => "error",
        "message" => "Semua kolom harus diisi"
    );
} else {
    $query = mysqli_query($mysqli, "UPDATE user SET nama = '$nama', level = '$level', balance = '$balance', status = '$status' WHERE email = '$email'");
    if ($query) {
        $return_arr = array(
            "status" => "success",
            "message" => "Data berhasil diubah"
        );
    } else {
        $return_arr = array(
            "status" => "error",
            "message" => "Data gagal diubah"
        );
    }
}

echo json_encode($return_arr);
