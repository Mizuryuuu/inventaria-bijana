<div class="col">
    <div class="container pt-4">
        <h1 class="mb-4"><?= $data['judul']; ?></h1>

        <div class="container-fluid shadow p-4 rounded">
            <div class="container">
                <div class="mb-4">
                    <div class="row">
                        <div class="col">
                            <div class="h4 text-uppercase fw-semibold">
                                Daftar Jurusan
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahJurusan">
                                Tambah Jurusan
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <table class="table table-striped align-middle">
                        <thead class="text-capitalize">
                            <tr class="text-center">
                                <th class="fw-semibold">Kode Jurusan</th>
                                <th class="fw-semibold">Nama Jurusan</th>
                                <th class="fw-semibold">Jumlah Kelas Perjurusan</th>
                                <th class="fw-semibold">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach( $data['jurusan'] as $rowJurusan ) : ?>
                            <tr class="text-center">
                                <td><?= $rowJurusan['kode_jurusan']; ?></td>
                                <td><?= $rowJurusan['nama_jurusan']; ?></td>
                                <td><?= $rowJurusan['jumlah_kelas']; ?></td>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#editJurusan" data-id="<?= $rowJurusan['kode_jurusan']; ?>" id="dataEditJurusan" class="btn btn-warning text-white rounded"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button>
                                    <a href="<?= BASEURL ?>/jurusan/deleteData/<?= $rowJurusan['kode_jurusan']; ?>" class="btn btn-danger text-white rounded"><i class="fa-solid fa-trash-can" style="color: #ffffff;"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
 
<!-- Modal Tambah Jurusan Start -->
<div class="modal fade" id="tambahJurusan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= BASEURL; ?>/jurusan/tambahJurusan" method="post">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jurusan</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid px-4 my-4">
                        <div class="mb-3">
                            <label class="mb-2" for="kode_jurusan">Kode Jurusan</label>
                            <input type="text" name="kode_jurusan" id="kode_jurusan" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="nama_jurusan">Nama Jurusan</label>
                            <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="jumlah_kelas">Jumlah Kelas</label>
                            <input type="text" name="jumlah_kelas" id="jumlah_kelas" class="form-control">
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
<!-- Modal Tambah Jurusan End -->

<!-- Modal Tambah Jurusan Start -->
<div class="modal fade" id="editJurusan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= BASEURL; ?>/jurusan/editJurusan" method="post">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jurusan</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid px-4 my-4">
                        <input type="hidden" name="kodeJRSN" id="kodeJRSN">
                        <div class="mb-3">
                            <label class="mb-2" for="kode_jurusan">Kode Jurusan</label>
                            <input type="text" name="kode_jurusan" id="kodeJurusan" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="nama_jurusan">Nama Jurusan</label>
                            <input type="text" name="nama_jurusan" id="namaJurusan" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="jumlah_kelas">Jumlah Kelas</label>
                            <input type="text" name="jumlah_kelas" id="jumlahKelas" class="form-control">
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
<!-- Modal Tambah Jurusan End -->