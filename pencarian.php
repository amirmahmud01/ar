<?php 
  include 'koneksi.php'; 
  session_start(); 
  if (!isset($_SESSION['user'])) {
    echo "<script>
    alert('Silahkan masuk terlebih dahulu');
    document.location='login.php';
    </script>";
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Aplikasi Arsip Bulanan</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="ckeditor/ckeditor.js"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon">
      <i class="fas fa-home"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Ap-Arsip</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Dokumen
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link" href="http://localhost/ap-arsip/index.php?page=arsip">
      <i class="fas fa-fw fa-file"></i>
      <span>Arsip</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Profil
  </div>

  <!-- Nav Item - Pages Collapse Menu -->

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="http://localhost/ap-arsip/index.php?page=saya">
      <i class="fas fa-fw fa-user"></i>
      <span>Saya</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="http://localhost/ap-arsip/index.php?page=perusahaan">
      <i class="fas fa-fw fa-suitcase"></i>
      <span>Perusahaan</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include "topbar.php"; ?>
        <!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Content Row -->
  <div class="container">

    <!-- Default Card Example -->
    
    <div class="row">
    	<?php
    	include "koneksi.php";
			error_reporting(0);
			if (isset($_GET['cari'])) {
				$cari = $_GET['cari'];
				$query = $koneksi->query("SELECT * FROM dokumen JOIN bulanan ON dokumen.id_bulanan = bulanan.id_bulanan WHERE nama LIKE '%".$cari."%' OR bulan LIKE '%".$cari."%' OR tanggal LIKE '%".$cari."%' OR file LIKE '%".$cari."%'");
			} else {
				$query= $koneksi->query("SELECT * FROM dokumen");
			}
			if (mysqli_num_rows($query)) {
			while ($data = mysqli_fetch_array($query)) { 
		?>
		<div class="card mb-4 col-md-4">
		    <div class="card-header">
		      <?php echo $data['nama']; ?>
		    </div>
		    <div class="card-body">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo $data['bulan']; ?></div>
		    	<?php echo $data['file']; ?>
		    	<p><?php echo $data['tanggal']; ?></p>
          <?php if($_SESSION['user']['level']=='admin') : ?>
		    	<a target="_blank" href="page/arsip/file/<?php echo $data['file']; ?>" class="btn btn-info"><span class="fa fa-fw fa-print"></span> Cetak</a>
                <a href="?page=ubah-arsip&id=<?php echo $data['id']; ?>" class="btn btn-primary">Ubah</a>
                <a href="?page=hapus-arsip&id=<?php echo $data['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">Hapus</a>
                <?php else : ?>
                  <div></div>
                <?php endif; ?>
		    </div>
		</div>
		<?php } } else {
			echo "<div class='alert alert-danger col-md-12'>Arsip Tidak Ditemukan !</div>";
		} ?>

    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2022 Ap-Arsip</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah anda yakin ingin keluar ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="ckeditor/ckeditor.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>

