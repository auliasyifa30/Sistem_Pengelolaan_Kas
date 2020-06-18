<!-- menangani notice -->
<?PHP error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>

<!-- koneksi pemanggilan file -->
<?php
    $koneksi = new mysqli("localhost", "root", "", "kas");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
      <meta charset="utf-8" />
      <!-- bagian agar layout sistem dapat diakses secara fleksibel -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Pengelolaan Kas</title>
  	  <!-- BOOTSTRAP STYLES-->
      <link href="assets/css/bootstrap.css" rel="stylesheet" />
      <!-- FONTAWESOME STYLES-->
      <link href="assets/css/font-awesome.css" rel="stylesheet" />
      <!-- CUSTOM STYLES-->
      <link href="assets/css/custom.css" rel="stylesheet" />
      <!-- GOOGLE FONTS-->
      <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
      <!-- TABLE STYLES-->
      <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
  </head>

  <body>
    <div id="wrapper">
      <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                  <span class="sr-only">Toggle navigation</span>
              </button>
              <a class="navbar-brand" href="index.php">Pengelolaan Kas</a> 
          </div>

          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;"><img src="assets/img/fotoku.png" width="30px" height="30px" class="img-circle" alt="User Image">  Aulia Syifa</div>
          </a>
      </nav>   

      <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
          <ul class="nav" id="main-menu">
  			    <li class="text-center">
              <img src="assets/img/fotoku.png" height="80px" width="80px" class="user-image img-responsive"/>
    			  </li>

    			  <!-- bagian menu -->
            <li><a  href="index.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
            <li><a  href="?page=masuk"><i class="glyphicon glyphicon-floppy-save"></i>Kas Masuk</a></li>
            <li><a  href="?page=keluar"><i class="glyphicon glyphicon-floppy-open"></i>Kas Keluar</a></li>
            <li><a  href="?page=rekap"><i class="glyphicon glyphicon-th-list"></i>Rekapitulasi Kas</a></li>
          </ul>   
        </div>  
      </nav>  
        
      <div id="page-wrapper" >
        <div id="page-inner">
          <div class="row">
            <div class="col-md-12">
              <!-- pendeklarasian pemanggilan menu yang disesuaikan oleh database -->
              <?php
                  $page = $_GET['page'];
                  $aksi = $_GET['aksi'];

                  if($page == "masuk") {
                      if ($aksi == "") {
                          include "page/kas_masuk/masuk.php";
                      }
                      if ($aksi == "hapus")
                      {
                        include "page/kas_masuk/hapus.php";
                      }
                  }
                  elseif($page == "keluar") {
                      if ($aksi == "") {
                          include "page/kas_keluar/keluar.php";
                      }
                      if ($aksi == "hapus") {
                        include "page/kas_keluar/hapus.php";
                      }
                  }
                  elseif($page == "rekap") {
                      if ($aksi == "") {
                          include "page/rekap/rekap.php";
                      }
                  }
                  elseif($page == "user") {
                      if ($aksi == "") {
                          include "page/user/user.php";
                      }           
                  }
                  elseif($page == "") {
                          include "home.php"; 
                  } 
              ?>
            </div>
          </div>       
        </div>
      </div>
    </div>
    
    
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>

    <!-- proses javascript pada bagian data Tables -->
    <script>
          $(document).ready(function () {
              $('#dataTables-example').dataTable();
          });
    </script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/morris/custom.js"></script>
  </body>
</html>
