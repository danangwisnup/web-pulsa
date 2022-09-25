<?php

//----------------------------------------------------------------------------------------------//
//asign a query user
$query_user = " SELECT * FROM user WHERE email = '" . $email . "' ";
//excute the query user
$result_user = $mysqli->query($query_user);
$row_user = $result_user->fetch_object();
$u_nama = $row_user->nama;
$u_password = $row_user->password;
$u_level = $row_user->level;
$u_balance = $row_user->balance;
$u_status = $row_user->status;

//----------------------------------------------------------------------------------------------//
//asign a query pembelian
$query_pembelian = " SELECT * FROM history_pembelian WHERE email = '" . $email . "' ";
//excute the query pembelian
$result_pembelian = $mysqli->query($query_pembelian);
if ($result_pembelian->num_rows > 0) {
    $row_pembelian = $result_pembelian->fetch_object();
    $p_id_pembelian = $row_pembelian->id_pembelian;
    $p_id_provider = $row_pembelian->id_provider;
    $p_email = $row_pembelian->email;
    $p_deskripsi = $row_pembelian->deskripsi;
    $p_harga = $row_pembelian->harga;
    $p_tanggal = $row_pembelian->tanggal;
    $p_status = $row_pembelian->status;
    $p_total = $p_harga;
    $p_banyak = 1;
    while ($row_pembelian = $result_pembelian->fetch_object()) {
        $p_total += $row_pembelian->harga;
        $p_banyak++;
    }
} else {
    $p_total = 0;
    $p_banyak = 0;
}

//----------------------------------------------------------------------------------------------//
//asign a query topup
$query_topup = " SELECT * FROM history_topup WHERE email = '" . $email . "' ";
//excute the query topup
$result_topup = $mysqli->query($query_topup);
if ($result_topup->num_rows > 0) {
    $row_topup = $result_topup->fetch_object();
    $t_id_topup = $row_topup->id_topup;
    $t_email = $row_topup->email;
    $t_nominal = $row_topup->nominal;
    $t_tanggal = $row_topup->tanggal;
    $t_status = $row_topup->status;
    $t_total = $t_nominal;
    $t_banyak = 1;
    while ($row_topup = $result_topup->fetch_object()) {
        $t_total += $row_topup->nominal;
        $t_banyak++;
    }
} else {
    $t_total = 0;
    $t_banyak = 0;
}
