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

echo "Rp " . number_format((float)$u_balance, 0, ',', '.') . ",00";
