<?php
session_start();
$email = $_SESSION['email'];
if (!isset($email)) {
    die("<script>window.location = '/'</script>");
}
?>

<?php
require_once('../../includes/config.php');
include_once('../../includes/query.php');

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
    $query = "SELECT * FROM provider_pulsa WHERE id_provider = '" . $providers . "'";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    $nama_provider = $row['nama'];

    // Query mengambil data table stock pulsa
    $query = "SELECT * FROM nominal_pulsa WHERE nominal = '" . $nominal . "'";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    $harga_pulsa = $row['harga'];

    if ($u_balance < $harga_pulsa) {
        echo "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Saldo anda tidak mencukupi.</div>";
    } else {

        // Matikan autocommit 
        $mysqli->autocommit(FALSE);

        // Mulai transaksi
        $mysqli->begin_transaction();
        $mysqli->query("UPDATE user SET balance = balance - '" . $harga_pulsa . "' WHERE email = '" . $email . "'");
        $mysqli->query("INSERT INTO history_pembelian (id_provider,email,deskripsi,harga,tanggal,status) VALUES ('$providers','$email','Pembelian Pulsa $nominal - $nama_provider - $nohp','$harga_pulsa',NOW(),'pending')");

        if ($mysqli->commit()) {
            $mysqli->autocommit(TRUE);
            echo "<div class='alert alert-success' role='alert'>";
            echo "<strong>Pembelian Pulsa Berhasil </strong><br />";
            echo "Nomor HP : $nohp <br />";
            echo "Providers : $nama_provider <br />";
            echo "Nominal : Rp " . number_format((float)$nominal, 0, ',', '.') . ",00 <br />";
            echo "Harga : Rp " . number_format((float)$harga_pulsa, 0, ',', '.') . ",00 <br />";
            echo "Sisa Saldo : Rp " . number_format((float)$u_balance - $harga_pulsa, 0, ',', '.') . ",00 <br />";
            echo date('d-m-Y H:i:s');
            echo "</div>";
        } else {
            $mysqli->rollback();
            echo "<div class='alert alert-danger' role='alert'>";
            echo "<strong>Pembelian Pulsa Gagal</strong>";
            echo "</div>";
        }
    }
}

// mysqli close
$mysqli->close();

