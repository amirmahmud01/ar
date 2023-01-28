<?php  
  if (isset($_GET['page'])) {
    if ($_GET['page'] == "arsip") {
      include 'page/arsip/arsip.php';
    } elseif ($_GET['page'] == "arsip-bulanan") {
      include 'page/arsip/arsip-bulanan.php';
    } elseif ($_GET['page'] == "tambah-arsip") {
      include 'page/arsip/tambah-arsip.php';
    } elseif ($_GET['page'] == "ubah-arsip") {
      include 'page/arsip/ubah-arsip.php';
    } elseif ($_GET['page'] == "proses-ubah-arsip") {
      include 'page/arsip/proses-ubah-arsip.php';
    } elseif ($_GET['page'] == "detail-arsip") {
      include 'page/arsip/detail-arsip.php';
    } elseif ($_GET['page'] == "hapus-arsip") {
      include 'page/arsip/hapus-arsip.php';
    } elseif ($_GET['page'] == "filter") {
      include 'page/arsip/filter.php';
    } elseif ($_GET['page'] == "detail") {
      include 'page/arsip/detail.php';

    }elseif ($_GET['page'] == "cos") {
      include 'page/costomer/cos.php';
    } elseif ($_GET['page'] == "c-bulanan") {
      include 'page/costomer/c-bulanan.php';
    } elseif ($_GET['page'] == "tambah-cos") {
      include 'page/costomer/tambah-cos.php';
    } elseif ($_GET['page'] == "ubah-cos") {
      include 'page/costomer/ubah-cos.php';
    } elseif ($_GET['page'] == "proses-ubah-cos") {
      include 'page/costomer/proses-ubah-cos.php';
    } elseif ($_GET['page'] == "detail-cos") {
      include 'page/costomer/detail-cos.php';
    } elseif ($_GET['page'] == "hapus-cos") {
      include 'page/costomer/hapus-cos.php';
    } elseif ($_GET['page'] == "ripot") {
      include 'page/costomer/ripot.php';
    
    

    }elseif ($_GET['page'] == "rkl") {
      include 'page/penyimpangan/rkl.php';
    } elseif ($_GET['page'] == "suplier-bulanan") {
      include 'page/suplier/arsip-bulanan.php';
    } elseif ($_GET['page'] == "tambah-arsip") {
      include 'page/suplier/tambah-supier.php';
    } elseif ($_GET['page'] == "ubah-arsip") {
      include 'page/supier/ubah-supier.php';
    } elseif ($_GET['page'] == "proses-ubah-arsip") {
      include 'page/supier/proses-ubah-supier.php';
    } elseif ($_GET['page'] == "detail-arsip") {
      include 'page/supier/detail-supier.php';
    } elseif ($_GET['page'] == "hapus-arsip") {
      include 'page/supier/hapus-supier.php';
    } elseif ($_GET['page'] == "hapus-dok") {
      include 'page/supier/hapus-dok.php';
    }elseif ($_GET['page'] == "suplier") {
      include 'page/costomer/cos.php';

    

    } elseif ($_GET['page'] == "pencarian") {
      include 'page/pencarian.php';


    } elseif ($_GET['page'] == "saya") {
      include 'page/profil/saya/saya.php';
    } elseif ($_GET['page'] == "ubah-saya") {
      include 'page/profil/saya/ubah-saya.php';
    } elseif ($_GET['page'] == "proses-ubah-saya") {
      include 'page/profil/saya/proses-ubah-saya.php';
    } elseif ($_GET['page'] == "detail-saya") {
      include 'page/profil/saya/detail-saya.php';


    } elseif ($_GET['page'] == "perusahaan") {
      include 'page/profil/perusahaan/perusahaan.php';
    } elseif ($_GET['page'] == "ubah-perusahaan") {
      include 'page/profil/perusahaan/ubah-perusahaan.php';
    } 
  } else {
      include 'home.php';
  }
?>