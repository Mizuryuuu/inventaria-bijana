<?php 

class Login_model {
    private $tabel = 'accounts';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function cekUserTrue($username)
    {
        $this->db->query('SELECT * FROM ' . $this->tabel . ' WHERE username =:username');
        $this->db->bind('username', $username);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ambilDataUser($username)
    {
        $this->db->query('SELECT * FROM ' . $this->tabel . ' WHERE username =:username');
        $this->db->bind('username', $username);
        return $this->db->singel();
    }

}