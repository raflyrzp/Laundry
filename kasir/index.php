<?php
include('../class/User.php');
include('../class/Title.php');
include('../config.php');


// SET TITLE
$titleObj = new Title();
$title = $titleObj->showTitle('Dashboard');

$user = new User();


session_start();

if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'kasir') {
    header("Location: $base_url/blocked.php");
}

$userId = $_SESSION['id'];
$userProfile = $user->find($userId);


include('../partials/header.php');
include('../partials/sidebar_kasir.php');
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
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5>
                            Ciao! <?= $userProfile['nama']; ?>
                        </h5>
                        Selamat datang di Rafurii Laundry, website Laundry yang dibuat oleh Rafly "a"nya Adel
                    </div>
                </div>
            </div>
            <!-- Main row -->
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