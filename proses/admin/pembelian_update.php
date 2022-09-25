<?php
session_start();
require('../../includes/config.php');

$id_pembelian = $_POST['pembelian_id'];
$status = $_POST['pembelian_status'];

$return_arr = array();

if (!$id_pembelian || !$status) {
    $return_arr = array(
        "status" => "error",
        "message" => "Semua kolom harus diisi"
    );
} else {
    $query = mysqli_query($mysqli, "UPDATE history_pembelian SET status = '$status' WHERE id_pembelian = '$id_pembelian'");
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
