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
    <?php include 'includes/sidebar.php'; ?>
</nav>