<?php
include_once('../../class/Outlet.php');
include_once('../../class/Paket.php');
include_once('../../class/User.php');
include_once('../../class/Transaksi.php');
include_once('../../class/Member.php');
include('../../class/Title.php');

// SET TITLE
$titleObj = new Title();
$title = $titleObj->showTitle('Edit Transaksi');

$user = new User();
$paket = new Paket();
$outlet = new Outlet();
$transaksi = new Transaksi();
$member = new Member();


session_start();

$userId = $_SESSION['id'];
$userProfile = $user->find($userId);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data_transaksi = $transaksi->find($id);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $transaksi->update($id, $_POST);

        header("Location: index.php?edit_success=true");
    }
} else {
    header("Location: index.php");
    exit;
}




include_once('../../partials/header.php');
include_once('../../partials/sidebar_kasir.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Data Transaksi</a></li>
                        <li class="breadcrumb-item active">Edit Transaksi</li>
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
                                    <label>Pilih Member</label>
                                    <?php $memberList = $member->all(); ?>
                                    <select name="id_member" class="form-control select2bs4" style="width: 100%">
                                        <?php foreach ($memberList as $member) : ?>
                                            <option value="<?= $member['id'] ?>" <?php if ($data_transaksi['id_member'] == $member['id']) echo 'selected'; ?>>
                                                <?= $member['nama']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Pilih Paket</label>
                                    <?php $paketList = $paket->all(); ?>
                                    <select name="id_paket" class="form-control select2bs4" style="width: 100%">
                                        <?php foreach ($paketList as $paket) : ?>
                                            <option value="<?= $paket['id'] ?>" <?php if ($data_transaksi['id_paket'] == $paket['id']) echo 'selected'; ?>>
                                                <?= $paket['nama_paket']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Pilih Outlet</label>
                                    <?php $outletList = $outlet->all(); ?>
                                    <select name="id_outlet" class="form-control select2bs4" style="width: 100%">
                                        <?php foreach ($outletList as $outlet) : ?>
                                            <option value="<?= $outlet['id'] ?>" <?php if ($data_transaksi['id_outlet'] == $outlet['id']) echo 'selected'; ?>>
                                                <?= $outlet['nama']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="kode_invoice">Kode Invoice</label>
                                    <input type="text" class="form-control" id="kode_invoice" name="kode_invoice" placeholder="Masukkan kode_invoice outlet" value="<?= $data_transaksi['kode_invoice']; ?>" readonly />
                                </div>

                                <div class="form-group">
                                    <label for="qty">Berat</label>
                                    <input type="text" class="form-control" id="qty" name="qty" placeholder="Masukkan qty outlet" value="<?= $data_transaksi['qty']; ?>" required />
                                </div>
                                <div class="form-group">
                                    <label for="biaya_tambahan">Biaya Tambahan</label>
                                    <input type="text" class="form-control" id="biaya_tambahan" name="biaya_tambahan" placeholder="Masukkan nomor telepon" value="<?= $data_transaksi['biaya_tambahan']; ?>" required />
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control select2bs4" style="width: 100%">
                                        <option value="baru" <?= ($data_transaksi['status'] === "baru") ? 'selected' : '' ?>>Baru</option>
                                        <option value="proses" <?= ($data_transaksi['status'] === "proses") ? 'selected' : '' ?>>Proses</option>
                                        <option value="selesai" <?= ($data_transaksi['status'] === "selesai") ? 'selected' : '' ?>>Selesai</option>
                                        <option value="diambil" <?= ($data_transaksi['status'] === "diambil") ? 'selected' : '' ?>>Diambil</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Dibayar</label>
                                    <select name="dibayar" class="form-control select2bs4" style="width: 100%">
                                        <option value="dibayar" <?= ($data_transaksi['dibayar'] === "dibayar") ? 'selected' : '' ?>>Dibayar</option>
                                        <option value="belum_dibayar" <?= ($data_transaksi['dibayar'] === "belum_dibayar") ? 'selected' : '' ?>>Belum dibayar</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $data_transaksi['keterangan']; ?>" required />
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

<?php include_once('../../partials/footer.php') ?>