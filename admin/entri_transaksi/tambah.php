<?php
include_once('../../class/Transaksi.php');
include_once('../../class/User.php');
include_once('../../class/Outlet.php');
include_once('../../class/Paket.php');
include_once('../../class/Member.php');
include('../../class/Title.php');

// SET TITLE
$titleObj = new Title();
$title = $titleObj->showTitle('Tambah Transaksi');


$user = new User();
$transaksi = new Transaksi();
$outlet = new Outlet();
$member = new Member();
$paket = new Paket();


session_start();

$userId = $_SESSION['id'];
$userProfile = $user->find($userId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;

    $result = $transaksi->create($data);

    if ($result === true) {
        header("Location: index.php?create_success=true");
        exit;
    }
}

include_once('../../partials/header.php');
include_once('../../partials/sidebar.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Data Transaksi</a></li>
                        <li class="breadcrumb-item active">Tambah Transaksi</li>
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
                                    <label>Pilih Member</label>
                                    <?php $memberList = $member->all(); ?>
                                    <select name="id_member" class="form-control select2bs4" style="width: 100%">
                                        <option disabled selected>--Pilih member--</option>
                                        <?php foreach ($memberList as $member) : ?>
                                            <option value="<?= $member['id'] ?>">
                                                <?= $member['nama']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Pilih Paket</label>
                                    <?php $paketList = $paket->all(); ?>
                                    <select name="id_paket" class="form-control select2bs4" style="width: 100%">
                                        <option disabled selected>--Pilih paket--</option>
                                        <?php foreach ($paketList as $paket) : ?>
                                            <option value="<?= $paket['id'] ?>">
                                                <?= $paket['nama_paket']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Pilih Outlet</label>
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
                                    <label for="qty">Berat</label>
                                    <input type="text" class="form-control" id="qty" name="qty" placeholder="Masukkan berat..." required>
                                </div>

                                <div class="form-group">
                                    <label for="biaya_tambahan">Biaya Tambahan</label>
                                    <input type="text" class="form-control" id="biaya_tambahan" name="biaya_tambahan" placeholder="Masukkan biaya tambahan..." required>
                                </div>

                                <div class="form-group">
                                    <label for="batas_waktu">Batas Waktu</label>
                                    <input type="date" class="form-control" id="batas_waktu" name="batas_waktu" required>
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea id="keterangan" class="form-control" name="keterangan" rows="4" placeholder="Masukkan keterangan..." required></textarea>
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
<?php include_once('../../partials/footer.php') ?>