<?php

include_once('Database.php');

class Outlet extends Database
{
    public function all()
    {
        $sql = "SELECT * FROM tb_outlet";

        return $this->connect->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM tb_outlet WHERE id = $id";

        return $this->connect->query($sql)->fetch_assoc();
    }

    public function create($data)
    {
        $nama = $data['nama'];
        $alamat = $data['alamat'];
        $tlp = $data['tlp'];

        $sql = "INSERT INTO tb_outlet (nama,alamat,tlp) VALUES ('$nama','$alamat','$tlp')";

        if ($this->connect->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $data)
    {
        $nama = $data['nama'];
        $alamat = $data['alamat'];
        $tlp = $data['tlp'];

        $sql = "UPDATE tb_outlet SET nama = '$nama', alamat = '$alamat', tlp = '$tlp' WHERE id = '$id'";

        if ($this->connect->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM tb_outlet WHERE id = '$id'";

        if ($this->connect->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}
