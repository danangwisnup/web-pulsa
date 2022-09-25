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
                        <a class="nav-item dropdown-item" href="javascript:;" onclick="load('pages/admin/provider_payment');">Manajemen Provider & Metode</a>
                        </a>
                    </div>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>