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
    $nominal = $_POST['nominal'];
    $harga = $_POST['harga'];
    $query = mysqli_query($mysqli, "INSERT INTO nominal_pulsa (nominal, harga) VALUES ('$nominal', '$harga')");
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
    $nominal = $_POST['nominal'];
    $harga = $_POST['harga'];
    $query = mysqli_query($mysqli, "UPDATE nominal_pulsa SET nominal = '$nominal', harga = '$harga' WHERE id_pulsa = '$id'");
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
    $query = mysqli_query($mysqli, "DELETE FROM nominal_pulsa WHERE id_pulsa = '$id'");
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

// menampilkan data dalam bentuk json
echo json_encode($return_arr);

// mysqli close
$mysqli->close();
