<?php 

class Flasher {

    public static function setMessege($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    } 

    public static function flashMessege()
    {
        if( isset($_SESSION['flash']) ) {
            echo '
                <div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
                    Akun user <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . ' 
                </div>
            ';

            unset($_SESSION['flash']);
        }
    }

}