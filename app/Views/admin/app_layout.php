<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV Gedrian Intimed Abadi</title>
    <link rel="shortcut icon" type="image/png" href="/admin/images/logos/logocv.png" />
    <link rel="stylesheet" href="/admin/css/styles.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">    
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="/" class="text-nowrap logo-img">
                        <img src="/admin/images/logos/logo.png" width="100" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <?php $level = App\Models\UserModel::data()['level'] ?>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Menu</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/dashboard" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <?php if ($level == 'Staf Pemasaran' || $level == 'Manajer Pemasaran'): ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="/admin/produk" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-box"></i>
                                    </span>
                                    <span class="hide-menu">Produk</span>
                                </a>
                            </li>
                        <?php endif ?>
                        <?php if ($level == 'Staf Pemasaran' || $level == 'Manajer Pemasaran'): ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="/admin/produk/pengajuan_edit_produk" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-archive"></i>
                                    </span>
                                    <span class="hide-menu"> Pengajuan Edit Produk</span>
                                </a>
                            </li>
                        <?php endif ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="/admin/pemesanan" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-shopping-cart"></i>
                                    </span>
                                    <span class="hide-menu">Pesanan</span>
                                </a>
                            </li>

                        <?php if ($level == 'Manajer Operasional'): ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="/admin/validasi_dokumen" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-report"></i>
                                    </span>
                                    <span class="hide-menu">Validasi Dokumen</span>
                                </a>
                            </li>
                        <?php endif ?>

                        <?php if ($level == 'Staf Pemasaran'): ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="/admin/konsumen" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-users"></i>
                                    </span>
                                    <span class="hide-menu">Data Konsumen</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="/admin/staf" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-users"></i>
                                    </span>
                                    <span class="hide-menu">Data Staf</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="/admin/chat" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-message"></i>
                                    </span>
                                    <span class="hide-menu">Chat</span>
                                </a>
                            </li>
                        <?php endif ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <p class="mb-0 fw-bold"> <?= App\Models\UserModel::data()['level'] ?></p>

                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="/admin/images/profile/admin.png" alt="" width="35" height="35" class="rounded-circle">
                                </a>

                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="/logout"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block"
                                            style="bottom: 20px; left: 0; right: 0;">
                                            <i class="ti ti-logout me-2"></i> Logout
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <?= $this->renderSection('konten') ?>

        </div>
    </div>

    <?php if (!empty(session()->getFlashdata('success'))): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "<?= session()->getFlashdata('success') ?>"
            })
        </script>
    <?php endif ?>

    <script src="/admin/libs/jquery/dist/jquery.min.js"></script>
    <script src="/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/admin/js/sidebarmenu.js"></script>
    <script src="/admin/js/app.min.js"></script>
    <script src="/admin/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="/admin/libs/simplebar/dist/simplebar.js"></script>
    <script src="/admin/js/dashboard.js"></script>
</body>

</html>