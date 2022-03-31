<?php
include '../koneksi/koneksi.php';
 $a=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_periode_penilaian"));
 $tglm=date($a['tgl_mulai']);
$tgla=date($a['batas_periode']);
$tgls=date('Y-m-d H:i:s');

if($tglm > $tgls){
  echo "<script type='text/javascript'>
    alert('Maaf Saat ini belum Periode Pemberian nilai !!');
  </script>";
  echo "<script> window.history.back(); </script>";
 
}elseif($tgla < $tgls){
  echo "<script type='text/javascript'>
    alert('Maaf anda sudah melewati batas pemberian nilai, silahkan hubungi admin prodi !!');
  </script>";
  echo "<script> window.history.back(); </script>";
 
}
else{
?>
    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form Nilai Untuk Instansi
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">Nilai Untuk Instansi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Nilai Untuk Instansi </h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                            

                            $id=$_GET['id'];

                            if(isset($_POST['b1'])){

                            if(empty($_POST['tot_nilai_ins'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Form Tidak boleh kosong.
                                  </div>';
                              }else{

                              // $sql=mysqli_query($koneksi,"INSERT INTO tb_nilai_instansi VALUES disiplin='0',jujur='0',sosialisasi='0',komunikasi='0',k_manajerial='0',k_tim='0',k_komputer='0',p_ilmu_penunjang='0',kwa_hasil_kerja='0',motivasi_hal_baru='0',total_nilai_ins=$_POST[tot_nilai_ins],nm_pbb_instansi='$_POST[nmpb]',nip='$_POST[nip]',jabatan='$_POST[jbt]',stt_nilai='Sudah' WHERE kd_nilai_instansi='$id'");

                                $sql=mysqli_query($koneksi,"UPDATE `tb_nilai_instansi` SET total_nilai_inst = '$_POST[tot_nilai_ins]',nm_pbb_instansi = '$_POST[nmpb]',nip = '$_POST[nip]',jabatan = '$_POST[jbt]' WHERE kd_nilai_instansi = '$_GET[id]' ");
                                //  if($sql){
                                //   echo "sukses";die;
                                // } else{
                                //   echo "gagal";die;
                                // }

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Nilai berhasil diberikan.
                                  </div>';
                                  echo "<meta http-equiv=refresh content=1;url=index.php?p=list-mahasiswa-belum-dinilai>";
                            }
                            }
                            ?>
              <div class="col-lg-6">

                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                      <?php 
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT tb_mhs.*,tb_nilai_instansi.*,tb_penempatan.posisi FROM tb_nilai_instansi,tb_mhs,tb_penempatan where tb_nilai_instansi.kd_nilai_instansi='$id' and tb_penempatan.nim=tb_mhs.nim and tb_mhs.nim=tb_nilai_instansi.nim"));
                      ?>
                        <div class="row mhs">
                          <div class="col-md-3">
                            <img src="./../images/user/<?php echo $q['foto']; ?>" alt="" style="width: 100px;height: 100px;">
                          </div>
                          <div class="col-md-9">
                            <p><b>NIM :</b> <?php echo $q['nim']; ?></p>
                            <p><b>Nama :</b> <?php echo strtoupper($q['nama']); ?></p>
                            <p><b>Jenis Kelamin :</b> <?php echo $q['jekel']; ?></p>
                            <p><b>Posisi Penempatan :</b> <?php echo $q['posisi']; ?></p>
                          </div>

                        </div>
                        <br>
                          <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Perhatian :</label>
                                <br>
                                    <span><i>* Isi nilai dengan angka dari 1-100</i></span>
                                      </div>
                                     
                                </div>
                            </div>
                          <br>
                            <!-- <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>1. Kedisiplinan</label>
                                   <input type="number" name="dis" class="form-control" maxlength="100" value="<?php echo $q['disiplin']; ?>">

                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>2. Kejujuran</label>
                                   <input type="number" name="jjr" class="form-control" maxlength="100" value="<?php echo $q['jujur']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>3. Kemampuan Bersosialisasi ditempat Linkungan PKL</label>
                                   <input type="number" name="sos" class="form-control" maxlength="100" value="<?php echo $q['sosialisasi']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>4. Kemampuan Komunikasi ( Lisan atau Tulisan) Dala Bekerja</label>
                                   <input type="number" name="kom" class="form-control" maxlength="100" value="<?php echo $q['komunikasi']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>5. Kemapuan Manajerial</label>
                                   <input type="number" name="mnj" class="form-control" maxlength="100" value="<?php echo $q['k_manajerial']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>6. Kemampuan Bekerjasama Dalam Tim</label>
                                   <input type="number" name="tim" class="form-control" maxlength="100" value="<?php echo $q['k_tim']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>7. Kemampuan Dalam Aplikasi Dunia Komputer</label>
                                   <input type="number" name="app" class="form-control" maxlength="100" value="<?php echo $q['k_komputer']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>8. Penguasaan Ilmu penunjang (Administrasi,akuntansi,dll)</label>
                                   <input type="number" name="ip" class="form-control" maxlength="100" value="<?php echo $q['p_ilmu_penunjang']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>9. Kualitas Hasil Kerja</label>
                                   <input type="number" name="khk" class="form-control" maxlength="100" value="<?php echo $q['kwa_hasil_kerja']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>10. Motivasi Dalam mempelajari Hal Baru Untuk Kemajuan Instansi</label>
                                   <input type="number" name="mot" class="form-control" maxlength="100" value="<?php echo $q['motivasi_hal_baru']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br> -->
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nilai:</label>
                                   <input type="number" name="tot_nilai_ins" class="form-control" maxlength="100" value="<?php echo $q['total_nilai_inst']; ?>">
                                   <input type="hidden" name="nim" class="form-control" value="<?php echo $q['nim']; ?>">
                                </div>
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nama Pembimbing di Instansi</label>
                                   <input type="text" name="nmpb" class="form-control" maxlength="100" value="<?php echo $q['nm_pbb_instansi']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nip Pembimbing di Instansi</label>
                                   <input type="text" name="nip" class="form-control" maxlength="100" value="<?php echo $q['nip']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Jabatan Pembimbing</label>
                                   <input type="text" name="jbt" class="form-control" maxlength="100" value="<?php echo $q['jabatan']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Nilai</button>
                                    <a href="index.php?p=list-mahasiswa-belum-dinilai" class="btn btn-info"><i class="fa fa-table"></i> Data Mahasiswa</a>
                                </div>
                            </div>
                        </form>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->

   </div>
   <?php } ?>