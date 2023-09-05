<?php
$rootPath = realpath(__DIR__ . '/../');
include($rootPath . '/config.php');
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= $base_url ?>/admin/index.php" class="brand-link">
        <img src="<?= $base_url ?>/assets/dist/img/logo64.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Laundry</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $base_url ?>/assets/dist/img/admin.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $userProfile['nama']; ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= $base_url; ?>/admin/index.php" class="nav-link <?= $title === 'Laundry | Dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- MASTER DATA -->
                <li class="nav-item">
                    <a href="" class="nav-link 
                    <?php if (strpos($title, 'Paket') || strpos($title, 'Pengguna') || strpos($title, 'Outlet'))
                        echo 'active';
                    ?>">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Master Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $base_url ?>/admin/master_data/data_outlet/index.php" class="nav-link
                            <?php if (strpos($title, 'Outlet'))
                                echo 'active';
                            ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Data Outlet</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= $base_url ?>/admin/master_data/data_paket/index.php" class="nav-link 
                            <?php if (strpos($title, 'Paket'))
                                echo 'active';
                            ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Data Paket</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= $base_url ?>/admin/master_data/data_pengguna/index.php" class="nav-link 
                            <?php if (strpos($title, 'Pengguna'))
                                echo 'active';
                            ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Data Pengguna</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- REGISTRASI PELANGGAN -->
                <li class="nav-item">
                    <a href="<?= $base_url ?>/admin/registrasi_pelanggan/index.php" class="nav-link <?php if (strpos($title, 'Pelanggan'))
                                echo 'active';
                            ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Registrasi Pelanggan
                        </p>
                    </a>
                </li>

                <!-- ENTRI TRANSAKSI -->
                <li class="nav-item">
                    <a href="<?= $base_url ?>/admin/entri_transaksi/index.php" class="nav-link <?php if (strpos($title, 'Transaksi'))
                                echo 'active';
                            ?>">
                        <i class="nav-icon fas fa-exchange-alt"></i>
                        <p>
                            Entri Transaksi
                        </p>
                    </a>
                </li>

                <!-- PESAN -->
                <li class="nav-item">
                    <a href="<?= $base_url ?>/admin/laporan/index.php" class="nav-link <?= ($title === 'Laundry | Laporan') ? ' active' : '' ?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>


                <li class="nav-header">LANJUTAN</li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>/logout.php" class="nav-link" onclick="return confirm('Apakah anda yakin ingin Logout?')">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>