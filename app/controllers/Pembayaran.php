<?php 

class Pembayaran extends Controller {

    public function index()
    {

        $data['judul'] = 'Kelola Pembayaran';
        $data['queryValidasiData'] = $this->model('Spp_model')->queryDataPending();

        $this->view('tamplates/header', $data);
        $this->view('managepembayaran/index', $data);
        $this->view('tamplates/footer');
    }

    public function getQueryPending($id_pembayaran)
    {

        header('Content-Type: application/json');
        $data = $this->model('Spp_model')->getPending($id_pembayaran);
        echo json_encode($data);

    }

    public function validationPayment()
    {
        if( $this->model('Spp_model')->validPayment($_POST) ) {
            $location = 'pembayaran';
        } else {
            $location = 'pembayaran';
        }

        header('Location: ' . BASEURL . '/' . $location);
    }

}