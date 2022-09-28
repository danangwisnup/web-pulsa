<?php
session_start();
require('../../includes/config.php');

$return_arr = array();
$kode = $_POST['kode'];

if ($kode == "update") {
    $email = $_POST['user_email'];
    $nama = $_POST['user_nama'];
    $level = $_POST['user_level'];
    $balance = $_POST['user_balance'];
    $status = $_POST['user_status'];

    if (!$email || !$nama || !$level || !$status) {
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
} else {
    $id = $_POST['id'];

    if ($id == '') {
        $return_arr = array(
            "status" => "error",
            "message" => "ID tidak boleh kosong"
        );
    } else {
        $query = mysqli_query($mysqli, "DELETE FROM user WHERE id_user = '$id'");
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
