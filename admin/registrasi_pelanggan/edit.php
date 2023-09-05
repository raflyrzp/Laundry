<?php
include_once('../../class/Member.php');
include_once('../../class/User.php');
include('../../class/Title.php');

// SET TITLE
$titleObj = new Title();
$title = $titleObj->showTitle('Edit Pelanggan');

$user = new User();
$member = new Member();


session_start();

$userId = $_SESSION['id'];
$userProfile = $user->find($userId);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data_member = $member->find($id);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $member->update($id, $_POST);

        header("Location: index.php?edit_success=true");
    }
} else {
    header("Location: index.php");
    exit;
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
                    <h1 class="m-0">Edit Pelanggan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Data Pelanggan</a></li>
                        <li class="breadcrumb-item active">Edit Pelanggan</li>
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
                                    <label for="nama">Nama Pelanggan</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama outlet" value="<?= $data_member['nama']; ?>" required/>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea id="alamat" class="form-control" name="alamat" rows="4" required><?= $data_member['alamat']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control select2bs4" style="width: 100%">
                                        <option value="L" <?= ($data_member['jenis_kelamin'] === "L") ? 'selected' : '' ?>>Laki-laki</option>
                                        <option value="P" <?= ($data_member['jenis_kelamin'] === "P") ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tlp">Telepon</label>
                                    <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Masukkan nomor telepon" value="<?= $data_member['tlp']; ?>" required/>
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