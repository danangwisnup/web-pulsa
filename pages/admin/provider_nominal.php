<div class="row">
    <div class="col-md-6 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Manajemen Provider</h4>
                <form action="javascript:;" class="forms-sample" id="form">
                    <div class="row">
                        <table class="table">
                            <tr>
                                <td><input type="text" class="form-control" id="provider_nama_new"></td>
                                <td><button type="submit" class="btn btn-primary" onclick="provider_create()"><i class="fa fa-plus"></i> Add Provider</button></td>
                            </tr>
                        </table>
                        <div class="col-12 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID #</th>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    session_start();
                                    $email = $_SESSION['email'];
                                    require('../../includes/config.php');
                                    $query = mysqli_query($mysqli, "SELECT * FROM provider_pulsa");
                                    $no = 1;
                                    while ($result = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><input type="text" class="form-control" id="provider_nama_<?= $result['id_provider']; ?>" value="<?= $result['nama']; ?>"></td>
                                            <td>
                                                <button type="submit" class="badge btn-success" onclick="provider_update(<?= $result['id_provider']; ?>)"><i class="fa fa-save"></i></button>
                                                <button type="submit" class="badge btn-danger" onclick="provider_delete(<?= $result['id_provider']; ?>)"><i class="fa fa-remove"></i></button>
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
    </div>
    <div class="col-md-6 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Manajemen Nominal Pulsa</h4>
                <form action="javascript:;" class="forms-sample" id="form">
                    <div class="row">
                        <table class="table">
                            <tr>
                                <td><input type="number" class="form-control" id="nominal_new" placeholder="Nominal"></td>
                                <td><input type="number" class="form-control" id="harga_new" placeholder="Harga"></td>
                                <td><button type="submit" class="btn btn-primary" onclick="nominal_create()"><i class="fa fa-plus"></i> Add Nominal</button></td>
                            </tr>
                        </table>
                        <div class="col-12 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID #</th>
                                        <th>Nominal</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($mysqli, "SELECT * FROM nominal_pulsa");
                                    $no = 1;
                                    while ($result = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><input type="text" class="form-control" id="nominal_<?= $result['id_pulsa']; ?>" value="<?= $result['nominal']; ?>"></td>
                                            <td><input type="text" class="form-control" id="harga_<?= $result['id_pulsa']; ?>" value="<?= $result['harga']; ?>"></td>
                                            <td>
                                                <button type="submit" class="badge btn-success" onclick="nominal_update(<?= $result['id_pulsa']; ?>)"><i class="fa fa-save"></i></button>
                                                <button type="submit" class="badge btn-danger" onclick="nominal_delete(<?= $result['id_pulsa']; ?>)"><i class="fa fa-remove"></i></button>
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
    </div>
</div>


<script src="assets/js/data-table.js"></script>