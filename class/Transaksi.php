<?php 

include_once ('Database.php');

class Transaksi extends Database
{
    public function all()
    {
        $sql = "SELECT tb_member.nama as nama_member, 
        tb_paket.jenis as jenis_paket, 
        tb_outlet.nama as nama_outlet, 
        tb_paket.nama_paket as nama_paket,
        tb_paket.id as id_paket,
        tb_member.id as id_member,
        (tb_paket.harga * tb_transaksi.qty + tb_transaksi.biaya_tambahan) as total_bayar, 
        tb_transaksi.id, tb_transaksi.id_paket, tb_transaksi.kode_invoice, tb_transaksi.tgl, tb_transaksi.batas_waktu, tb_transaksi.tgl_bayar, tb_transaksi.biaya_tambahan, tb_transaksi.diskon, tb_transaksi.pajak, tb_transaksi.status, tb_transaksi.dibayar, tb_transaksi.qty, tb_transaksi.keterangan
        FROM tb_transaksi, tb_member, tb_paket, tb_outlet 
        WHERE tb_transaksi.id_outlet = tb_outlet.id 
        AND tb_transaksi.id_member = tb_member.id 
        AND tb_transaksi.id_paket = tb_paket.id";

        return $this->connect->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM tb_transaksi WHERE id = '$id'";

        return $this->connect->query($sql)->fetch_assoc();
    }

    public function create($data)
    {
        $id_outlet = $data['id_outlet'];
        $id_paket = $data['id_paket'];
        $date = date('YmdHis');
        $kode_invoice = "INV$date";
        $id_member = $data['id_member'];
        $tgl = date('Y-m-d H:i:s');
        $batas_waktu = $data['batas_waktu'] . " " . date("H:i:s");
        $biaya_tambahan = $data['biaya_tambahan'];
        $diskon = 0;
        $pajak = 0;
        $status = 'baru';
        $dibayar = 'belum_dibayar';
        $qty = $data['qty'];
        $keterangan = $data['keterangan'];
        $id_user = 1;

        $sql = "INSERT INTO tb_transaksi (id_outlet, id_paket, kode_invoice, id_member, tgl, batas_waktu, biaya_tambahan, diskon, pajak, status, dibayar, qty, keterangan, id_user) VALUES ('$id_outlet', '$id_paket', '$kode_invoice', '$id_member', '$tgl', '$batas_waktu', '$biaya_tambahan', '$diskon', '$pajak', '$status', '$dibayar', '$qty', '$keterangan', '$id_user')";

        if ($this->connect->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $data)
    {
        $id_outlet = $data['id_outlet'];
        $id_paket = $data['id_paket'];
        $kode_invoice = $data['kode_invoice'];
        $id_member = $data['id_member'];
        $biaya_tambahan = $data['biaya_tambahan'];
        $status = $data['status'];
        $dibayar = $data['dibayar'];
        $qty = $data['qty'];
        $keterangan = $data['keterangan'];

        $sql = "UPDATE tb_transaksi SET id_outlet = '$id_outlet', id_paket='$id_paket', kode_invoice='$kode_invoice', id_member='$id_member', biaya_tambahan='$biaya_tambahan', status='$status', dibayar='$dibayar', qty='$qty', keterangan='$keterangan' WHERE id = '$id'";

        if ($this->connect->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM tb_transaksi WHERE id = '$id'";

        if ($this->connect->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}