<?php 

class TambahUser_model {

    private $tabel = 'accounts';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function tambahDataUser($data)
    {
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];
        $status = 'true';
        $level = $data['level'];

        if(!empty($username) && !empty($password)) {

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            if( $level == 'user' ) {
                $statusUser = '0';
            } else {
                $statusUser = '1';
            }

            $this->db->query("INSERT INTO " . $this->tabel . " VALUES (
                '', :username, :email, :password, :status, :level
            ) ");

            $this->db->bind('username', $username);
            $this->db->bind('email', $email);
            $this->db->bind('password', $passwordHash);
            $this->db->bind('status', $status);
            $this->db->bind('level', $statusUser);

            $this->db->execute();
            return $this->db->rowCount();

        }

    }

}

