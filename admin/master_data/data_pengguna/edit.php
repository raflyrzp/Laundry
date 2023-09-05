<?php
include_once('../../../class/Outlet.php');
include_once('../../../class/User.php');
include('../../../class/Title.php');

// SET TITLE
$titleObj = new Title();
$title = $titleObj->showTitle('Edit Pengguna');

$user = new User();
$outlet = new Outlet();


session_start();

$userId = $_SESSION['id'];
$userProfile = $user->find($userId);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data_user = $user->find($id);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user->update($id, $_POST);

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
                    <h1 class="m-0">Edit Pengguna</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Data Pengguna</a></li>
                        <li class="breadcrumb-item active">Edit Pengguna</li>
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
                                    <label for="nama">Nama Pengguna</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama outlet" value="<?= $data_user['nama']; ?>" required />
                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= $data_user['username']; ?>" required />
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="masukkan password baru" name="password" required>
                                </div>

                                <div class="form-group">
                                    <label>Nama Outlet</label>
                                    <?php $outletList = $outlet->all(); ?>
                                    <select name="id_outlet" class="form-control select2bs4" style="width: 100%">
                                        <?php foreach ($outletList as $outlet) : ?>
                                            <option value="<?= $outlet['id'] ?>" <?php if ($data_user['id_outlet'] == $outlet['id']) echo 'selected'; ?>>
                                                <?= $outlet['nama']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Akses</label>
                                    <select name="role" class="form-control select2bs4" style="width: 100%">
                                        <option value="admin" <?= ($data_user['role'] === "admin") ? 'selected' : '' ?>>Admin</option>
                                        <option value="kasir" <?= ($data_user['role'] === "kasir") ? 'selected' : '' ?>>Kasir</option>
                                        <option value="owner" <?= ($data_user['role'] === "owner") ? 'selected' : '' ?>>Owner</option>
                                    </select>
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