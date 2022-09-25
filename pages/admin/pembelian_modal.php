<div class="modal fade" id="pembelian_modal_view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Pembelian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-2">
                            <label for="recipient-name" class="col-form-label">#Order </label>
                            <input type="text" class="form-control" id="pembelian_id" name="pembelian_id" readonly>
                        </div>
                        <div class="col-10">
                            <label for="recipient-name" class="col-form-label">Email </label>
                            <input type="text" class="form-control" id="pembelian_email" name="pembelian_email" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Deskripsi </label>
                        <input type="text" class="form-control" id="pembelian_deskripsi" name="pembelian_deskripsi" readonly>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="recipient-name" class="col-form-label">Harga </label>
                            <input type="text" class="form-control" id="pembelian_harga" name="pembelian_harga" readonly>
                        </div>
                        <div class="col">
                            <label for="recipient-name" class="col-form-label">Status </label>
                            <select class="form-control" id="pembelian_status" name="pembelian_status">
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
                <button type="submit" class="btn btn-success" data-dismiss="modal" onclick="pembelian_update()">Submit</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>