<?php 

class Dashboard extends Controller{

    public function __construct()
    {
        $location = 0;
        if( !@$_SESSION['userLogin'] ) {
            $location = 'login';
        } else if( $_SESSION['status'] != 1) {
            $location = 'login';
        }
        if($location != 0) {
            header('Location: ' . BASEURL . '/' . $location);
            exit;
        }
    }

    public function index()
    {  

        $data['judul'] = 'Dashboard';
        $batasHalaman = 5;
        $jumlahData = count($this->model('Accounts_model')->queryDataUser());
        $data['halaman_aktif'] = (isset($idPages)) ? (int)$idPages : 1;
        $data['jumlah_halaman'] = ceil($jumlahData/$batasHalaman);

        $data['accountUser'] = $this->model('Accounts_model')->getAllAccountUser();
        $data['activeAccountUser'] = $this->model('Accounts_model')->getAllActiveAccount();
        $data['nis_siswa'] = $this->model('Accounts_model')->getNisSiswa();

        $this->view('tamplates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('tamplates/footer');
    } 

    public function tambah(){


        if( $this->model('Accounts_model')->tambahDataUser($_POST) > 0 ) {  
            $location = 'dashboard';
        } else {
            $location = 'dashboard';
        }        

        header('Location: ' . BASEURL . '/' . $location);
        exit;
        
    }

    public function ubahDataUser(){

        if( $this->model('Accounts_model')->editDataUser($_POST) > 0 ) {  
            $location = 'dashboard';
        } else {
            $location = 'dashboard';
        }        

        header('Location: ' . BASEURL . '/' . $location);
        exit;

    }

    public function changePassword()
    {
        var_dump($_POST);
    }

    public function delete($id)
    {
        if( $this->model('Accounts_model')->deleteUser($id) > 0 ) {
            $location = 'dashboard';
        } else {
            $location = 'dashboard';
        }

        header('Location: ' . BASEURL . '/' . $location);
        exit;
    }

    public function editData($id)
    {
        header('Content-Type: application/json');
        $data = $this->model('Accounts_model')->getDataEdit($id);
        echo json_encode($data);
    }

    public function pages($idPages)
    {
        $data['judul'] = 'Dashboard';
        $batasHalaman = 5;
        $jumlahData = count($this->model('Accounts_model')->queryDataUser());
        $data['halaman_aktif'] = (isset($idPages)) ? (int)$idPages : 1;
        $halaman_awal = ($batasHalaman * $data['halaman_aktif']) - $batasHalaman;
        $data['jumlah_halaman'] = ceil($jumlahData/$batasHalaman);

        $data['accountUser'] = $this->model('Accounts_model')->getDataUserPage( $halaman_awal, $batasHalaman);
        $data['activeAccountUser'] = $this->model('Accounts_model')->getAllActiveAccount();

        $this->view('tamplates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('tamplates/footer');
    }

}

?>