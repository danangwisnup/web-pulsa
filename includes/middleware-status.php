<?php

if ($u_status == "nonaktif") {
    echo "<div class='modal show' data-backdrop='static' data-keyboard='false' id='modal-status' tabindex='-1' role='dialog' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title'>Akun Anda Nonaktif</h5>
                            <a href='logout' class='close'>
                                <span aria-hidden='true'>&times;</span>
                            </a>
                        </div>
                        <div class='modal-body'>
                            <div class='form-group row'>
                                <p>Akun Anda telah dinonaktifkan oleh admin. Silahkan hubungi admin untuk mengaktifkan kembali akun Anda.</p>
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <a href='logout' class='btn btn-success'>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <script src='https://code.jquery.com/jquery-3.6.1.min.js'></script>
            <script>
                $(document).ready(function() {
                    $('#modal-status').modal('show');
                });
            </script>";
}
