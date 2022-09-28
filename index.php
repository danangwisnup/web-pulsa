<?php
session_start();
$email = $_SESSION['email'];

if (!isset($_SESSION['email'])) {
  header('location: ./login');
} else {
  $title = "Dashboard";

  require('includes/config.php');
  include('includes/header.php');
  require('includes/query.php');

?>

  <div class="container-scroller">

    <!-- partial:partials/_horizontal-navbar.html -->
    <?php include('includes/navbar.php'); ?>


    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card table-responsive">
                <div class="card-body">
                  <div class="profile-header">
                    <div class="d-md-flex justify-content-around">
                      <div class="profile-info d-flex align-items-center">
                        <img class="rounded-circle img-lg" src="assets/images/profile.jpg" alt="profile image">
                        <div class="wrapper pl-4">
                          <strong id="getNama"><?= $u_nama; ?></strong>
                          <p class="font-weight-light mb-3"><?= $email; ?></p>
                          <div class="wrapper d-flex align-items-center">
                            <p class="profile-user-designation" id="getLevel"><?= $u_level; ?></p>
                          </div>
                        </div>
                      </div>
                      <div class="profile-info d-flex align-items-center">
                        <div class="detail-col">
                          <br />
                          <div class="bg-success px-4 py-2 text-white rounded">
                            <i class="fa fa-btc text-white icon-lg"></i>
                          </div>
                        </div>
                        <div class="wrapper pl-4">
                          <h4 class="mb-0" id="getBalance"><?= "Rp " . number_format((float)$u_balance, 0, ',', '.') . ",00"; ?></h4>
                          <small class="text-gray">hey, let’s have laugh together</small><br /><br />
                          <button type="submit" onclick="reload_atribut_user()" class="btn btn-outline-light btn-icon-text ml-2 text-dark">
                            <i class="icon-refresh btn-icon-prepend"></i> Reload
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="partialPage">
            <h5>Transaksi Hari Ini, Per <?= date('d-m-Y'); ?></h5><br />
            <div class="row">
              <div class="col-md-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="d-inline-block">
                        <div class="d-md-flex">
                          <h4 class="mb-0"><?= "Rp " . number_format((float)$p_total, 0, ',', '.') . ",00"; ?></h4>
                          <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                            <i class="icon-clock text-muted"></i>
                            <small class=" ml-1 mb-0">Updated: 9:10am</small>
                          </div>
                        </div>
                        <small class="text-gray">Transaksi Pembelian Pulsa: <?= $p_banyak ?></small>
                      </div>
                      <div class="d-inline-block">
                        <div class="bg-dark px-4 py-2 rounded">
                          <i class="fa fa-shopping-cart text-white icon-lg"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="d-inline-block">
                        <div class="d-md-flex">
                          <h4 class="mb-0"><?= "Rp " . number_format((float)$t_total, 0, ',', '.') . ",00"; ?></h4>
                          <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                            <i class="icon-clock text-muted"></i>
                            <small class=" ml-1 mb-0">Updated: 9:10am</small>
                          </div>
                        </div>
                        <small class="text-gray">Transaksi Topup Balance: <?= $t_banyak ?></small>
                      </div>
                      <div class="d-inline-block">
                        <div class="bg-warning px-4 py-2 rounded">
                          <i class="fa fa-money text-white icon-lg"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Berita</h4>
                    <div class="alert alert-danger">
                      Tidak ada berita
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Informasi</h4>
                    <div class="alert alert-success">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis ratione temporibus, molestiae quaerat aspernatur minima provident atque dolore. Corrupti excepturi eaque aliquid odit voluptatibus magni quasi provident voluptate corporis exercitationem.</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- modal user -->
    <?php include('pages/admin/modal/user_modal.php'); ?>
    <!-- modal pembelian -->
    <?php include('pages/admin/modal/pembelian_modal.php'); ?>
    <!-- modal topup -->
    <?php include('pages/admin/modal/topup_modal.php'); ?>
    <?php include_once('includes/middleware-status.php'); ?>

    <?php include('includes/footer.php'); ?>
  <?php } ?>