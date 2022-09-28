<div class="card">
    <div class="card-body">
        <h4 class="card-title">Manajemen Metode Topup</h4>
        <form action="javascript:;" class="forms-sample" id="form">
            <div class="row">
                <table class="table">
                    <tr>
                        <td><input type="text" class="form-control" id="metode_jenis_new" placeholder="Jenis"></td>
                        <td><input type="text" class="form-control" id="metode_nama_new" placeholder="Nama"></td>
                        <td><input type="text" class="form-control" id="metode_rekening_new" placeholder="Rekening"></td>
                        <td><button type="submit" class="btn btn-primary" onclick="metode_create()"><i class="fa fa-plus"></i> Add Metode Topup</button></td>
                    </tr>
                </table>
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
                                    <td><input type="text" class="form-control" id="metode_jenis_<?= $result['id_metode']; ?>" value="<?= $result['jenis']; ?>"></td>
                                    <td><input type="text" class="form-control" id="metode_nama_<?= $result['id_metode']; ?>" value="<?= $result['nama']; ?>"></td>
                                    <td><input type="text" class="form-control" id="metode_rekening_<?= $result['id_metode']; ?>" value="<?= $result['rekening']; ?>"></td>
                                    </td>
                                    <td>
                                        <button type="submit" class="badge btn-success" onclick="metode_update(<?php echo $result['id_metode']; ?>)"><i class="fa fa-save"></i></button>
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