<?php
include('../../../class/User.php');
include('../../../class/Title.php');
include('../../../class/Paket.php');

// SET TITLE
$titleObj = new Title();
$title = $titleObj->showTitle('Data Paket');

$user = new User();
$paket = new Paket();

session_start();

$userId = $_SESSION['id'];
$userProfile = $user->find($userId);

$data_paket = $paket->all();




// HEADER
include('../../../partials/header.php');
// SIDEBAR
include('../../../partials/sidebar.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Paket</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Paket</li>
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
                            <h3 class="card-title">Tabel Data Paket</h3>
                            <a href="tambah.php" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Outlet</th>
                                        <th>Jenis</th>
                                        <th>Nama Paket</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    <?php foreach ($data_paket as $paket) : ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $paket['nama_outlet']; ?></td>
                                            <td><?= $paket['jenis']; ?></td>
                                            <td><?= $paket['nama_paket']; ?></td>
                                            <td><?= $paket['harga']; ?></td>
                                            <td class="col-2">
                                                <a href="edit.php?id=<?= $paket['id']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="hapus.php?id=<?= $paket['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"> <i class="fas fa-trash"></i>Hapus</a>
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
include('../../../partials/footer.php');
?>