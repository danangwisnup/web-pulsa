<div class="card">
    <div class="card-body">
        <h4 class="card-title">Manajemen Topup</h4>
        <form action="javascript:;" class="forms-sample" id="form">
            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>ID #</th>
                                <th>Deskripsi</th>
                                <th>Nominal</th>
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
                            $query = mysqli_query($mysqli, "SELECT * FROM history_topup ORDER BY id_topup DESC");
                            $no = 1;
                            while ($result = mysqli_fetch_array($query)) {
                                $querey_metode_topup = mysqli_query($mysqli, "SELECT * FROM metode_topup WHERE id_metode = '$result[id_metode]'");
                                $result_metode_topup = mysqli_fetch_array($querey_metode_topup);
                                $data = "'" . $result['id_topup'] . "','" .
                                    $result['email'] . "','" .
                                    $result_metode_topup['jenis'] . "','" .
                                    $result['nominal'] . "','" .
                                    $result['status'] . "'";
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $result['deskripsi']; ?></td>
                                    <td><?= $result['nominal']; ?></td>
                                    <td><?= $result['tanggal']; ?></td>
                                    <?php if ($result['status'] == 'success') { ?>
                                        <td><label class="badge badge-success"><?= $result['status']; ?></label></td>
                                    <?php } else if ($result['status'] == 'pending') { ?>
                                        <td><label class="badge badge-warning"><?= $result['status']; ?></label></td>
                                    <?php } else { ?>
                                        <td><label class="badge badge-danger"><?= $result['status']; ?></label></td>
                                    <?php } ?>
                                    <td>
                                        <button type="submit" class="badge btn-dark" onclick="topup_read(<?= $data; ?>)" data-toggle="modal" data-target="#topup_modal_view"><i class="fa fa-pencil"></i></button>
                                        <button type="submit" class="badge btn-danger" onclick="topup_delete(<?= $result['id_topup']; ?>)"><i class="fa fa-remove"></i></button>
                                    </td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="assets/js/data-table.js"></script>