<div class="col">
    <div class="container pt-4">
        <h1 class="mb-4"><?= $data['judul']; ?></h1>

        <div class="container">
            <div class="container p-0 mb-5">
                <div class="row">
                    <div class="col-3 ">
                        <div class="card border border-0 border-start border-5 border-primary shadow px-2 py-4">
                            <div class="card-boody ">
                                <div class="row no-gutters align-items-center px-4">
                                    <div class="col ms-2">
                                        <div class="mb-2 text-xs fw-bold text-primary text-uppercase">Total Siswa Kelas X </div>
                                        <div class="h5">!0</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-user fa-2x" style="color: #abadb8;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card border border-0 border-start border-5 border-warning shadow px-2 py-4">
                            <div class="card-boody ">
                                <div class="row no-gutters align-items-center px-4">
                                    <div class="col ms-2">
                                        <div class="mb-2 text-xs fw-bold text-warning text-uppercase">Total Siswa Kelas XI </div>
                                        <div class="h5">!0</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-user fa-2x" style="color: #abadb8;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card border border-0 border-start border-5 border-info shadow px-2 py-4">
                            <div class="card-boody ">
                                <div class="row no-gutters align-items-center px-4">
                                    <div class="col ms-2">
                                        <div class="mb-2 text-xs fw-bold text-info text-uppercase">Total Siswa Kelas XII </div>
                                        <div class="h5">!0</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-user fa-2x" style="color: #abadb8;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- tabel siswa -->
            <div class="container-fluid shadow p-4 rounded">
                <div class="container">
                    <div class="mb-4">
                        <div class="row">
                            <div class="col">
                                <div class="h5 text-uppercase fw-semibold">Data Siswa</div>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSiswa">Tambah Siswa</button>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <table class="table table-striped  align-middle">
                            <thead class="text-capitalize">
                                <tr class="text-center">
                                    <th class="fw-semibold">Nis</th>
                                    <th class="fw-semibold">Nama Siswa</th>
                                    <th class="fw-semibold">Kelas</th>
                                    <th class="fw-semibold">No Telepon</th>
                                    <th class="fw-semibold">Alamat</th>
                                    <th class="fw-semibold">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach( $data['siswa'] as $rowSiswa ) : ?>
                                <?php 
                                if ( $rowSiswa['id_tingkat'] == '3' ) {
                                    $tingkatan = 'XII';
                                } else if ( $rowSiswa['id_tingkat'] == '2' ) {
                                    $tingkatan = 'XI';
                                } else {
                                    $tingkatan = 'X';
                                }
                                ?>
                                <tr>
                                    <td class="text-center"><?= $rowSiswa['nis']; ?></td>
                                    <td><?= $rowSiswa['nama_siswa']; ?></td>
                                    <td class="text-center"><?= $tingkatan; ?> <?= $rowSiswa['kode_jurusan']; ?> <?= $rowSiswa['kelas']; ?></td>
                                    <td class="text-center"><?= $rowSiswa['no_telepon']; ?></td>
                                    <td class="text-center"><?= $rowSiswa['alamat']; ?></td>
                                    <td class="text-center">
                                        <button data-bs-toggle="modal" data-bs-target="#editDataSiswa" data-id="<?= $rowSiswa['nis']; ?>" id="dataEditSiswa" class="btn btn-warning text-white rounded"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button>
                                        <a href="<?= BASEURL ?>/siswa/deleteData/<?= $rowSiswa['nis']; ?>" class="btn btn-danger text-white rounded"><i class="fa-solid fa-trash-can" style="color: #ffffff;"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end tabel siswa -->

        </div>

    </div>
</div>

<!-- modal tambah siswa -->
<div class="modal fade" id="tambahSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= BASEURL; ?>/siswa/tambahSiswa" method="post">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid px-4 my-4">
                        <div class="mb-3">
                            <label class="mb-2" for="nis">Nis</label>
                            <input type="text" name="nis" id="nis" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="email">Nama Siswa</label>
                            <input type="text" name="nama_siswa" id="nama_siswa" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="tingkatan">Tingkatan</label>
                            <select name="tingkatan" id="tingkatan" class="form-select">
                                <option value="1">X</option>
                                <option value="2">XI</option>
                                <option value="3">XII</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="kelas">Kelas</label>
                            <select name="kelas" id="kelas" class="form-select">
                                <?php foreach ($data['jurusan'] as $row) : ?> 

                                    <?php for ($i = 1; $i <= $row['jumlah_kelas']; $i++) : ?>
                                        <option value="<?= $row['kode_jurusan'] ?>/<?= $i ?>"><?php echo $row['kode_jurusan'] . ' ' . $i ; ?></option>
                                    <?php endfor; ?>
                                
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="no_telepon">No Telepon</label>
                            <input type="text" name="no_telepon" id="no_telepon" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal tambah siswa -->

<!-- Modal Edit Data User -->
<div class="modal fade" id="editDataSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= BASEURL; ?>/siswa/ubahDataSiswa" method="post">
                <div class="modal-header">
                    <h3 class="modal-title fs-3" id="exampleModalLabel">Edit User</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid px-4 my-4">
                        <input type="hidden" name="nisEdit" id="nisEditID">
                        <div class="mb-3">
                            <label class="mb-2" for="nis">Nis</label>
                            <input type="text" name="nis" id="nisEdit" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="nama_siswa">Nama Siswa</label>
                            <input type="nama_siswa" name="nama_siswa" id="namaSiswaEdit" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="tingkatan">Tingkatan</label>
                            <select name="tingkatan" id="tingkatanEdit" class="form-select">
                                <option value="Pilih Tingkat">Pilih Tingkat</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="kelas">Kelas</label>
                            <select name="kelas" id="kelasEdit" class="form-select">
                                <option value="Pilih Kelas">Pilih Kelas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="no_telepon">No Telepon</label>
                            <input type="text" name="no_telepon" id="noTeleponEdit" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamatEdit" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>