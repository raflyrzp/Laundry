<?php
include_once('../../../class/User.php');
include('../../../class/Title.php');
include_once('../../../class/Outlet.php');

// SET TITLE
$titleObj = new Title();
$title = $titleObj->showTitle('Tambah Outlet');

$user = new User();
$outlet = new Outlet();

session_start();

$userId = $_SESSION['id'];
$userProfile = $user->find($userId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;

    $result = $outlet->create($data);

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
                    <h1 class="m-0">Tambah Outlet</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Data Outlet</a></li>
                        <li class="breadcrumb-item active">Tambah Outlet</li>
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
                                    <label for="nama">Nama Outlet</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama outlet" required/>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat Outlet</label>
                                    <textarea id="alamat" class="form-control" name="alamat" rows="4" placeholder="Masukkan alamat outlet" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tlp">Telepon</label>
                                    <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Masukkan nomor telepon" required/>
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