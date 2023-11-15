<?php 

class Jurusan extends Controller{

    public function index()
    {
        $data['judul'] =  'Jurusan';

        $this->view('tamplates/header');
        $this->view('jurusan/index');
        $this->view('tamplates/footer');
    }

}