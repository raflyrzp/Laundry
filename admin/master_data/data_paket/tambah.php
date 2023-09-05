<?php
include_once('../../../class/Paket.php');
include_once('../../../class/User.php');
include_once('../../../class/Outlet.php');
include('../../../class/Title.php');

// SET TITLE
$titleObj = new Title();
$title = $titleObj->showTitle('Tambah Paket');


$user = new User();
$paket = new Paket();
$outlet = new Outlet();


session_start();

$userId = $_SESSION['id'];
$userProfile = $user->find($userId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;

    $result = $paket->create($data);

    if ($result === true) {
        header("Location: index.php?create_success=true");
        exit;
    }
}

include_once('../../../partials/header.php');
include_once('../../../partials/sidebar.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Paket</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Data Paket</a></li>
                        <li class="breadcrumb-item active">Tambah Paket</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Main row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Outlet</label>
                                    <?php $outletList = $outlet->all(); ?>
                                    <select name="id_outlet" class="form-control select2bs4" style="width: 100%">
                                    <option disabled selected>--Pilih outlet--</option>
                                        <?php foreach ($outletList as $outlet) : ?>
                                            <option value="<?= $outlet['id'] ?>">
                                                <?= $outlet['nama']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Jenis</label>
                                    <select name="jenis" class="form-control select2bs4" style="width: 100%">
                                        <option disabled selected>--Pilih paket--</option>
                                        <option value="kiloan">Kiloan</option>
                                        <option value="selimut">Selimut</option>
                                        <option value="bed_cover">Bed Cover</option>
                                        <option value="kaos">Kaos</option>
                                        <option value="lain">Lain-lain</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nama_paket">Nama Paket</label>
                                    <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="Masukkan nama paket..." required>
                                </div>

                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan harga paket..." required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    Tambah
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once('../../../partials/footer.php') ?>