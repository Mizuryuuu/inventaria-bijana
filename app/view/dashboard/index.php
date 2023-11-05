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
                              Total Siswa Aktif</div>
                          <div class="h5"><?= count($data['accountUser']); ?></div>
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

           
          </div>
        </div>

        <div class="container shadow p-4 rounded">
            <div class="mb-4 mt-2">
                <h4>Data Accounts Users</h4>
            </div>
            <a href="" data-bs-toggle="modal" data-bs-target="#TambahUser" class="btn btn-primary ms-2 mb-3">Tambah User</a>

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
                              <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-warning text-white rounded"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
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
        </div>
        
    </div>
</div>


<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
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
                  <label class="mb-2" for="username">Username</label>
                  <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username. . .">
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
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
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


