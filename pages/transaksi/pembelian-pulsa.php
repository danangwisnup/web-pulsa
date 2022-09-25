<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pembelian Pulsa</h4>
                <form action="javascript:;" class="forms-sample" id="form">
                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="number" class="form-control" id="nohp" name="nohp" placeholder="Nomor HP" required>
                    </div>
                    <div class="form-group">
                        <label>Providers</label>
                        <select class="form-control" id="providers" name="providers" required>
                            <option value="">-- Pilih Providers --</option>
                            <?php
                            require('../../includes/config.php');
                            $query_provider = mysqli_query($mysqli, "SELECT * FROM provider_pulsa ORDER BY id_provider");
                            while ($result_provider = mysqli_fetch_array($query_provider)) { ?>
                                <option value="<?php echo $result_provider['id_provider']; ?>"><?php echo $result_provider['nama']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nominal Pulsa</label>
                        <select class="form-control" id="nominal" name="nominal" required>
                            <option value="">-- Pilih Nominal --</option>
                            <?php
                            $query_nominal = mysqli_query($mysqli, "SELECT * FROM nominal_pulsa ORDER BY nominal");
                            while ($result_nominal = mysqli_fetch_array($query_nominal)) { ?>
                                <option value="<?php echo $result_nominal['nominal']; ?>"><?php echo $result_nominal['nominal']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" onclick="pembelian_pulsa();">Submit</button>
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