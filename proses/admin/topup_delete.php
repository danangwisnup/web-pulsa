<?php
session_start();
require('../../includes/config.php');

$return_arr = array();

$id = $_POST['id'];

if ($id == '') {
    $return_arr = array(
        "status" => "error",
        "message" => "ID tidak boleh kosong"
    );
} else {
    $query = mysqli_query($mysqli, "DELETE FROM history_topup WHERE id_topup = '$id'");
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
