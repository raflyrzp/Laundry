<?php
include_once('../../../class/Outlet.php');

$outlet = new Outlet();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $outlet->delete($id);

    if ($result === true) {
        session_start();
        $_SESSION['flash_message'] = 'Berhasil menghapus data outlet';
        header("Location: index.php");
        exit;
    } else {
        // Redirect ke halaman index dengan pesan gagal
        header("Location: index.php?error=Gagal menghapus data.");
        exit;
    }
} else {
    // Redirect ke halaman index jika ID tidak ditemukan
    header("Location: index.php");
    exit;
}
