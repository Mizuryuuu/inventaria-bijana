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
        $nis = $_SESSION['username'];

        $data['judul'] = 'User Page';
        $data['biodataSiswa'] = $this->model('Siswa_model')->getSiswaBiodataByNis($nis);
        $data['tagihan'] = $this->model('Spp_model')->getQueryTagihan($nis);

        // var_dump($data['tagihan']);
        // // var_dump($data['detail']);
        // die;

        $this->view('tamplates/header', $data);
        $this->view('user/index', $data);
        $this->view('tamplates/footer');
    }


}

?>