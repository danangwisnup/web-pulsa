<div class="card">
    <div class="card-body">
        <button class="btn btn-dark float-right" onclick="load('pages/admin/provider-add');"><i class="fa fa-plus"></i> Add Metode Topup</button>
        <h4 class="card-title">Manajemen Metode Topup</h4>
        <form action="javascript:;" class="forms-sample" id="form">
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID #</th>
                                <th>Jenis Topup</th>
                                <th>Nama</th>
                                <th>Rekening</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            session_start();
                            $email = $_SESSION['email'];
                            require('../../includes/config.php');
                            $query = mysqli_query($mysqli, "SELECT * FROM metode_topup");
                            $no = 1;
                            while ($result = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $result['jenis']; ?></td>
                                    <td><?= $result['nama']; ?></td>
                                    <td><?= $result['rekening']; ?></td>
                                    <td>
                                        <button type="submit" class="badge btn-dark" onclick="metode_read(<?php echo $result['id_metode']; ?>)" data-toggle="modal" data-target="#pembelian_modal_view"><i class="fa fa-pencil"></i></button>
                                        <button type="submit" class="badge btn-danger" onclick="metode_delete(<?php echo $result['id_metode']; ?>)"><i class="fa fa-remove"></i></button>
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