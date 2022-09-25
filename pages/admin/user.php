<div class="card">
    <div class="card-body">
        <h4 class="card-title">Manajemen User</h4>
        <form action="javascript:;" class="forms-sample" id="form">
            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>ID #</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Balance</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            session_start();
                            $email = $_SESSION['email'];
                            require('../../includes/config.php');
                            $query = mysqli_query($mysqli, "SELECT * FROM user ORDER BY id_user");
                            while ($result = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?= $result['id_user']; ?></td>
                                    <td><?= $result['nama']; ?></td>
                                    <td><?= $result['email']; ?></td>
                                    <td><?= $result['level']; ?></td>
                                    <td><?= $result['balance']; ?></td>
                                    <?php if ($result['status'] == 'aktif') { ?>
                                        <td><label class="badge badge-success"><?= $result['status']; ?></label></td>
                                    <?php } else { ?>
                                        <td><label class="badge badge-danger"><?= $result['status']; ?></label></td>
                                    <?php } ?>

                                    <td>
                                        <button type="submit" class="badge btn-dark" onclick="user_read(<?php echo $result['id_user']; ?>)" data-toggle="modal" data-target="#user_modal_view"><i class="fa fa-pencil"></i></button>
                                        <button type="submit" class="badge btn-danger" onclick="user_delete(<?php echo $result['id_user']; ?>)"><i class="fa fa-remove"></i></button>
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