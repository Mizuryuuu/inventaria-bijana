<?php 

class Siswa_model {

    private $tabel = 'siswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getQuerySiswa()
    {
        $query = "SELECT * FROM " . $this->tabel . " LIMIT 5 ";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getUserByNis($SiswaNis)
    {
        $query = "SELECT * FROM " . $this->tabel . " WHERE nis = :nis";
        $this->db->query($query);
        $this->db->bind('nis', $SiswaNis);
        $this->db->execute();
        return $this->db->singel();
    }

    public function tambahDataSiswa($data)
    {
        $nis = $data['nis'];
        $nama_siswa = $data['nama_siswa'];
        $dataKelas = explode('/',$data['kelas']);
        $tingkatan = $data['tingkatan'];
        $no_telepon = $data['no_telepon'];
        $alamat = $data['alamat'];

        $kode_jurusan = $dataKelas[0];
        $kelas = $dataKelas[1];

        if ($nis != "" && $nama_siswa != "") {
            $query = "INSERT INTO " . $this->tabel . " VALUES ( :nis, :nama_siswa, :kode_jurusan, :kelas, :id_tingkat, :no_telepon, :alamat) ";
            $this->db->query($query);
            $this->db->bind('nis', $nis);
            $this->db->bind('nama_siswa', $nama_siswa);
            $this->db->bind('kode_jurusan', $kode_jurusan);
            $this->db->bind('kelas', $kelas);
            $this->db->bind('id_tingkat', $tingkatan);
            $this->db->bind('no_telepon', $no_telepon);
            $this->db->bind('alamat', $alamat);
    
            $this->db->execute();
            return $this->db->rowCount();
        }

    }

    public function updateDataSiswa($data)
    {
        $nisEdit = $data['nisEdit'];
        $nis = $data['nis'];
        $nama_siswa = $data['nama_siswa'];
        $dataKelas = explode('/',$data['kelas']);
        $tingkatan = $data['tingkatan'];
        $no_telepon = $data['no_telepon'];
        $alamat = $data['alamat'];

        $kode_jurusan = $dataKelas[0];
        $kelas = $dataKelas[1];

        $query = "UPDATE " . $this->tabel . " 
                    SET nis =:nis, 
                    nama_siswa =:nama_siswa, 
                    kode_jurusan =:kode_jurusan, 
                    kelas =:kelas, 
                    id_tingkat =:id_tingkat, 
                    no_telepon =:no_telepon, 
                    alamat =:alamat
                WHERE nis =:nisEdit";

        $this->db->query($query);
        $this->db->bind('nis', $nis);
        $this->db->bind('nama_siswa', $nama_siswa);
        $this->db->bind('kode_jurusan', $kode_jurusan);
        $this->db->bind('kelas', $kelas);
        $this->db->bind('id_tingkat', $tingkatan);
        $this->db->bind('no_telepon', $no_telepon);
        $this->db->bind('alamat', $alamat);
        $this->db->bind('nisEdit', $nisEdit);

        $this->db->execute();
        return $this->db->rowCount();

    }

    public function deleteDataSiswa($nis)
    {
        $query = "DELETE FROM " . $this->tabel . " WHERE nis =:nis";
        $this->db->query($query);
        $this->db->bind('nis', $nis);
        $this->db->execute();
        return $this->db->rowCount();
    }


}