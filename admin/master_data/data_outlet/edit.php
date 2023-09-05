<?php
include_once('../../../class/Outlet.php');
include_once('../../../class/User.php');
include('../../../class/Title.php');

// SET TITLE
$titleObj = new Title();
$title = $titleObj->showTitle('Edit Kategori');

$user = new User();
$outlet = new Outlet();


session_start();

$userId = $_SESSION['id'];
$userProfile = $user->find($userId);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data_outlet = $outlet->find($id);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $outlet->update($id, $_POST);

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
                    <h1 class="m-0">Edit Outlet</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Data Outlet</a></li>
                        <li class="breadcrumb-item active">Edit Outlet</li>
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
                                    <label for="nama">Nama Outlet</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama outlet" value="<?= $data_outlet['nama']; ?>" required/>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat Outlet</label>
                                    <textarea id="alamat" class="form-control" name="alamat" rows="4" required><?= $data_outlet['alamat']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tlp">Telepon</label>
                                    <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Masukkan nomor telepon" value="<?= $data_outlet['tlp']; ?>" required/>
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