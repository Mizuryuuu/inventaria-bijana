var buttonEdit = document.querySelectorAll('#dataEdit');
var buttonEditSiswa = document.querySelectorAll('#dataEditSiswa');
var selectKelas = document.getElementById('kelasEdit');
var selectTingkatan = document.getElementById('tingkatanEdit');
var queryPendingButton = document.querySelectorAll('#dataPending');
var selectValid = document.querySelectorAll('#validasiInput');
var buttonViewDetail = document.querySelectorAll('#viewDataDetail');

var buttonEditJurusan = document.querySelectorAll('#dataEditJurusan');

if( buttonViewDetail != null ) {

    buttonViewDetail.forEach(viewSelectedQuery => {
        viewSelectedQuery.addEventListener('click', function() {

            var idPembayaran = this.dataset.id;

            fetch('http://localhost/inventaria-bijana/public/pembayaran/getQueryPending/' + idPembayaran)
            .then(responese => responese.json())
            .then(dataValid => {

                var imageElement = document.getElementById("imageElement");

                imageElement.src = 'http://localhost/inventaria-bijana/public/img/image_upload/' + dataValid.gambar;

            });

        });
    });

}

if( queryPendingButton != null ) {

    queryPendingButton.forEach(Pending => {
        Pending.addEventListener('click', function() {
            var idQuery = this.dataset.id;

            document.getElementById('id_pembayaran').value = idQuery;

            fetch('http://localhost/inventaria-bijana/public/pembayaran/getQueryPending/' + idQuery)
            .then(responese => responese.json())
            .then(dataValid => {

                selectValid.forEach(testOption => {

                    for (let i = 0; i < testOption.length; i++) {

                        var valueOption = testOption[i];

                        if( valueOption.value == dataValid.keterangan ) {
                            valueOption.selected = true;
                        }
                    }

                });

            });

        });
    });

}


function formatNumber(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

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

if( buttonEditJurusan != null ) {
    buttonEditJurusan.forEach(dataJurusan => {
        dataJurusan.addEventListener('click', function() {
            var jurusanKode = this.dataset.id;
            // console.log(jurusanKode);

            fetch('http://localhost/inventaria-bijana/public/jurusan/queryJurusanJSON/' + jurusanKode)
            .then(responese => responese.json())
            .then(dataQueryJurusan => {
                // console.log(dataQueryJurusan);

                document.getElementById('kodeJRSN').value = dataQueryJurusan.kode_jurusan;
                document.getElementById('kodeJurusan').value = dataQueryJurusan.kode_jurusan;
                document.getElementById('namaJurusan').value = dataQueryJurusan.nama_jurusan;
                document.getElementById('jumlahKelas').value = dataQueryJurusan.jumlah_kelas;

            });

        });
    });
}
