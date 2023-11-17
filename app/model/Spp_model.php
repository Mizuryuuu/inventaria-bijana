<?php 

class Spp_model {

    private $tabel = 'tb_spp';
    private $tabelPembayaran = 'tb_pembayaran';
    private $tabelSiswa = 'siswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getBulanAndHarga()
    {
        $query = "SELECT * FROM " . $this->tabel;
        $this->db->query($query);
        $this->db->resultSet();
    }

    public function queryDataPending()
    {
        $query = "SELECT id_pembayaran, " . $this->tabelPembayaran . ".nis, nama_siswa, bulan, harga, tanggal_bayar, keterangan, gambar FROM " . $this->tabelPembayaran . " INNER JOIN " . $this->tabel . " ON " . $this->tabelPembayaran . ".id_spp = " . $this->tabel . ".id_spp INNER JOIN " . $this->tabelSiswa . " ON " . $this->tabelPembayaran . ".nis = " . $this->tabelSiswa . ".nis WHERE keterangan = 'Pending'";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getQueryTagihan($nis)
    {
        $query = "SELECT id_pembayaran, bulan, harga, tanggal_bayar, keterangan, gambar FROM " . $this->tabelPembayaran . " LEFT JOIN " . $this->tabel . " ON " . $this->tabelPembayaran . ".id_spp = " . $this->tabel . ".id_spp WHERE nis =:nis";
        $this->db->query($query);
        $this->db->bind('nis', $nis);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getPending($id_pembayaran)
    {
        $query = "SELECT keterangan, gambar FROM " . $this->tabelPembayaran . " WHERE id_pembayaran =:id";
        $this->db->query($query);
        $this->db->bind('id', $id_pembayaran);
        $this->db->execute();
        return $this->db->singel();
    }

    public function getQueryBelomLunas($nis)
    {
        $query =  "SELECT " . $this->tabelPembayaran . ".id_spp, bulan  FROM " . $this->tabelPembayaran . " INNER JOIN " . $this->tabel . " ON " . $this->tabelPembayaran . ".id_spp = " . $this->tabel . ".id_spp WHERE nis =:nis AND keterangan = 'Belum Lunas';";
        $this->db->query($query);
        $this->db->bind('nis', $nis);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function updateDetailPembayaran($data, $nis)
    {
        $bulan = $_POST['bulan'];
        $gambar = UploadGambar::uploadGambar();

        $query = "UPDATE " . $this->tabelPembayaran . " SET tanggal_bayar = CURRENT_DATE, gambar =:gambar, keterangan = 'Pending' WHERE nis =:nis AND id_spp =:id_spp";
        $this->db->query($query);
        $this->db->bind('gambar', $gambar);
        $this->db->bind('nis', $nis);
        $this->db->bind('id_spp', $bulan);
        $this->db->execute();
        return $this->db->rowCount();

    }

    public function validPayment($data)
    {
        $idPembayaran = $data['id_pembayaran'];
        $validasi = $data['validasi'];

        $query = "UPDATE " . $this->tabelPembayaran . " SET keterangan =:keterangan WHERE id_pembayaran =:id";
        $this->db->query($query);
        $this->db->bind('keterangan', $validasi);
        $this->db->bind('id', $idPembayaran);
        $this->db->execute();
        return $this->db->rowCount();
    }

}