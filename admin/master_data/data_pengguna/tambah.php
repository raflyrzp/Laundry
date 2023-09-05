<?php
include_once('../../../class/User.php');
include_once('../../../class/Outlet.php');
include('../../../class/Title.php');

// SET TITLE
$titleObj = new Title();
$title = $titleObj->showTitle('Tambah Pengguna');


$user = new User();
$outlet = new Outlet();


session_start();

$userId = $_SESSION['id'];
$userProfile = $user->find($userId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;

    $result = $user->create($data);

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
                    <h1 class="m-0">Tambah Pengguna</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Data Pengguna</a></li>
                        <li class="breadcrumb-item active">Tambah Pengguna</li>
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
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap..." required>
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username..." required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password..." required>
                                    </div>

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
                                    <label>Akses</label>
                                    <select name="role" class="form-control select2bs4" style="width: 100%">
                                        <option disabled selected>--Pilih role--</option>
                                        <option value="admin">Admin</option>
                                        <option value="kasir">Kasir</option>
                                        <option value="owner">Owner</option>
                                    </select>
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