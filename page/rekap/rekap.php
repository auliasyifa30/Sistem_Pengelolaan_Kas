<div class="row">
    <div class="col-md-12">
        <!-- membuat tabel menjadi berwarna biru -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                 Data Kas Masuk
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Masuk</th>
                                <th>Keluar</th>
                                <th>Jenis</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- operasi pemanggilan database -->
                            <?php
                                $no = 1;
                                $sql = $koneksi->query("select * from kas");
                                while ($data = $sql->fetch_assoc())
                                {      
                            ?>

                            <!-- proses pemanggilan data yang ada didatabase -->
                            <tr class="odd gradeX">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['kode']; ?></td>
                                <td><?php echo date('d-F-Y', strtotime($data['tgl'])); ?></td>
                                <td><?php echo $data['keterangan']; ?></td>
                                <td align="right"><?php echo number_format($data['jumlah']).",-"; ?></td>
                                <td align="right"><?php echo number_format($data['keluar']).",-"; ?></td>
                                <td><?php echo $data['jenis']; ?></td>
                            </tr>
                            <?php
                                    //proses menjumlahkan uang kas masuk 
                                    $total = $total+$data['jumlah'];

                                    //proses menjumlahkan uang kas keluar 
                                    $total_keluar = $total_keluar+$data['keluar'];

                                    $saldo_akhir = $total-$total_keluar;
                                }

                            ?>
                        </tbody>

                        <!-- bagian total kas masuk -->
                        <tr>
                            <th colspan="5" style="text-align: center; font-size: 15px;" >Total Kas Masuk</th>
                            <td style="font-size: 15px; text-align: right;"><?php echo number_format($total).",-"; ?></td>
                        </tr>

                        <!-- bagian total kas masuk -->
                        <tr>
                            <th colspan="5" style="text-align: center; font-size: 15px;" >Total Kas Keluar</th>
                            <td style="font-size: 15px; text-align: right;"><?php echo number_format($total_keluar).",-"; ?></td>
                        </tr>

                        <!-- bagian total kas masuk -->
                        <tr>
                            <th colspan="5" style="text-align: center; font-size: 15px;" >Saldo Akhir</th>
                            <th style="font-size: 15px; text-align: right;"><?php echo "Rp." .number_format($saldo_akhir).",-"; ?></th>
                        </tr>
                </table>
            </div>
