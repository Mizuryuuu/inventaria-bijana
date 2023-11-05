<?php 

class Accounts_model {

    private $tabel = 'accounts';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllAccountUser()
    {
        $this->db->query("SELECT * FROM " . $this->tabel . " WHERE level = '0' LIMIT 5" );
        return $this->db->resultSet();
    }

    public function deleteUser($id) 
    {
        $this->db->query("DELETE FROM " . $this->tabel . " WHERE id_acc = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

}