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
    $provider_name = $_POST['provider_nama'];
    $mysqli->query("INSERT INTO provider_pulsa (nama) VALUES ('$provider_name')");
    if ($mysqli) {
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
    $mysqli->query("UPDATE provider_pulsa SET nama = '$provider_name' WHERE id_provider = '$id'");
    if ($mysqli) {
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
    $mysqli->query("DELETE FROM provider_pulsa WHERE id_provider = '$id'");
    if ($mysqli) {
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

// menampilkan data dalam bentuk json
echo json_encode($return_arr);

// mysqli close
$mysqli->close();
