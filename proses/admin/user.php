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

if ($kode == "update") {
    $email = $_POST['user_email'];
    $nama = $_POST['user_nama'];
    $level = $_POST['user_level'];
    $balance = $_POST['user_balance'];
    $status = $_POST['user_status'];

    if (!$email || !$nama || !$level || !$status) {
        $return_arr = array(
            "status" => "error",
            "message" => "Semua kolom harus diisi"
        );
    } else {
        $mysqli->query("UPDATE user SET nama = '$nama', level = '$level', balance = '$balance', status = '$status' WHERE email = '$email'");
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
    }
} else {
    $id = $_POST['id'];

    if ($id == '') {
        $return_arr = array(
            "status" => "error",
            "message" => "ID tidak boleh kosong"
        );
    } else {
        $mysqli->query("DELETE FROM user WHERE id_user = '$id'");
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
}

// menampilkan data dalam bentuk json
echo json_encode($return_arr);

// mysqli close
$mysqli->close();
