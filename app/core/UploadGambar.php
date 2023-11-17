<?php 

class UploadGambar {

    public static function uploadGambar()
    {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $errorFile = $_FILES['gambar']['error'];
        $tmpNameFile = $_FILES['gambar']['tmp_name'];

        // cek apakah gambar diupload atau tidak 
        if ( $errorFile === 4 ){
            Flasher::setMessege('gagal', 'ditambahkan, masukan gambar terlebih dahulu', 'danger');
        } else {

            // cek apakah yang diupload adalah gambar
            $ekstensiGambarValid = ['jpg','png','jpeg'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));

            if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
                Flasher::setMessege('gagal', 'ditambahkan, yang anda input bukan gambar', 'danger');
            }

            // cek ukuran gambar 
            if( $ukuranFile > 100000000 ) {
                Flasher::setMessege('gagal', 'ditambahkan, file gambar terlalu besar', 'danger');
            }

            // lolos pengechekan, generate nama baru, gambar siap di upload
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;
            move_uploaded_file($tmpNameFile, 'img/image_upload/' . $namaFileBaru);

            return $namaFileBaru;
        }

    }

}