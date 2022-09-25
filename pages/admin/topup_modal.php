<div class="modal fade" id="topup_modal_view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Topup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-2">
                            <label for="recipient-name" class="col-form-label">#Order </label>
                            <input type="text" class="form-control" id="topup_id" name="topup_id" readonly>
                        </div>
                        <div class="col-10">
                            <label for="recipient-name" class="col-form-label">Email </label>
                            <input type="text" class="form-control" id="topup_email" name="topup_email" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Deskripsi </label>
                        <h6 id="topup_deskripsi" name="topup_deskripsi"></h6>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="recipient-name" class="col-form-label">Nominal </label>
                            <input type="text" class="form-control" id="topup_nominal" name="topup_nominal" readonly>
                        </div>
                        <div class="col">
                            <label for="recipient-name" class="col-form-label">Status </label>
                            <select class="form-control" id="topup_status" name="topup_status">
                                <option value="">-- Pilih Status --</option>
                                <option value="pending">Pending</option>
                                <option value="success">Success</option>
                                <option value="failed">Failed</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" data-dismiss="modal" onclick="topup_update()">Submit</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>