<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SiPus</title>
    <link href="asset/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  </head>
  <body>
    <?php
    session_start();
    if(!@$_SESSION['idadmin']){
      header('location: login.php');
    }
    ?>
    <div class="d-flex" id="wrapper">
      <!-- Sidebar-->
      <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light">SiPus</div>
        <div class="list-group list-group-flush">
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php?page=buku-list">Data Buku</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php?page=anggota-list">Data Anggota</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php?page=transaksi-list">Data Transaksi</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php?page=peminjaman">Data Peminjaman</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php?page=pengembalian">Data Pengembalian</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php?page=laporan">Statistik</a>        </div>
      </div>
      <!-- Page content wrapper-->
      <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
          <div class="container-fluid">
            <button class="btn btn-primary" id="sidebarToggle">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
              </svg>
            </button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <?php
                 echo 'Hai, ' ;
                 echo $_SESSION['sesi'].'&nbsp;';
                ?>
                <?php
                echo '  ';
                ?>
                <button type="button" class="btn btn-outline-primary btn-sm"><a href="index.php?page=logout"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
                    <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                  </a>
                </button>
              </ul>
            </div>
          </div>
        </nav>
        <!-- Page content-->
        <div class="container-fluid">
        <?php
                    // panggil fungsi koneksi ke database
                    include "db_connection.php";
    
                    if (@$_GET['page']) {
                        $page = $_GET['page'];

                        include $page.".php";
                    } else {
                        include 'home.php';
                    }

                    ?>
        </div>
      </div>
    </div>
    <!-- Core theme JS-->
    <script src="asset/js/bootstrap.bundle.min.js"></script>
    <script src="asset/js/jquery-3.5.1.slim.min.js"></script>
    <script src="asset/js/scripts.js"></script>
  </body>
</html>
