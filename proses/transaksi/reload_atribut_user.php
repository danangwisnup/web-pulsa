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

$query = "SELECT * FROM user WHERE email = '$email'";
$result = $mysqli->query($query);
$row = $result->fetch_assoc();

$return_arr = array(
    "get_nama" => $row['nama'],
    "get_email" => $row['email'],
    "get_balance" => "Rp " . number_format((float)$row['balance'], 0, ',', '.') . ",00",
    "get_level" => $row['level'],
);


// menampilkan data dalam bentuk json
echo json_encode($return_arr);

// mysqli close
$mysqli->close();

