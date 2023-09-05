<?php

include_once('Database.php');

class Paket extends Database
{
    public function all()
    {
        $sql = "SELECT tb_outlet.nama as nama_outlet, tb_paket.id, jenis, nama_paket, harga FROM tb_paket, tb_outlet WHERE tb_paket.id_outlet = tb_outlet.id";

        return $this->connect->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM tb_paket WHERE id = $id";

        return $this->connect->query($sql)->fetch_assoc();
    }

    public function create($data)
    {
        $id_outlet = $data['id_outlet'];
        $jenis = $data['jenis'];
        $nama_paket = $data['nama_paket'];
        $harga = $data['harga'];

        $sql = "INSERT INTO tb_paket (id_outlet, jenis, nama_paket, harga) VALUES ('$id_outlet', '$jenis', '$nama_paket', '$harga')";

        if ($this->connect->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $data)
    {
        $id_outlet = $data['id_outlet'];
        $jenis = $data['jenis'];
        $nama_paket = $data['nama_paket'];
        $harga = $data['harga'];

        $sql = "UPDATE tb_paket SET id_outlet='$id_outlet', jenis='$jenis', nama_paket='$nama_paket', harga='$harga' WHERE id = '$id'";

        if ($this->connect->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM tb_paket WHERE id = '$id'";

        if ($this->connect->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}
