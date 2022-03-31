      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Nilai Mahasiswa
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">Data Nilai Mahasiswa</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Nilai Mahasiswa Dari Instansi</h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                

                    <?php
                       include './../koneksi/koneksi.php'; 
                 
                    $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT tb_mhs.*,tb_nilai_instansi.*,tb_instansi.nm_instansi,tb_penempatan.posisi FROM tb_nilai_instansi,tb_mhs,tb_instansi,tb_penempatan where tb_instansi.kd_instansi=tb_nilai_instansi.kd_instansi and tb_mhs.nim=tb_nilai_instansi.nim and tb_penempatan.nim=tb_mhs.nim and tb_mhs.nip_pembimbing='$id' and tb_mhs.nim='$_GET[nim]'"));

                    $q_jum=mysqli_num_rows(mysqli_query($koneksi,"SELECT tb_mhs.*,tb_nilai_instansi.*,tb_instansi.nm_instansi,tb_penempatan.posisi FROM tb_nilai_instansi,tb_mhs,tb_instansi,tb_penempatan where tb_instansi.kd_instansi=tb_nilai_instansi.kd_instansi and tb_mhs.nim=tb_nilai_instansi.nim and tb_penempatan.nim=tb_mhs.nim and tb_mhs.nip_pembimbing='$id' and tb_mhs.nim='$_GET[nim]'"));

                    if ($q_jum > 0){

                    $total=$q['disiplin']+$q['jujur']+$q['sosialisasi']+$q['k_manajerial']+$q['komunikasi']+$q['k_komputer']+$q['k_tim']+$q['p_ilmu_penunjang']+$q['kwa_hasil_kerja']+$q['motivasi_hal_baru']+$q['total_nilai_inst'];
                    $nilai=$total/1;
                    ?> 
                    <div class="col-md-6">
                     <div class="row mhs">
                          <div class="col-md-3">
                            <img src="./../images/user/<?php echo $q['foto']; ?>" alt="" style="width: 100px;height: 100px;">
                          </div>
                          <div class="col-md-9">
                            <p><b>NIP :</b> <?php echo $q['nim']; ?></p>
                            <p><b>Nama :</b> <?php echo strtoupper($q['nama']); ?></p>
                            <p><b>Jenis Kelamin :</b> <?php echo $q['jekel']; ?></p>
                          </div>

                        </div>
                        </div> 
                    <div class="col-md-6">
                      Tempat PKL : <b><?php echo $q['nm_instansi'] ?></b><br>
                      Penempatan Posisi : <b><?php echo $q['posisi'] ?></b><br>
                      Status Penilaian : <b><?php echo $q['stt_nilai'] ?> Dinilai</b><br>
                    </div>
                  <table class="table table-bordered table-striped">
                      <!-- <tr>
                        <td>1.</td>
                        <td> Kedisiplinan</td>
                        <td><?php echo $q['disiplin']; ?></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Kejujuran</td>
                        <td><?php echo $q['jujur']; ?></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Kemampuan Bersosialisasi ditempat Linkungan PKL</td>
                        <td><?php echo $q['sosialisasi']; ?></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kemampuan Komunikasi ( Lisan atau Tulisan) Dala Bekerja</td>
                        <td><?php echo $q['komunikasi']; ?></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Kemapuan Manajerial</td>
                        <td><?php echo $q['k_manajerial']; ?></td>
                      <tr>
                        <td>6.</td>
                        <td>Kemampuan Bekerjasama Dalam Tim</td>
                        <td><?php echo $q['k_tim']; ?></td>
                      </tr>
                      <tr>
                        <td>7.</td>
                        <td>Kemampuan Dalam Aplikasi Dunia Komputer</td>
                        <td><?php echo $q['k_komputer']; ?></td>
                      </tr>
                      <tr>
                        <td>8.</td>
                        <td>Penguasaan Ilmu penunjang (Administrasi,akuntansi,dll)</td>
                        <td><?php echo $q['p_ilmu_penunjang']; ?></td>
                      </tr>
                      <tr>
                        <td>9.</td> 
                        <td>Kualitas Hasil Kerja</td>
                        <td><?php echo $q['kwa_hasil_kerja']; ?></td>
                      </tr>
                       <tr>
                        <td>10.</td> 
                        <td>Motivasi Dalam Mempelajari Hal Baru Untuk Kemajuan Instansi</td>
                        <td><?php echo $q['motivasi_hal_baru']; ?></td>
                      </tr> -->
                      <tr>
                        <td>1.</td> 
                        <td>Total Nilai Dari Instansi</td>
                        <td><?php echo $q['total_nilai_inst']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Total</b></td>
                        <td><b><?php echo $total; ?></b></td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Nilai Instansi</b></td>
                        <td><b><h2><?php echo $nilai; ?></h2></b></td>
                      </tr>
                  </table>
                  <br>
                  <p>Nama Pembimbing di Instansi : <b> <?php echo $q['nm_pbb_instansi']; ?></b></p>
                  <p> Nip Pembimbing : <b><?php echo $q['nip']; ?></b></p>
                  <p>Jabatan Pembimbing : <b><?php echo $q['jabatan']; ?></b></p>

                <?php } else {echo "<center>Belum Di Nilai</center>";} ?>
                     
               
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

            </section><!-- /.content -->
      </div><!-- /.content-wrapper -->