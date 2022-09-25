<div class="card">
    <div class="card-body">
        <h4 class="card-title">Manajemen Pembelian</h4>
        <form action="javascript:;" class="forms-sample" id="form">
            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>ID #</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            session_start();
                            $email = $_SESSION['email'];
                            require('../../includes/config.php');
                            $query = mysqli_query($mysqli, "SELECT * FROM history_pembelian");
                            while ($result = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?= $result['id_pembelian']; ?></td>
                                    <td>(<?= $result['email']; ?>) <?= $result['deskripsi']; ?></td>
                                    <td><?= $result['harga']; ?></td>
                                    <td><?= $result['tanggal']; ?></td>
                                    <td><?= $result['status']; ?></td>
                                    <td>
                                        <button type="submit" class="badge btn-dark" onclick="pembelian_read(<?php echo $result['id_pembelian']; ?>)" data-toggle="modal" data-target="#pembelian_modal_view"><i class="fa fa-pencil"></i></button>
                                        <button type="submit" class="badge btn-danger" onclick="pembelian_delete(<?php echo $result['id_pembelian']; ?>)"><i class="fa fa-remove"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="assets/js/data-table.js"></script>