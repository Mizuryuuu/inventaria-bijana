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

        $this->view('tamplates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('tamplates/footer');
    }

}

?>