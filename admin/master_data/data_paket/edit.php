<?php
include_once('../../../class/Outlet.php');
include_once('../../../class/Paket.php');
include_once('../../../class/User.php');
include('../../../class/Title.php');

// SET TITLE
$titleObj = new Title();
$title = $titleObj->showTitle('Edit Paket');

$user = new User();
$paket = new Paket();
$outlet = new Outlet();


session_start();

$userId = $_SESSION['id'];
$userProfile = $user->find($userId);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data_paket = $paket->find($id);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $paket->update($id, $_POST);

        header("Location: index.php?edit_success=true");
    }
} else {
    header("Location: index.php");
    exit;
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
                    <h1 class="m-0">Edit Paket</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Data Paket</a></li>
                        <li class="breadcrumb-item active">Edit Paket</li>
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
                            <h3 class="card-title">Edit form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Outlet</label>
                                    <?php $outletList = $outlet->all(); ?>
                                    <select name="id_outlet" class="form-control select2bs4" style="width: 100%">
                                        <?php foreach ($outletList as $outlet) : ?>
                                            <option value="<?= $outlet['id'] ?>" <?php if ($data_paket['id_outlet'] == $outlet['id']) echo 'selected'; ?>>
                                                <?= $outlet['nama']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <select name="jenis" class="form-control select2bs4" style="width: 100%">
                                        <option value="kiloan" <?= ($data_paket['jenis'] === "kiloan") ? 'selected' : '' ?>>Kiloan</option>
                                        <option value="selimut" <?= ($data_paket['jenis'] === "selimut") ? 'selected' : '' ?>>Selimut</option>
                                        <option value="bed_cover" <?= ($data_paket['jenis'] === "bed_cover") ? 'selected' : '' ?>>Bed Cover</option>
                                        <option value="kaos" <?= ($data_paket['jenis'] === "kaos") ? 'selected' : '' ?>>Kaos</option>
                                        <option value="lain" <?= ($data_paket['jenis'] === "lain") ? 'selected' : '' ?>>Lain-lain</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nama_paket">Nama Paket</label>
                                    <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="Masukkan nama_paket outlet" value="<?= $data_paket['nama_paket']; ?>" required />
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan nomor telepon" value="<?= $data_paket['harga']; ?>" required />
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    Edit
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