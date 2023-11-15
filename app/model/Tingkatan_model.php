<?php 

class Tingkatan_model {

    private $tabel = 'tb_tingkatan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getQueryTingkatan()
    {
        $query = "SELECT * FROM " . $this->tabel;
        $this->db->query($query);
        return $this->db->resultSet();
    }

}