<div class="col">   
    <div class="container pt-4">
        <h1 class="mb-4"><?= $data['judul']; ?></h1>
        
        <div class="container mb-3">
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border border-0 border-start border-5 border-primary shadow py-2 px-4">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs fw-bold text-primary text-uppercase mb-1">
                              Total Account Aktif</div> 
                          <div class="h5"><?= count($data['activeAccountUser']); ?></div>
                      </div>
                      <div class="col-auto">
                          <i class="fa-solid fa-calendar fa-2x" style="color: #abadb8;"></i>
                      </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border border-0 border-start border-5 border-success shadow py-2 px-4">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs fw-bold text-success text-uppercase mb-1">
                              Siswa Sudah Bayar</div>
                          <div class="h5">0<? // count($data['accountUser']); ?></div>
                      </div>
                      <div class="col-auto">
                          <i class="fa-solid fa-dollar-sign fa-2x" style="color: #abadb8;"></i>
                      </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border border-0 border-start border-5 border-danger shadow py-2 px-4">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs fw-bold text-danger text-uppercase mb-1">
                              Siswa Belum Bayar</div>
                          <div class="h5">0<? // count($data['accountUser']); ?></div>
                      </div>
                      <div class="col-auto">
                          <i class="fa-solid fa-chart-line fa-2x" style="color: #abadb8;"></i>
                      </div>
                  </div>
                </div>
              </div>
            </div>

              <?php Flasher::flashMessege(); ?>

          </div>
        </div>

        <div class="container shadow p-3 rounded">
            <div class=" mt-2 ms-2">
                <h4 class="mb-3">Data Accounts Users</h4>
                <a href="" data-bs-toggle="modal" data-bs-target="#TambahUser" class="btn btn-primary ms-2 mb-3">Tambah User</a>
            </div>

            <div class="px-4">
                <table class="table table-striped text-center align-middle">
                    <thead>
                      <tr>
                        <th class="col-1">No</th>
                        <th class="col-3">Username</th>
                        <th class="col-3">Gmail</th>
                        <th class="col-1">Status</th>
                        <th class="col-4">action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ( $data['accountUser'] as $row ) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $row['username']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <?php if( $row['status'] == 'true' ) : ?>
                            <td><p class="bg-success text-white m-1 p-1 rounded">True</p></td>
                        <?php else : ?>
                            <td><p class="bg-danger text-white m-1 p-1 rounded">False</p></td>
                        <?php endif; ?>
                        <td class="container d-flex justify-content-center">
                            <div class="row">
                              <div class="col-4">
                              <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary text-white rounded"><i class="fa-solid fa-key" style="color: #ffffff;"></i></a>
                                <!-- Konten Kolom 1 -->
                              </div>
                              <div class="col-4">
                              <button data-bs-toggle="modal" data-bs-target="#editDataUser" data-id="<?= $row['id_acc'] ?>" value="<?= $row['id_acc'] ?>" id="dataEdit" class="btn btn-warning text-white rounded"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button>
                                <!-- Konten Kolom 2 -->
                              </div>
                              <div class="col-4">
                              <a href="<?= BASEURL ?>/dashboard/delete/<?= $row['id_acc'] ?>" class="btn btn-danger text-white rounded"><i class="fa-solid fa-trash-can" style="color: #ffffff;"></i></a>
                              </div>
                            </div>
                        </td> 
                    </tr>
                    <?php $i++ ?>
                    <?php endforeach ; ?>
                    </tbody> 
                </table>
            </div>
            <div class="pagination d-flex justify-content-end me-5 ">
              <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <?php if( $data['halaman_aktif'] > 1 ) : ?>
                    <a class="text-decoration-none page-item" href="<?= BASEURL; ?>/dashboard/pages/<?= $data['halaman_aktif'] - 1 ?>">
                      <li class="page-link">
                        <span>Previous</span>
                      </li>
                    </a>
                  <?php else : ?>
                    <li class="page-item disabled">
                      <span class="page-link">Previous</span>
                    </li>
                  <?php endif; ?>
                  <?php for ( $i = 1; $i <= $data['jumlah_halaman'] ; $i++ ) : ?>
                    <?php if( $i == $data['halaman_aktif'] ) : ?>
                      <a class="page-item  active" href="<?= BASEURL ?>/dashboard/pages/<?= $i ?>">
                        <li class="page-link">
                          <?= $i ?>
                        </li>
                      </a>
                    <?php else : ?>
                      <a class="page-link" href="<?= BASEURL ?>/dashboard/pages/<?= $i ?>">
                        <li class="page-item">
                          <?= $i ?>
                        </li>
                      </a>
                    <?php endif; ?>
                  <?php endfor; ?>
                  <?php if( $data['halaman_aktif'] < $data['jumlah_halaman'] ) : ?>
                    <a class="text-decoration-none page-item" href="<?= BASEURL; ?>/dashboard/pages/<?= $data['halaman_aktif'] + 1 ?>">
                      <li class="page-link">
                        <span>Next</span>
                      </li>
                    </a>
                  <?php else : ?>
                    <li class="page-item disabled">
                      <span class="page-link">Next</span>
                    </li>
                  <?php endif; ?>
                </ul>
              </nav>
            </div>
        </div>
        
    </div>
</div>


<!-- Modal Change Password -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
          <form action="<?= BASEURL; ?>/dashboard/changePassword" method="post">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container-fluid px-4 my-4">
                <div class="mb-3">
                  <label class="mb-2" for="password">Password</label>
                  <input class="form-control" type="text" name="password" id="password">
                </div>
                <div class="mb-3">
                  <label class="mb-2" for="konfirmasi_password">Konfirmasi Password</label>
                  <input class="form-control" type="text" name="konfirmasi_password" id="konfirmasi_password">
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

    <!-- Modal Edit Data User -->
    <div class="modal fade" id="editDataUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
        <form action="<?= BASEURL; ?>/dashboard/ubahDataUser" method="post">
          <div class="modal-header">
            <h3 class="modal-title fs-3" id="exampleModalLabel">Edit User</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container-fluid px-4 my-4">
              <input type="hidden" name="id_acc" id="id_acc">
              <div class="mb-3">
                <label class="mb-2" for="nis">Username</label>
                <input type="text" name="nis" id="nis" class="form-control">
              </div>
              <div class="mb-3">
                <label class="mb-2" for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
              </div>
              <div class="mb-3">
                <label class="mb-2" for="status">Status</label>
                <select class="form-select" name="status" id="status">
                  <option value="true">True</option>
                  <option value="false">False</option>
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

    <!-- Modal Tambah User -->
    <div class="modal fade" id="TambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title fs-3" id="exampleModalLabel">Tambah User</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?= BASEURL ?>/dashboard/tambah" method="post">
              <div class="container-fluid px-4 my-4">
                <div class="mb-3">
                  <label class="mb-2" for="nis">Username</label>
                  <select name="nis" id="nis" class="form-select">
                    <?php foreach ($data['nis_siswa'] as $row) : ?>
                      <option value="<?= $row['nis']; ?>"><?= $row['nis']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="mb-2" for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email User. . .">
                </div>
                <div class="mb-3">
                  <label class="mb-2" for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password User. . .">
                </div>
                <div class="mb-3">
                  <label class="mb-2" for="level">Level</label>
                  <select name="level" id="level" class="form-select">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
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


