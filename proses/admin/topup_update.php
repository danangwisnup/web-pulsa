<?php
session_start();
$email = $_SESSION['email'];
require('../../includes/config.php');

$id = $_POST['topup_id'];
$status = $_POST['topup_status'];

$return_arr = array();

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
        $query2 = mysqli_query($mysqli, "UPDATE user SET balance = balance + (SELECT nominal FROM history_topup WHERE id_topup = '$id') WHERE email = (SELECT email FROM history_topup WHERE id_topup = '$id')");
        if ($query && $query2) {
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

echo json_encode($return_arr);
