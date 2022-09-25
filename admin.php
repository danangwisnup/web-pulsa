<?php
$title = "Dashboard";
include('includes/header.php');
?>
<div class="container-scroller">

    <!-- partial:partials/_horizontal-navbar.html -->
    <?php include('includes/navbar.php'); ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card bg-primary text-white border-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <i class="icon-user icon-lg"></i>
                                    <div class="ml-4">
                                        <h4 class="font-weight-light">Total User</h4>
                                        <h3 class="font-weight-light mb-3">37, 650</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card bg-dark text-white border-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <i class="icon-handbag icon-lg"></i>
                                    <div class="ml-4">
                                        <h4 class="font-weight-light">Pembelian Pulsa</h4>
                                        <h3 class="font-weight-light mb-3">75, 650</h3>
                                        <p class="mb-0 font-weight-light">Total : </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card bg-danger text-white border-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <i class="icon-screen-desktop icon-lg"></i>
                                    <div class="ml-4">
                                        <h4 class="font-weight-light">Topup Balance</h4>
                                        <h3 class="font-weight-light mb-3">1349</h3>
                                        <p class="mb-0 font-weight-light">Total : </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card bg-success text-white border-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <i class="icon-support icon-lg"></i>
                                    <div class="ml-4">
                                        <h4 class="font-weight-light">Total Keseluruhan</h4>
                                        <h3 class="font-weight-light mb-3">35.4545.454</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 grid-margin stretch-card" id="partialPage">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Berita</h4>
                                <div class="alert bg-danger">
                                    Tidak ada berita
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Informasi</h4>
                                <div class="alert alert-success">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis ratione temporibus, molestiae quaerat aspernatur minima provident atque dolore. Corrupti excepturi eaque aliquid odit voluptatibus magni quasi provident voluptate corporis exercitationem.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<?php include('includes/footer.php'); ?>