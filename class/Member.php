<?php

include_once('Database.php');

class Member extends Database
{
    public function all()
    {
        $sql = "SELECT * FROM tb_member";

        return $this->connect->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM tb_member WHERE id = $id";

        return $this->connect->query($sql)->fetch_assoc();
    }

    public function create($data)
    {
        $nama = $data['nama'];
        $alamat = $data['alamat'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $tlp = $data['tlp'];

        $sql = "INSERT INTO tb_member (nama,alamat,jenis_kelamin,tlp) VALUES ('$nama','$alamat', '$jenis_kelamin','$tlp')";

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
        $jenis_kelamin = $data['jenis_kelamin'];
        $tlp = $data['tlp'];

        $sql = "UPDATE tb_member SET nama = '$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin', tlp='$tlp' WHERE id='$id'";

        if ($this->connect->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM tb_member WHERE id='$id'";

        if($this->connect->query($sql))
        {
            return true;
        }else {
            return false;
        }
    }
}
