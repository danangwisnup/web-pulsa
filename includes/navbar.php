<nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
    <div class="nav-top flex-grow-1">
        <div class="container d-flex flex-row h-100">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top">
                <a class="navbar-brand brand-logo text-white" href="/">
                    <strong>Web Pulsa</strong>
                </a>
                <a class="navbar-brand brand-logo-mini text-white" href="/">
                    <strong>Web Pulsa</strong>
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav navbar-nav-right mr-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="notificationDropdown" href="javascript:;" data-toggle="dropdown">
                            <i class="icon-bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <a class="dropdown-item py-3">
                                <p class="mb-0 font-weight-medium float-left">You have 4 new notifications
                                </p>
                                <span class="badge badge-pill badge-inverse-info float-right">View all</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-inverse-success">
                                        <i class="icon-exclamation mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal text-dark mb-1">Application Error</h6>
                                    <p class="font-weight-light small-text mb-0">
                                        Just now
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-inverse-warning">
                                        <i class="icon-bubble mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal text-dark mb-1">Settings</h6>
                                    <p class="font-weight-light small-text mb-0">
                                        Private message
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-inverse-info">
                                        <i class="icon-user-following mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal text-dark mb-1">New user registration</h6>
                                    <p class="font-weight-light small-text mb-0">
                                        2 days ago
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown nav-profile">
                        <a class="nav-link dropdown-toggle" id="profile" href="javascript:;" data-toggle="dropdown">
                            <span class="nav-profile-text"><?= $u_nama; ?></span>
                            <img src="assets/images/profile.jpg" class="rounded-circle" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profile">
                            <a href="javascript:;" class="dropdown-item">
                                <h6 class="font-weight-normal">Profile</h6>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="logout" class="dropdown-item">
                                <h6 class="font-weight-normal">Logout</h6>
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu text-white"></span>
                </button>
            </div>
        </div>
    </div>
    <div class="nav-bottom" id="nav-bar">
        <div class="container">
            <ul class="nav page-navigation">
                <li class="nav-item active">
                    <a href="/" class="nav-link"><span class="menu-title"><i class="fa fa-desktop"></i> Dashboard</span></a>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" onclick="load('pages/transaksi/pembelian-pulsa');" class=" nav-link"><span class="menu-title"><i class="fa fa-shopping-cart"></i> Pembelian Pulsa</span></a>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" onclick="load('pages/transaksi/topup-balance');" class="nav-link"><span class="menu-title"><i class="fa fa-btc"></i> Topup Balance</span></a>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" class="nav-link" href="javascript:;" data-toggle="dropdown"><span class="menu-title"><i class="fa fa-history"></i> History Transaksi</span><i class="menu-arrow"></i></a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profile">
                        <a class="nav-item dropdown-item" href="javascript:;" onclick="load('pages/transaksi/history-pembelian');">Pembelian Pulsa</a>
                        <div class="dropdown-divider"></div>
                        <a class="nav-item dropdown-item" href="javascript:;" onclick="load('pages/transaksi/history-topup');">Topup Balance</a>
                        </a>
                    </div>
                </li>
                <?php if ($u_level == "admin") : ?>
                    <li class="nav-item"><span class="nav-link"></span></li>
                    <li class="nav-item"><span class="nav-link">|</span></li>
                    <li class="nav-item"><span class="nav-link"></span></li>
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link" href="javascript:;" data-toggle="dropdown"><span class="menu-title"><i class="fa fa-user-secret"></i> Admin Panel</span><i class="menu-arrow"></i></a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profile">
                            <a class="nav-item dropdown-item" href="javascript:;" onclick="load('pages/admin/user');">Manajemen User</a>
                            <div class="dropdown-divider"></div>
                            <a class="nav-item dropdown-item" href="javascript:;" onclick="load('pages/admin/pembelian');">Manajemen Pembelian</a>
                            <div class="dropdown-divider"></div>
                            <a class="nav-item dropdown-item" href="javascript:;" onclick="load('pages/admin/topup');">Manajemen Topup</a>
                            <div class="dropdown-divider"></div>
                            <a class="nav-item dropdown-item" href="javascript:;" onclick="load('pages/admin/provider_nominal');">Manajemen Provider</a>
                            <div class="dropdown-divider"></div>
                            <a class="nav-item dropdown-item" href="javascript:;" onclick="load('pages/admin/metode_topup');">Manajemen Metode Topup</a>

                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>