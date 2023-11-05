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

        $data['accountUser'] = $this->model('Accounts_model')->getAllAccountUser();

        $this->view('tamplates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('tamplates/footer');
    } 

    public function tambah(){
        
        $rowAccounts = $this->model('Accounts_model')->getAllAccountUser();
        if( $rowAccounts['username'] === $_POST['username'] || $rowAccounts['email'] === $_POST['email'] ) {
            if( $this->model('TambahUser_model')->tambahDataUser($_POST) > 0 ) {  
                $location = 'dashboard';
            } else {
                $location = 'dashboard';
            }
        } else {
            $location = 'dashboard';
        }
        

        header('Location: ' . BASEURL . '/' . $location);
        exit;
        
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

}

?>