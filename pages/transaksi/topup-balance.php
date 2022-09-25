<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Topup Balance</h4>
                <form action="javascript:;" class="forms-sample">
                    <div class="form-group">
                        <label>Metode Pembayaran</label>
                        <select class="form-control" id="metode" name="metode">
                            <option value="">-- Pilih Metode --</option>
                            <?php
                            require('../../includes/config.php');
                            $query_metode = mysqli_query($mysqli, "SELECT * FROM metode_topup ORDER BY id_metode");
                            while ($result_metode = mysqli_fetch_array($query_metode)) { ?>
                                <option value="<?php echo $result_metode['id_metode']; ?>"><?php echo $result_metode['jenis']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Nominal Balance">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" onclick="topup_balance();">Submit</button>
                    <button type="reset" class="btn btn-light">Reset</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Result</h4>
                <div id="result"></div>
            </div>
        </div>
    </div>
</div>