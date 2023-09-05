<?php
include('../class/User.php');
include('../class/Title.php');
include('../class/Outlet.php');
include('../class/Member.php');
include('../class/Paket.php');
include('../class/Transaksi.php');
include('../config.php');


// SET TITLE
$titleObj = new Title();
$title = $titleObj->showTitle('Dashboard');

$user = new User();
$outlet = new Outlet();
$pelanggan = new Member();
$paket = new Paket();
$transaksi = new Transaksi();


session_start();

if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    header("Location: $base_url/blocked.php");
}

$userId = $_SESSION['id'];
$userProfile = $user->find($userId);


include('../partials/header.php');
include('../partials/sidebar.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php $totalPelanggan = count($pelanggan->all()); ?>
                            <h3><?= $totalPelanggan; ?></h3>

                            <p>Pelanggan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="master_data/data_pengguna/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php $totalOutlet = count($outlet->all()); ?>
                            <h3><?= $totalOutlet; ?></h3>

                            <p>Outlet</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-home"></i>
                        </div>
                        <a href="master_data/data_outlet/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php $totalPaket = count($paket->all()); ?>
                            <h3><?= $totalPaket; ?></h3>
                            <p>Paket</p>
                        </div>

                        <div class="icon">
                            <i class="ion ion-ios-box"></i>
                        </div>
                        <a href="master_data/data_paket/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <?php $totalTransaksi = count($transaksi->all()); ?>
                            <h3><?= $totalTransaksi; ?></h3>

                            <p>Transaksi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-arrow-swap"></i>
                        </div>
                        <a href="entri_transaksi/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">

                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include('../partials/footer.php'); ?>