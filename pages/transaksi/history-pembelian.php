<div class="card">
    <div class="card-body">
        <h4 class="card-title">History Pembelian Pulsa</h4>
        <div class="row">
            <div class="col-12 table-responsive">
                <table id="order-listing" class="table">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
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
                        $query_pembelian = mysqli_query($mysqli, "SELECT * FROM history_pembelian WHERE email = '$email' ORDER BY id_pembelian DESC");
                        while ($result_pembelian = mysqli_fetch_array($query_pembelian)) { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $result_pembelian['deskripsi']; ?></td>
                                <td><?= $result_pembelian['harga']; ?></td>
                                <td><?= $result_pembelian['tanggal']; ?></td>
                                <td>
                                    <?php if ($result_pembelian['status'] == 'pending') { ?>
                                        <label class="badge badge-warning"><?= $result_pembelian['status']; ?></label>
                                    <?php } else if ($result_pembelian['status'] == 'success') { ?>
                                        <label class="badge badge-success"><?= $result_pembelian['status']; ?></label>
                                    <?php } else { ?>
                                        <label class="badge badge-danger"><?= $result_pembelian['status']; ?></label>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/data-table.js"></script>