<?php 

class Accounts_model {

    private $tabel = 'accounts';
    private $tabelSiswa = 'siswa';
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
        $dataCekUser = $this->cekUsernameUser($username);

        if(!empty($username) && !empty($password)) {

            if( $dataCekUser != 1 ) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    
                if( $level == 'user' ) {
                    $statusUser = '0';
                } else {
                    $statusUser = '1';
                }
    
                $this->db->query("INSERT INTO " . $this->tabel . " VALUES (
                    NULL, :username, :email, :password, :status, :level
                ) ");
     
                $this->db->bind('username', $username);
                $this->db->bind('email', $email);
                $this->db->bind('password', $passwordHash);
                $this->db->bind('status', $status);
                $this->db->bind('level', $statusUser);
    
                $this->db->execute();
                return $this->db->rowCount();

            } else {

                Flasher::setMessege('gagal', 'ditambahkan, username sudah ada', 'danger');

            }

        } else {

            // Flasher::setMessege('gagal', 'ditambahkan, isikan data terlebih dahulu', 'danger');

        }

    }

    public function getNisSiswa()
    {
        $this->db->query("SELECT nis FROM " . $this->tabelSiswa);
        return $this->db->resultSet();
    }

    public function queryDataUser()
    {
        $this->db->query("SELECT * FROM " . $this->tabel . " WHERE level = '0'" );
        return $this->db->resultSet();
    }

    public function cekUsernameUser($username)
    {
        $this->db->query("SELECT * FROM " . $this->tabel . " WHERE username = :username" );
        $this->db->bind('username', $username);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getDataUserPage($halaman_awal, $batasHalaman)
    {
        $this->db->query("SELECT * FROM " . $this->tabel . " WHERE level = '0' LIMIT " . $batasHalaman . " OFFSET " . $halaman_awal );
        return $this->db->resultSet();
    }

    public function getAllAccountUser()
    {
        $this->db->query("SELECT * FROM " . $this->tabel . " WHERE level = '0' LIMIT 5" );
        return $this->db->resultSet();
    }

    public function getAllActiveAccount()
    {
        $this->db->query("SELECT * FROM " . $this->tabel . " WHERE level = '0' AND status = 'true'" );
        return $this->db->resultSet();
    }

    public function getDataEdit($idData)
    {
        $this->db->query('SELECT * FROM ' . $this->tabel . ' WHERE id_acc =:id');
        $this->db->bind('id', $idData);    
        return $this->db->singel();
    }

    public function editDataUser($data)
    {
        $username = $data['username'];
        $email = $data['email'];
        $status = $data['status'];

        $query = "UPDATE " . $this->tabel . " SET 
                        username =:username, 
                        email =:email, status =:status 
                        WHERE id_acc =:id";

        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->bind('email', $email);
        $this->db->bind('status', $status);
        $this->db->bind('id', $data['id_acc']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteUser($id) 
    {
        $this->db->query("DELETE FROM " . $this->tabel . " WHERE id_acc = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

}