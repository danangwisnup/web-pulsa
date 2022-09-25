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

$nohp = $_POST['nohp'];
$providers = $_POST['providers'];
$nominal = $_POST['nominal'];

//validasi form
if ($nohp == "") {
    echo "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Nomor HP tidak boleh kosong.</div>";
} else if ($providers == "") {
    echo "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Providers tidak boleh kosong.</div>";
} else if ($nominal == "") {
    echo "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Nominal tidak boleh kosong.</div>";
} else if (!preg_match("/^[0-9]{10,14}+$/", $nohp)) {
    echo "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Nomor HP tidak valid.</div>";
} else {

    // Query mengambil data table provider
    $query_provider = mysqli_query($mysqli, "SELECT * FROM provider_pulsa WHERE id_provider = '" . $providers . "'");
    $result_provider = mysqli_fetch_array($query_provider);
    $nama_provider = $result_provider['nama'];

    // Query mengambil data table stock pulsa
    $query_nominal = mysqli_query($mysqli, "SELECT * FROM nominal_pulsa WHERE nominal = '" . $nominal . "'");
    $result_nominal = mysqli_fetch_array($query_nominal);
    $harga_pulsa = $result_nominal['harga'];

    if ($u_balance < $harga_pulsa) {
        echo "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Saldo anda tidak mencukupi.</div>";
    } else {

        // Matikan autocommit 
        $mysqli->autocommit(FALSE);

        // Mulai transaksi
        $mysqli->begin_transaction();
        $mysqli->query("UPDATE user SET balance = balance - '" . $harga_pulsa . "' WHERE email = '" . $email . "'");
        $mysqli->query("INSERT INTO history_pembelian (id_provider,email,deskripsi,harga,tanggal,status) VALUES ('$providers','$email','Pembelian Pulsa $nominal - $nama_provider','$harga_pulsa',NOW(),'pending')");

        if ($mysqli->commit()) {
            $mysqli->autocommit(TRUE);
            echo "<div class='alert alert-success' role='alert'>";
            echo "<strong>Pembelian Pulsa Berhasil <br />";
            echo "Nomor HP : $nohp <br />";
            echo "Providers : $nama_provider <br />";
            echo "Nominal : Rp " . number_format((float)$nominal, 0, ',', '.') . ",00 <br />";
            echo "Harga : Rp " . number_format((float)$harga_pulsa, 0, ',', '.') . ",00 <br />";
            echo "Sisa Saldo : Rp " . number_format((float)$u_balance - $harga_pulsa, 0, ',', '.') . ",00 <br />";
            echo date('d-m-Y H:i:s');
            echo "</strong></div>";
        } else {
            $mysqli->rollback();
            echo "<div class='alert alert-danger' role='alert'>";
            echo "<strong>Pembelian Pulsa Gagal</strong>";
            echo "</div>";
        }

        $mysqli->close();
    }
}
