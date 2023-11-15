var buttonEdit = document.querySelectorAll('#dataEdit');
var buttonEditSiswa = document.querySelectorAll('#dataEditSiswa');
var selectKelas = document.getElementById('kelasEdit');
var selectTingkatan = document.getElementById('tingkatanEdit');

if ( buttonEdit != null ) {
    buttonEdit.forEach(edit => {
        edit.addEventListener('click', function() {
            var dataId = this.dataset.id;
            
            fetch('http://localhost/inventaria-bijana/public/dashboard/editData/' + dataId)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('id_acc').value = data.id_acc;
                    document.getElementById('nis').value = data.username;
                    document.getElementById('email').value = data.email;
                    document.getElementById('status').value = data.status;
                })
                .catch(error => {
                console.error(error);
                console.log('Respons yang tidak valid:', error.responseText);
                
            });
            
        });
    });
}

if( buttonEditSiswa != null ) {
    buttonEditSiswa.forEach(siswaEdit => {
        siswaEdit.addEventListener('click', function() {
            var idSiswa = this.dataset.id;

            fetch('http://localhost/inventaria-bijana/public/siswa/queryEdit/' + idSiswa)
            .then(response => response.json())
            .then(data => {
                document.getElementById('nisEditID').value = data.nis;
                document.getElementById('nisEdit').value = data.nis;
                document.getElementById('namaSiswaEdit').value = data.nama_siswa;
                // document.getElementById().value = data.kode_jurusan;
                // document.getElementById().value = data.kelas;
                document.getElementById('noTeleponEdit').value = data.no_telepon;
                document.getElementById('alamatEdit').value = data.alamat;
                
                selectKelas.innerHTML= "";
                selectTingkatan.innerHTML = "";

                fetch('http://localhost/inventaria-bijana/public/siswa/queryTingkatan/')
                .then(response => response.json())
                .then(dataTingkatan => {

                    dataTingkatan.forEach(Tingkatan => {

                        var optionTingkatan = document.createElement('option');
                        optionTingkatan.value = Tingkatan.id_tingkat;
                        optionTingkatan.text = Tingkatan.tingkatan_kelas;
                        selectTingkatan.appendChild(optionTingkatan);

                        if( Tingkatan.id_tingkat == data.id_tingkat ) {
                            optionTingkatan.selected = true;
                        }

                    });

                });

                fetch('http://localhost/inventaria-bijana/public/siswa/queryJurusan/')
                .then(response => response.json())
                .then(dataJurusan => {

                    dataJurusan.forEach(jurusan => {
                        

                        for (let i = 1; i <= jurusan.jumlah_kelas; i++) {


                            var optionKelas = document.createElement('option');
                            optionKelas.value = jurusan.kode_jurusan + "/" + i;
                            optionKelas.text = jurusan.kode_jurusan + " " + i;
                            selectKelas.appendChild(optionKelas);

                            if( jurusan.kode_jurusan == data.kode_jurusan && i == data.kelas  ) {
                                optionKelas.selected = true;
                            }

                        }
                        
                    });

                });

            });

        });
    });
}
