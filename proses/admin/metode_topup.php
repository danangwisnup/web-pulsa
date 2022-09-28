<?php
session_start();
$email = $_SESSION['email'];
require('../../includes/config.php');

$return_arr = array();
$kode = $_POST['kode'];

if ($kode == "create") {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $rekening = $_POST['rekening'];

    $query = mysqli_query($mysqli, "INSERT INTO metode_topup (nama, jenis, rekening) VALUES ('$nama', '$jenis', '$rekening')");
    if ($query) {
        $return_arr = array(
            "status" => "success",
            "message" => "Metode Topup Berhasil Ditambahkan"
        );
    } else {
        $return_arr = array(
            "status" => "error",
            "message" => "Metode Topup Gagal Ditambahkan"
        );
    }
} else if ($kode == "update") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $rekening = $_POST['rekening'];

    $query = mysqli_query($mysqli, "UPDATE metode_topup SET nama='$nama', jenis='$jenis', rekening='$rekening' WHERE id_metode='$id'");
    if ($query) {
        $return_arr = array(
            "status" => "success",
            "message" => "Metode Topup Berhasil Diupdate"
        );
    } else {
        $return_arr = array(
            "status" => "error",
            "message" => "Metode Topup Gagal Diupdate"
        );
    }
} else {
    $id = $_POST['id'];

    $query = mysqli_query($mysqli, "DELETE FROM metode_topup WHERE id_metode='$id'");
    if ($query) {
        $return_arr = array(
            "status" => "success",
            "message" => "Metode Topup Berhasil Dihapus"
        );
    } else {
        $return_arr = array(
            "status" => "error",
            "message" => "Metode Topup Gagal Dihapus"
        );
    }
}

echo json_encode($return_arr);

$mysqli->close();
