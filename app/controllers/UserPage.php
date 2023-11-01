<?php 

class UserPage extends Controller {

    public function __construct()
    {
        $location = 0;
        if( $_SESSION['userLogin'] != 'success' ){
            $location = 'login';
        } elseif( $_SESSION['userTrue'] === true) {
            $location = 'dashboard';
        }
        if($location) {
            header('Location: ' . BASEURL . '/' . $location);
            exit;
        }
    }


    public function index()
    {

        $data['judul'] = 'User Page';

        $this->view('tamplates/header', $data);
        $this->view('user/index');
        $this->view('tamplates/footer');
    }


}

?>