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
                                    <a href="<?= BASEURL; ?>/managepayment" class="dasboard">
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