<?php
session_start();
require('../../includes/config.php');

$return_arr = array();
$kode = $_POST['kode'];

if ($kode == "create") {
    $provider_name = $_POST['provider_nama'];
    $query = mysqli_query($mysqli, "INSERT INTO provider_pulsa (nama) VALUES ('$provider_name')");
    if ($query) {
        $return_arr = array(
            "status" => "success",
            "message" => "Data berhasil ditambahkan"
        );
    } else {
        $return_arr = array(
            "status" => "error",
            "message" => "Data gagal ditambahkan"
        );
    }
} else if ($kode == "update") {
    $id = $_POST['id'];
    $provider_name = $_POST['provider_nama'];
    $query = mysqli_query($mysqli, "UPDATE provider_pulsa SET nama = '$provider_name' WHERE id_provider = '$id'");
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
} else {
    $id = $_POST['id'];
    $query = mysqli_query($mysqli, "DELETE FROM provider_pulsa WHERE id_provider = '$id'");
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

echo json_encode($return_arr);

$mysqli->close();
