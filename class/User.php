<?php

include_once("Database.php");

class User extends Database
{
    public function all()
    {
        $sql = "SELECT tb_outlet.nama as nama_outlet, 
        tb_user.id, tb_user.nama, username, role 
        FROM tb_user, tb_outlet 
        WHERE tb_user.id_outlet = tb_outlet.id";

        return $this->connect->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM tb_user WHERE id = $id";

        return $this->connect->query($sql)->fetch_assoc();
    }

    public function findAnggota()
    {
        $sql = "SELECT * FROM tb_user WHERE role='user'";

        return $this->connect->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function findAdmin()
    {
        $sql = "SELECT * FROM tb_user WHERE role='admin'";

        return $this->connect->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data)
    {
        $nama = $data['nama'];
        $username = $data['username'];
        $password = md5($data['password']);
        $id_outlet = $data['id_outlet'];
        $role = $data['role'];

        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO tb_user (nama, username, password, id_outlet, role) VALUES ('$nama', '$username', '$password', '$id_outlet', '$role')";

        if ($this->connect->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $data)
    {
        $nama = $data['nama'];
        $username = $data['username'];
        $password = $data['password'];
        $id_outlet = $data['id_outlet'];

        $sql = "UPDATE tb_user SET nama='$nama', username='$username', password='$password', id_outlet = '$id_outlet' WHERE id='$id'";

        if ($this->connect->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM tb_user WHERE id ='$id'";

        if ($this->connect->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

}