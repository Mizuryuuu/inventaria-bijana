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

}