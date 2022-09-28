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

$return_arr = array();
$kode = $_POST['kode'];

if ($kode == "create") {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $rekening = $_POST['rekening'];

    $mysqli->query("INSERT INTO metode_topup (nama, jenis, rekening) VALUES ('$nama', '$jenis', '$rekening')");
    if ($mysqli) {
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

    $mysqli->query("UPDATE metode_topup SET nama = '$nama', jenis = '$jenis', rekening = '$rekening' WHERE id_metode = '$id'");
    if ($mysqli) {
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

    $mysqli->query("DELETE FROM metode_topup WHERE id_metode='$id'");
    if ($mysqli) {
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

// menampilkan data dalam bentuk json
echo json_encode($return_arr);

// mysqli close
$mysqli->close();
