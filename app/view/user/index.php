<div class="container mt-5">
    <div class="accordion">
        <div class="accordion-item">
            <div class="h4 text-uppercase accordion-header bg-primary-subtle border border-primary-subtle p-2 px-4">
                Biodata Siswa
            </div>
        </div>
        <div class="accordion-body border border-top-0 rounded-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <div class="h6 my-4">Nama Siswa</div>
                        <div class="h6 my-4">Nis</div>
                        <div class="h6 my-4">Kelas</div>
                        <div class="h6 my-4">Kompetensi Keahlian</div>
                    </div>
                    <div class="col-9">
                        <?php if( $data['biodataSiswa']['id_tingkat'] == 3 ) {
                            $tingkat = 'XII';
                        } elseif( $data['biodataSiswa']['id_tingkat'] == 2 ) {
                            $tingkat = 'XI';
                        } else {
                            $tingkat = 'X';
                        }
                        ?>
                        <div class="h6 my-4">: <?= $data['biodataSiswa']['nama_siswa']; ?></div>
                        <div class="h6 my-4">: <?= $data['biodataSiswa']['nis']; ?></div>
                        <div class="h6 my-4">: <?= $tingkat; ?> <?= $data['biodataSiswa']['kode_jurusan']; ?> <?= $data['biodataSiswa']['kelas']; ?></div>
                        <div class="h6 my-4">: <?= $data['biodataSiswa']['nama_jurusan']; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion mt-5">
        <div class="accordion-item">
            <div class="h4 text-uppercase accordion-header bg-primary-subtle border border-primary-subtle p-2 px-4">
                Tagihan Siswa
            </div>
        </div>
        <div class="accordion-body border border-top-0 rounded-bottom">
            <div class="container">
                <table class="table border table-striped align-middle text-center">
                    <thead>
                        <tr>
                            <th class="fw-semibold">No</th>
                            <th class="fw-semibold">Pembayaran Bulan</th>
                            <th class="fw-semibold">Jumlah Bayaran</th>
                            <th class="fw-semibold">Tanggal Bayar</th>
                            <th class="fw-semibold">Keterangan</th>
                            <th class="fw-semibold">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach( $data['tagihan'] as $rowTagihan ) : ?>
                            <?php 
                                if( $rowTagihan['tanggal_bayar'] != null ) {
                                    $tanggalBayar = $rowTagihan['tanggal_bayar'];
                                } else {
                                    $tanggalBayar = "";
                                }
                            ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $rowTagihan['bulan']; ?></td>
                                    <td><?= $rowTagihan['harga']; ?></td>
                                    <td><?= $rowTagihan['tanggal_bayar']; ?></td>
                                    <td><span class="badge text-bg-<?= ($rowTagihan['keterangan'] == 'Lunas') ? 'success' : ($rowTagihan['keterangan'] == 'Pending' ? 'warning' : 'danger') ?>"><?= $rowTagihan['keterangan']; ?></span></td>
                                    <td>
                                        <button id="viewDataDetail" <?= ( $rowTagihan['keterangan'] == 'Lunas' ) ? '' : 'disabled'; ?> data-bs-toggle="modal" data-bs-target="#viewDetailPembayaran" data-id="<?= $rowTagihan['id_pembayaran']; ?>" class="btn btn-<?= ( $rowTagihan['keterangan'] == 'Lunas' ) ? 'info' : 'secondary'; ?> text-white rounded"><i class="fa-solid fa-eye" style="color: #ffffff;"></i></button>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Start modal view cihuyyy -->
<div class="modal fade" id="viewDetailPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
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

<!-- End modal view cihuyyy -->