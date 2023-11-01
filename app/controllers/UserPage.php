<?php 

class UserPage extends Controller {

    public function __construct()
    {
        $location = 0;
        if( !@$_SESSION['userLogin'] ) {
            $location = 'login';
        } else if( $_SESSION['status'] != 0) {
            $location = 'login';
        }
        if($location != 0) {
            header('Location: ' . BASEURL . '/' . $location);
            exit;
        }
    }


    public function index()
    {

        $data['judul'] = 'User Page';

        $this->view('tamplates/header', $data);
        $this->view('user/index', $data);
        $this->view('tamplates/footer');
    }


}

?>