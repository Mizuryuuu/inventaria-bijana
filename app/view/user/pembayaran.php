<div class="container pt-4">
    <div class="h3 text-uppercase">Pembayaran Tagihan Spp</div>
    <div class="w-50 mt-4 shadow p-5 rounded">
        <form action="<?= BASEURL; ?>/userpage/updatePembayaran" method="post" enctype="multipart/form-data">
            <div class="row my-2">
                <div class="col-4">
                    <p>Nis</p>
                </div>
                <div class="col">
                    <p><?= $data['biodataSiswa']['nis']; ?></p>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-4">
                    <p>Nama Siswa</p>
                </div>
                <div class="col">
                    <p><?= $data['biodataSiswa']['nama_siswa']; ?></p>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-4 col-form-label">Bulan</div>
                <div class="col">
                    <select name="bulan" id="bulanInput" class="form-select w-75">
                        <?php foreach( $data['queryBulan'] as $rowBulan) : ?>
                        <option value="<?= $rowBulan['id_spp']; ?>"><?= $rowBulan['bulan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row my-2 mt-3">
                <div class="col-4">
                    <p>Total Tagihan</p>
                </div>
                <div class="col">
                    <p>Rp 200.000</p>
                </div>
            </div>
            <div class="row">
                <label for="gambar" class="col-4 col-form-label">Bukti Pembayaran</label>
                <div class="col">
                    <input type="file" name="gambar" id="gambar" class="form-control w-75" placeholder="Masukan Nominal">
                    <img src="" alt="" id="privewImage">
                </div>
            </div>
            <div class="mt-4 text-end">
                <button type="submit" class="btn btn-primary px-5">Bayar</button>
            </div>
        </form>
    </div>
</div>