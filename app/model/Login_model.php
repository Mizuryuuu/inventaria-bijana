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
        $this->db->query('SELECT * FROM ' . $this->tabel . ' WHERE username =:username OR email =:email');
        $this->db->bind('username', $username);
        $this->db->bind('email', $username);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ambilDataUser($username)
    {
        $this->db->query('SELECT * FROM ' . $this->tabel . ' WHERE username =:username OR email =:email');
        $this->db->bind('username', $username);
        $this->db->bind('email', $username);
        return $this->db->singel();
    }

}