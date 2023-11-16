<?php 

class Spp_model {

    private $tabel = 'tb_spp';
    private $tabelPembayaran = 'tb_pembayaran';
    private $tabelHargaSpp = 'tb_spp';
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

    public function getQueryTagihan($nis)
    {
        $query = "SELECT bulan, harga, tanggal_bayar, keterangan, gambar FROM " . $this->tabelPembayaran . " LEFT JOIN " . $this->tabelHargaSpp . " ON " . $this->tabelPembayaran . ".id_spp = " . $this->tabelHargaSpp . ".id_spp WHERE nis =:nis";
        $this->db->query($query);
        $this->db->bind('nis', $nis);
        $this->db->execute();
        return $this->db->resultSet();
    }

}