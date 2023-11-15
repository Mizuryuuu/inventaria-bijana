<?php 

class Siswa extends Controller {

    public function index()
    {
        $data['judul'] = 'Kelola Siswa';
        $data['siswa'] = $this->model('Siswa_model')->getQuerySiswa();
        $data['jurusan'] = $this->model('Jurusan_model')->getQueryJurusan();

        $this->view('tamplates/header', $data);
        $this->view('siswa/index', $data);
        $this->view('tamplates/footer');
    }

    public function tambahSiswa()
    {
        if( $this->model('Siswa_model')->tambahDataSiswa($_POST) > 0 ) {
            $location = 'siswa';
        } else {
            $location = 'siswa';
        }

        header('Location: ' . BASEURL . '/' . $location);
    }

    public function ubahDataSiswa()
    {
        if( $this->model('Siswa_model')->updateDataSiswa($_POST) > 0 ) {
            $location = 'siswa';
        } else {
            $location = 'siswa';
        }

        header('Location: ' . BASEURL . '/' . $location);
    }

    public function deleteData($nis)
    {
        if( $this->model('Siswa_model')->deleteDataSiswa($nis) > 0 ) {
            $location = 'siswa';
        } else {
            $location = 'siswa';
        }

        header('Location: ' . BASEURL . '/' . $location);
    }

    public function queryEdit($nisSiswa)
    {
        header('Content-Type: application/json');
        $data = $this->model('Siswa_model')->getUserByNis($nisSiswa);
        echo json_encode($data);
    }

    public function queryJurusan()
    {
        header('Content-Type: application/json');
        $data = $this->model('Jurusan_model')->getQueryJurusan();
        echo json_encode($data);
    }

    public function queryTingkatan()
    {
        header('Content-Type: application/json');
        $data = $this->model('Tingkatan_model')->getQueryTingkatan();
        echo json_encode($data);
    }

}