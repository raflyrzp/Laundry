<?php
include_once('Database.php');

class Auth extends Database
{
    public function authLogin($username, $data)
    {
        $username = $data['username'];
        $password = md5($data['password']);

        $sql = "SELECT * FROM tb_user WHERE username = '$username'";

        $cek_user = $this->connect->query($sql)->fetch_assoc();

        if (!empty($cek_user)) {
            if ($password == $cek_user['password']) {
                session_start();
                $_SESSION['id'] = $cek_user['id'];
                $_SESSION['role'] = $cek_user['role'];


                if ($cek_user['role'] == 'owner') {
                    header("location: owner/index.php");
                } else if ($cek_user['role'] == 'admin') {
                    header("location: admin/index.php");
                }else if ($cek_user['role'] == 'kasir') {
                    header("location: kasir/index.php");
                }
            } else {
                echo "<script>alert('maaf password salah');</script>";
            }
        } else {
            return "Gagal";
        }
    }

    public function authRegist($data)
    {
        $nama = $data['nama'];
        $username = $data['username'];
        $password = $data['password'];
        $confirmPassword = $data['confirm_password'];
        $id_outlet = $data['id_outlet'];
        $role = 'kasir';


        if ($password !== $confirmPassword) {
            return false;
        }

        $hashedPassword = md5($password);

        $sql = "INSERT INTO tb_user (nama, username, password, id_outlet, role) VALUES ('$nama', '$username', '$hashedPassword', '$id_outlet', '$role')";

        if ($this->connect->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function authLogout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
}
