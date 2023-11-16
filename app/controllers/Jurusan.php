<?php 

class Jurusan extends Controller{

    public function index()
    {
        $data['judul'] =  'Kelola Jurusan';
        $data['jurusan'] = $this->model('Jurusan_model')->getQueryJurusan();

        $this->view('tamplates/header', $data);
        $this->view('jurusan/index', $data);
        $this->view('tamplates/footer');


    }

    public function tambahJurusan()
    {
        if( $this->model('Jurusan_model')->tambahDataJurusan($_POST) > 0 ) {
            $location = 'jurusan';
        } else {
            $location = 'jurusan';
        }
        
        header('Location: ' . BASEURL . '/' . $location);
    }
    
    public function editJurusan()
    {
        if( $this->model('Jurusan_model')->ubahDataJurusan($_POST) > 0) {
            $location = 'jurusan';
        } else {
            $location = 'jurusan';
        }
        header('Location: ' . BASEURL . '/' . $location);
    }
    
    public function deleteData($kodeJRSN)
    {
        if( $this->model('Jurusan_model')->deleteDataJurusan($kodeJRSN) > 0 ) {
            $location = 'jurusan';
        } else {
            $location = 'jurusan';
        }
        header('Location: ' . BASEURL . '/' . $location);
    }

    public function queryJurusanJSON($kode)
    {
        // var_dump($kode);
        // die;
        header('Content-Type: application/json');
        $data = $this->model('Jurusan_model')->getQueryJurusanByKode($kode);
        echo json_encode($data);
    }

}