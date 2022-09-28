<?php
session_start();
$email = $_SESSION['email'];
require('../../includes/config.php');

$return_arr = array();
$kode = $_POST['kode'];

if ($kode == "update") {

    $id = $_POST['topup_id'];
    $status = $_POST['topup_status'];

    if (!$id || !$status) {
        $return_arr = array(
            "status" => "error",
            "message" => "Semua kolom harus diisi"
        );
    } else {
        // Matikan autocommit 
        $mysqli->autocommit(FALSE);

        // Mulai transaksi
        $mysqli->begin_transaction();

        if ($status == "success") {
            $query = mysqli_query($mysqli, "UPDATE history_topup SET status = 'success' WHERE id_topup = '$id'");
            $query = mysqli_query($mysqli, "UPDATE user SET balance = balance + (SELECT nominal FROM history_topup WHERE id_topup = '$id') WHERE email = (SELECT email FROM history_topup WHERE id_topup = '$id')");
            if ($query) {
                $return_arr = array(
                    "status" => "success",
                    "message" => "Data berhasil diupdate"
                );
                $mysqli->commit();
            } else {
                $return_arr = array(
                    "status" => "error",
                    "message" => "Data gagal diupdate"
                );
                $mysqli->rollback();
            }
        } else {
            $query = mysqli_query($mysqli, "UPDATE history_topup SET status = '$status' WHERE id_topup = '$id'");
            if ($query) {
                $return_arr = array(
                    "status" => "success",
                    "message" => "Data berhasil diupdate"
                );
                $mysqli->commit();
            } else {
                $return_arr = array(
                    "status" => "error",
                    "message" => "Data gagal diupdate"
                );
                $mysqli->rollback();
            }
        }
        $mysqli->close();
    }
} else {
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
}

echo json_encode($return_arr);

$mysqli->close();
