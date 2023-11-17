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

        $data['judul'] = 'Home';
        $data['page'] = 'Home';
        $data['biodataSiswa'] = $this->model('Siswa_model')->getSiswaBiodataByNis($nis);
        $data['tagihan'] = $this->model('Spp_model')->getQueryTagihan($nis);

        // UPDATE `tb_pembayaran` SET `tanggal_bayar` = '2023-11-16' WHERE `tb_pembayaran`.`id_pembayaran` = 1; 
        // UPDATE `tb_pembayaran` SET `tanggal_bayar`= CURRENT_DATE WHERE id_pembayaran = 1; 

        // var_dump($data['tagihan']);
        // // var_dump($data['detail']);
        // die;

        $this->view('tamplates/header', $data);
        $this->view('user/index', $data);
        $this->view('tamplates/footer');
    }

    public function pembayaran()
    {
        
        $nis = $_SESSION['username'];
        
        $data['judul'] = 'Pembayaran';
        $data['page'] = 'Pembayaran';
        
        $data['biodataSiswa'] = $this->model('Siswa_model')->getSiswaBiodataByNis($nis);
        $data['queryBulan'] = $this->model('Spp_model')->getQueryBelomLunas($nis);
        
        $this->view('tamplates/header', $data);
        $this->view('user/pembayaran', $data);
        $this->view('tamplates/footer');
    }

    public function updatePembayaran()
    {

        $nis = $_SESSION['username'];

        if( $this->model('Spp_model')->updateDetailPembayaran($_POST, $nis) > 0 ){
            $location = 'userpage';
        } else {
            $location = 'userpage';
        }

        header('Location: ' . BASEURL . '/' . $location);
    }


}

?>