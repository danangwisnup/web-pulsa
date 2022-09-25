<div class="card">
    <div class="card-body">
        <h4 class="card-title">History Topup</h4>
        <div class="row">
            <div class="col-12 table-responsive">
                <table id="order-listing" class="table">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Deskripsi</th>
                            <th>Nominal</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        session_start();
                        $email = $_SESSION['email'];
                        require('../../includes/config.php');
                        $no = 1;
                        $query_topup = mysqli_query($mysqli, "SELECT * FROM history_topup WHERE email = '$email' ORDER BY id_topup DESC");
                        while ($result_topup = mysqli_fetch_array($query_topup)) {
                            $id_metode = $result_topup['id_metode'];
                            $querey_metode_topup = mysqli_query($mysqli, "SELECT * FROM metode_topup WHERE id_metode = '$id_metode'");
                            $result_metode_topup = mysqli_fetch_array($querey_metode_topup);
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $result_metode_topup['jenis']; ?> - <?= $result_metode_topup['nama']; ?> - <?= $result_metode_topup['rekening']; ?></td>
                                <td><?= $result_topup['nominal']; ?></td>
                                <td><?= $result_topup['tanggal']; ?></td>
                                <td>
                                    <?php if ($result_topup['status'] == 'pending') { ?>
                                        <label class="badge badge-warning"><?= $result_topup['status']; ?></label>
                                    <?php } else if ($result_topup['status'] == 'success') { ?>
                                        <label class="badge badge-success"><?= $result_topup['status']; ?></label>
                                    <?php } else { ?>
                                        <label class="badge badge-danger"><?= $result_topup['status']; ?></label>
                                    <?php } ?>
                                <?php $no++;
                            } ?>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/data-table.js"></script>