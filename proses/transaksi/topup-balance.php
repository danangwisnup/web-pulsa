<?php
session_start();
if (!isset($_SESSION['email'])) {
    die("<script>window.location = '/'</script>");
}
?>

<?php

$email = $_SESSION['email'];
require('../../includes/config.php');
include('../../includes/query.php');

$metode = $_POST['metode'];
$nominal = preg_replace("/[^0-9]/", "", $_POST['nominal']);

//validasi form
if ($metode == "") {
    echo "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Metode tidak boleh kosong.</div>";
} else if ($nominal == "") {
    echo "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Nominal tidak boleh kosong.</div>";
} else if (!preg_match("/^[0-9]+$/", $nominal)) {
    echo "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Nominal tidak valid.</div>";
} else if ($nominal < 10000) {
    echo "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Nominal minimal Rp. 10.000.</div>";
} else {

    // Query mengambil data table metode
    $query_metode = mysqli_query($mysqli, "SELECT * FROM metode_topup WHERE id_metode = '" . $metode . "'");
    $result_metode = mysqli_fetch_array($query_metode);
    $nama_metode = $result_metode['nama'];
    $jenis_metode = $result_metode['jenis'];

    $query_history = mysqli_query($mysqli, "SELECT * FROM history_topup WHERE email = '" . $email . "' AND status = 'Pending'");
    $row_history_pending = mysqli_num_rows($query_history);

    if ($row_history_pending > 0) {
        echo "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Anda masih memiliki transaksi topup yang belum selesai.</div>";
    } else {
        // Matikan autocommit 
        $mysqli->autocommit(FALSE);

        // Mulai transaksi
        $mysqli->begin_transaction();
        //$mysqli->query("UPDATE user SET balance = balance + '" . $nominal . "' WHERE email = '" . $email . "'");
        $mysqli->query("INSERT INTO history_topup (email,id_metode,nominal,tanggal,status) VALUES ('" . $email . "','" . $metode . "','" . $nominal . "',NOW(),'pending')");

        if ($mysqli->commit()) {
            $mysqli->autocommit(TRUE);
            echo "<div class='alert alert-success' role='alert'>";
            echo "<strong>Topup Balance Berhasil <br />";
            echo "Jenis Metode : $jenis_metode <br />";
            echo "a/n " . $nama_metode . " <br />";
            echo "Rekening : $nominal <br />";
            echo "Nominal : Rp " . number_format((float)$nominal, 0, ',', '.') . ",00 <br />";
            echo date('d-m-Y H:i:s') . "<br /><br />";
            echo "Konfirmasi pembayaran dapat dilakukan melalui menu Konfirmasi Topup Balance</a>";
            echo "</strong></div>";
        } else {
            $mysqli->rollback();
            echo "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Topup saldo gagal.</div>";
        }

        $mysqli->close();
    }
}
