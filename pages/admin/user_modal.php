<div class="modal fade" id="user_modal_view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col">
                            <label for="recipient-name" class="col-form-label">Nama </label>
                            <input type="text" class="form-control" id="user_nama" name="user_nama">
                        </div>
                        <div class="col">
                            <label for="recipient-name" class="col-form-label">Level </label>
                            <select class="form-control" id="user_level" name="user_level">
                                <option value="">-- Pilih Level --</option>
                                <option value="admin">Admin</option>
                                <option value="member">Member</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email </label>
                        <input type="text" class="form-control" id="user_email" name="user_email" readonly>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="recipient-name" class="col-form-label">Balance </label>
                            <input type="text" class="form-control" id="user_balance" name="user_balance">
                        </div>
                        <div class="col">
                            <label for="recipient-name" class="col-form-label">Status </label>
                            <select class="form-control" id="user_status" name="user_status">
                                <option value="">-- Pilih Status --</option>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" data-dismiss="modal" onclick="user_update()">Submit</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>