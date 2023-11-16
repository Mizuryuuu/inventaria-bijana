<?php 

class Jurusan_model {

    private $tabel = 'jurusan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getQueryJurusan()
    {
        $query = "SELECT * FROM " . $this->tabel;
        $this->db->query($query);
        return $this->db->resultSet();
    } 

    public function getQueryJurusanByKode($kode)
    {
        $query = "SELECT * FROM " . $this->tabel . " WHERE kode_jurusan =:kode";
        $this->db->query($query);
        $this->db->bind('kode', $kode);
        $this->db->execute();
        return $this->db->singel();
    }

    public function tambahDataJurusan($data)
    {
        $kodeJurusan = $data['kode_jurusan'];
        $namaJurusan = $data['nama_jurusan'];
        $jumlahKelas = $data['jumlah_kelas'];

        if( $kodeJurusan != "" && $namaJurusan != "" && $jumlahKelas != "") {

            $query = "INSERT INTO " . $this->tabel . " VALUES ( :kode_jurusan, :nama_jurusan, :jumlah_kelas)";
            $this->db->query($query);
            $this->db->bind('kode_jurusan', $kodeJurusan);
            $this->db->bind('nama_jurusan', $namaJurusan);
            $this->db->bind('jumlah_kelas', $jumlahKelas);
    
            $this->db->execute();
            $this->db->rowCount();

        }

    }

    public function ubahDataJurusan($data)
    {
        $kodeJRSN = $data['kodeJRSN'];
        $kodeJurusan = $data['kode_jurusan'];
        $namaJurusan = $data['nama_jurusan'];
        $jumlahKelas = $data['jumlah_kelas'];

        $query = "UPDATE " . $this->tabel . " 
                    SET kode_jurusan =:kode_jurusan, 
                    nama_jurusan =:nama_jurusan, 
                    jumlah_kelas =:jumlah_kelas
                WHERE kode_jurusan =:kodeJRSN";
        $this->db->query($query);
        $this->db->bind('kode_jurusan', $kodeJurusan);
        $this->db->bind('nama_jurusan', $namaJurusan);
        $this->db->bind('jumlah_kelas', $jumlahKelas);
        $this->db->bind('kodeJRSN', $kodeJRSN);
        
        $this->db->execute();
        $this->db->rowCount();


    }

    public function deleteDataJurusan($kodeJRSN)
    {
        $query = "DELETE FROM " . $this->tabel . " WHERE kode_jurusan =:kodeJRSN";
        $this->db->query($query);
        $this->db->bind('kodeJRSN', $kodeJRSN);

        $this->db->execute();
        return $this->db->rowCount();
    }

}