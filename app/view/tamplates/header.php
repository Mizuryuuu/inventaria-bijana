<!doctype html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Halaman <?= $data['judul']; ?></title>
      <link href="<?= BASEURL; ?>/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?= BASEURL; ?>/fontawesome/css/all.min.css" rel="stylesheet">
      <link href="<?= BASEURL; ?>/css/merge1.css" rel="stylesheet">
      <!-- <link rel="stylesheet" href="/css/style.css"> -->
    </head>
    <body>

    <?php if( $_SESSION['status'] != 0 ) : ?>
     <!-- Body Design -->
     <div class="body-design">
            <div class="row">

                <!-- Sidebar Design -->
                <div class="col-2">
                    <div class="sidebar-design">
                        <div class="logo d-flex justify-content-center">
                            <img src="<?= BASEURL; ?>/img/Logo_inventaria.svg" alt="Inventaria Logo" srcset="">
                        </div>
                        <div class="container px-5">
                            <div class="menu-design d-flex flex-column">
                                <div class="dasboard-design">
                                    <hr class="line-fill">
                                    <a href="<?= BASEURL; ?>/dashboard" class="dasboard">
                                        <i class="fa-solid fa-gauge me-2"></i>
                                        Dashboard
                                    </a>
                                    <hr class="line-fill">
                                    <a href="<?= BASEURL; ?>/siswa" class="dasboard">
                                        <i class="fa-solid fa-user me-2"></i>
                                        Kelola Siswa
                                    </a>
                                    <hr class="line-fill">
                                    <a href="<?= BASEURL; ?>/jurusan" class="dasboard">
                                    <i class="fa-solid fa-book-open-reader me-2 "></i>
                                        Kompetensi Keahlian
                                    </a>
                                    <hr class="line-fill">
                                    <a href="<?= BASEURL; ?>/pembayaran" class="dasboard">
                                        <i class="fa-solid fa-dollar-sign me-2">&nbsp;</i>
                                        Kelola Pembayaran
                                    </a>
                                    <hr class="line-fill">
                                    <a href="<?= BASEURL; ?>/login/logout" class="dasboard">
                                        <i class="fa-solid fa-right-from-bracket me-2"></i>
                                        Logout
                                    </a>
                                    <hr class="line-fill">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Sidebar Design -->
        <?php else : ?>

            <div class="container-fluid  bg-body-tertiary p-3 px-5 shadow-sm">
                <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="#">Pembayaran Spp</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarScroll">
                            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                                <li class="nav-item">
                                    <a class="nav-link <?= ( $data['page'] == 'Home' ) ? "active" : '' ?>" aria-current="page" href="<?= BASEURL; ?>/userpage">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= ( $data['page'] == 'Pembayaran' ) ? "active" : '' ?>" href="<?= BASEURL; ?>/userpage/pembayaran">Pembayaran</a>
                                </li>
                                
                            </ul>
                            <div class="d-flex">
                                <a href="<?= BASEURL; ?>/login/logout" class="btn btn-success px-4">Logout</a>
                            </div>
                        </div>
                    </nav>
            </div>

        <?php endif; ?>