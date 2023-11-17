<div class="col">
    <div class="container pt-4">
        <h1 class="mb-4"><?= $data['judul']; ?></h1>

        <div class="container-fluid shadow p-4 rounded">
            <div class="container">
                <div class="mb-4">
                    <div class="row">
                        <div class="col">
                            <div class="h4 text-uppercase fw-semibold">
                                Daftar Pembayaran Tagihan
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <table class="table table-striped align-middle text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th class="fw-semibold">Nis</th>
                                <th class="fw-semibold">Nama Siswa</th>
                                <th class="fw-semibold">Tagihan</th>
                                <th class="fw-semibold">Total Tagihan</th>
                                <th class="fw-semibold">Tanggal Bayar</th>
                                <th class="fw-semibold">keterangan</th>
                                <th class="fw-semibold">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach( $data['queryValidasiData'] as $rowDataValidasi ) : ?>

                                <tr>
                                    <td><?= $rowDataValidasi['nis']; ?></td>
                                    <td><?= $rowDataValidasi['nama_siswa']; ?></td>
                                    <td><?= $rowDataValidasi['bulan']; ?></td>
                                    <td>Rp <?= $rowDataValidasi['harga']; ?></td>
                                    <td><?= $rowDataValidasi['tanggal_bayar']; ?></td>
                                    <td><?= $rowDataValidasi['keterangan']; ?></td>
                                    <td>
                                        <button data-bs-toggle="modal" data-id="<?= $rowDataValidasi['id_pembayaran']; ?>" id="viewDataDetail" data-bs-target="#viewDetailPembayaran" class="btn btn-info text-white rounded"><i class="fa-solid fa-eye" style="color: #ffffff;"></i></button>
                                        <button data-bs-toggle="modal" data-id="<?= $rowDataValidasi['id_pembayaran']; ?>" id="dataPending" data-bs-target="#validationPayment" class="btn btn-primary text-white rounded"><i class="fa-regular fa-calendar-check"></i></i></button>
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

<!-- Start Moddal Validasi Pembayaran -->

<div class="modal fade" id="validationPayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= BASEURL; ?>/pembayaran/validationPayment" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid px-4 my-4">
                        <input type="hidden" name="id_pembayaran" id="id_pembayaran">
                        <div class="mb-3">
                            <label class="mb-3" for="validasiInput">Validasi Pembayaran</label>
                            <select name="validasi" id="validasiInput" class="form-select">
                                <option value="Belum Lunas">Belum Lunas</option>
                                <option value="Pending">Pending</option>
                                <option value="Lunas">Lunas</option>
                            </select>
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

<!-- End Moddal Validasi Pembayaran -->

<!-- Start Modal View Detail -->

<div class="modal fade" id="viewDetailPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Gambar Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="detailImage" class="text-center">
                    <img id="imageElement" src="" width="450px" class="" alt="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- End Modal View Detail -->