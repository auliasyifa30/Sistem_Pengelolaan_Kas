<!-- menampilkan data yang ada pada database kas -->
<?php
    $sql = $koneksi->query("select * from kas");
    while ($data=$sql->fetch_assoc())
    {
        // perhitungan jumlah kas masuk
        $jml = $data['jumlah'];
        $total_masuk = $total_masuk+$jml;

        // perhitungan jumlah kas keluar
        $jml_keluar = $data['keluar'];
        $total_keluar = $total_keluar+$jml_keluar;

        // perhitungan sisa uang kas
        $total=$total_masuk-$total_keluar;
    }
?>

<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
         <h3>Halaman Utama</h3> 
            <h4>Sistem Pengelolaan Kas RT 005 RW 09 Cakung Barat</h4>  
        </div>
    </div>              
     <!-- /. ROW  -->
      <hr />
    <div class="row">
    <div class="col-md-4 col-sm-6 col-xs-6">           
<div class="panel panel-back noti-box">
    <span class="icon-box bg-color-green set-icon">
        <i class="glyphicon glyphicon-floppy-save"></i>
    </span>
    <div class="text-box" >
        <p class="main-text"><?php echo "Rp." .number_format($total_masuk); ?>,-</p>
        <p class="text-muted">Total Kas Masuk</p>
    </div>
 </div>
 </div>
        <div class="col-md-4 col-sm-6 col-xs-6">           
<div class="panel panel-back noti-box">
    <span class="icon-box bg-color-red set-icon">
        <i class="glyphicon glyphicon-floppy-open"></i>
    </span>
    <div class="text-box" >
        <p class="main-text"><?php echo "Rp." .number_format($total_keluar); ?>,-</p>
        <p class="text-muted">Total Kas Keluar</p>
    </div>
 </div>
 </div>
        <div class="col-md-4 col-sm-6 col-xs-6">           
<div class="panel panel-back noti-box">
    <span class="icon-box bg-color-blue set-icon">
        <i class="glyphicon glyphicon-floppy-disk"></i>
    </span>
    <div class="text-box" >
        <p class="main-text"><?php echo "Rp." .number_format($total); ?>,-</p>
        <p class="text-muted">Saldo Akhir</p>
    </div>
 </div>
 </div>
     