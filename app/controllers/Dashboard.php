<?php 

class Dashboard extends Controller{

    public function __construct()
    {
        $location = 0;

        if( $_SESSION['userLogin'] != 'success' ){
            $location = 'login';
        } elseif( $_SESSION['userTrue'] != true) {
            $location = 'userpage';
        }
        if($location) {
            header('Location: ' . BASEURL . '/' . $location);
            exit;
        }
    }

    public function index()
    {

        $data['judul'] = 'Dashboard';

        $this->view('tamplates/header', $data);
        $this->view('dashboard/index');
        $this->view('tamplates/footer');
    }

}

?>