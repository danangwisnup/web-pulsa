<?php
session_start();
require('../../includes/config.php');

$return_arr = array();
$kode = $_POST['kode'];

if ($kode == "update") {
    $id_pembelian = $_POST['pembelian_id'];
    $status = $_POST['pembelian_status'];

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
} else {
    $id = $_POST['id'];

    if ($id == '') {
        $return_arr = array(
            "status" => "error",
            "message" => "ID tidak boleh kosong"
        );
    } else {
        $query = mysqli_query($mysqli, "DELETE FROM history_pembelian WHERE id_pembelian = '$id'");
        if ($query) {
            $return_arr = array(
                "status" => "success",
                "message" => "Data berhasil dihapus"
            );
        } else {
            $return_arr = array(
                "status" => "error",
                "message" => "Data gagal dihapus"
            );
        }
    }
}

echo json_encode($return_arr);

$mysqli->close();
