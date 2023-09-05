<?php
include('../../class/User.php');
include('../../class/Transaksi.php');
include('../../class/Title.php');

// SET TITLE
$titleObj = new Title();
$title = $titleObj->showTitle('Laporan');

$user = new User();
$transaksi = new Transaksi();

session_start();

$userId = $_SESSION['id'];
$userProfile = $user->find($userId);

$data_transaksi = $transaksi->all();




// HEADER
include('../../partials/header.php');
// SIDEBAR
include('../../partials/sidebar.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Laporan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Laporan</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Data Laporan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Invoice</th>
                                        <th>Nama Member</th>
                                        <th>Jenis Paket</th>
                                        <th>Nama Outlet</th>
                                        <th>Berat Cucian</th>
                                        <th>Biaya Tambahan</th>
                                        <th>Total Bayar</th>
                                        <th style="width: 150px">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    <?php foreach ($data_transaksi as $transaksi) : ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $transaksi['kode_invoice']; ?></td>
                                            <td><?= $transaksi['nama_member']; ?></td>
                                            <td><?= $transaksi['nama_paket'] ?></td>
                                            <td><?= $transaksi['nama_outlet']; ?></td>
                                            <td><?= $transaksi['qty'] . " " . $transaksi['jenis_paket'] ?></td>
                                            <td><?= $transaksi['biaya_tambahan'] ?></td>
                                            <td><?= $transaksi['total_bayar'] ?></td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            if ($transaksi['status'] == 'baru') { ?>
                                                                <p class="btn btn-default btn-sm">Baru</p>
                                                            <?php } else if ($transaksi['status'] == 'proses') { ?>
                                                                <p class="btn btn-warning btn-sm">Proses</p>
                                                            <?php } else if ($transaksi['status'] == 'selesai') { ?>
                                                                <p class="btn btn-primary btn-sm">Selesai</p>
                                                            <?php } else { ?>
                                                                <p class="btn btn-success btn-sm">Diambil</p>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($transaksi['id_paket'] == '0') { ?>

                                                            <?php } else { ?>
                                                                <?php
                                                                if ($transaksi['dibayar'] == 'dibayar') { ?>
                                                                    <p class="btn btn-success btn-sm">Dibayar</p>
                                                                <?php } else { ?>
                                                                    <p class="btn btn-danger btn-sm">Belum Dibayar</p>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <?php $no++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
// FOOTER
include('../../partials/footer.php');
?>