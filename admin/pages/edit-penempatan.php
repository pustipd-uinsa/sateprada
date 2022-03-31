
    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Penempatan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">Penempatan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Edit Penempatan</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                            include '../koneksi/koneksi.php';

                            $id=$_GET['id'];

                            if(isset($_POST['b1'])){

                            if(empty($_POST['nim']) or empty($_POST['instansi'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';
                              }else{
                                  
                                if ($_POST['tmp_instansi'] != $_POST['instansi']){
                                    $select_prodi2 = mysqli_query($koneksi,"SELECT prodi from tb_mhs where nim = '$_POST[nim]'");
                                    $d_prodi2 = mysqli_fetch_array($select_prodi2);
                                    $prodi2 = $d_prodi2['prodi'];
                                    
                                    $jum_pendaftar2 = mysqli_query($koneksi,"SELECT count(tb_mhs.prodi) as jum_prodi FROM `tb_penempatan` inner join tb_mhs on tb_penempatan.nim = tb_mhs.nim where tb_penempatan.kd_instansi = '$_POST[instansi]' AND tb_mhs.prodi = $prodi2 AND tb_mhs.stts_hps ='0'");
                                    $d_jum_pendaftar2 = mysqli_fetch_array($jum_pendaftar2);
    
                                    $jum_kuota2 = mysqli_query($koneksi,"SELECT * FROM tb_kuota WHERE kd_instansi= '$_POST[instansi]' AND id_prodi = $prodi2");
                                    if (mysqli_num_rows($jum_kuota2) > 0){
                                      $d_jum_kuota = mysqli_fetch_array($jum_kuota2);
                                      $j_kuota2 = $d_jum_kuota['jum_kuota'];
                                    } else{
                                      $j_kuota2 = 0;
                                    }
                                    
                                    if ($d_jum_pendaftar2['jum_prodi'] < $j_kuota2){
    
                                        $sql=mysqli_query($koneksi,"UPDATE tb_penempatan SET nim='$_POST[nim]',kd_instansi='$_POST[instansi]',periode='$_POST[periode]',tgl_mulai_pkl='$_POST[tglm]',tgl_akhir_pkl='$_POST[tgls]' WHERE kd_penempatan='$id'");
                                        
        
                                         echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">×</span></button>
                                          <strong>Sukses!</strong> Data berhasil diedit.
                                          </div>';
                                    } else {
                                        echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">×</span></button>
                                          <strong>Gagal!</strong> Tidak bisa mengisi karena data penuh.
                                          </div>';
                                    }
                                } else {
                                    $sql=mysqli_query($koneksi,"UPDATE tb_penempatan SET nim='$_POST[nim]',periode='$_POST[periode]',tgl_mulai_pkl='$_POST[tglm]',tgl_akhir_pkl='$_POST[tgls]' WHERE kd_penempatan='$id'");
                                        
        
                                         echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">×</span></button>
                                          <strong>Sukses!</strong> Data berhasil diedit.
                                          </div>';
                                }
                            }
                            }
                            ?>
              <div class="col-lg-6">

                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                      <?php 
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_penempatan where kd_penempatan='$id'"));
                        $nim = $q['nim'];
                        $select_nama_mhs = mysqli_query($koneksi,"SELECT * from tb_mhs where nim = '$nim'");
                        $s = mysqli_fetch_array($select_nama_mhs);
                      ?>

                              <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nama Mahasiswa</label>
                                <input type="" class="form-control" value="<?php echo $s['nama']; ?>" readonly>
                                <input type="hidden" name="nim" class="form-control" value="<?php echo $nim ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Penempatan / Nama Instansi</label>
                                    <input type="hidden" name="tmp_instansi" class="form_control" value="<?php echo $q['kd_instansi']; ?>">
                                     <select name="instansi" class="form-control">
                                     <option value="">-Pilih-</option>
                                      <?php
                       include './../koneksi/koneksi.php'; 
                    $sql3=mysqli_query($koneksi,"SELECT * FROM tb_instansi");
                      while($q3=mysqli_fetch_array($sql3)){ ?>
                                     <option value="<?php echo $q3['kd_instansi']; ?>" <?php if($q3['kd_instansi']==$q['kd_instansi']) echo "Selected" ?>><?php echo $q3['nm_instansi']; ?></option>
                                   <?php } ?>
                                   </select>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Periode</label>
                                   <input type="text" name="periode" class="form-control" maxlength="100" value="<?php echo $q['periode']; ?>">
                                   <span> <i>* exp : 2018/2019</i></span>
                                      </div>
                                     
                                </div>
                            </div>
                          <br>

                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Tanggal Mulai PKL</label>
                                   <input type="text" name="tglm" class="form-control" maxlength="100" id="datepicker3" value="<?php echo $q['tgl_mulai_pkl']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Tanggal Akhir PKL</label>
                                   <input type="text" name="tgls" class="form-control" maxlength="100" value="<?php echo $q['tgl_akhir_pkl']; ?>" id="datepicker4">
                                      </div>
                                     
                                </div>
                            </div>
                           <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                    <a href="index.php?p=list-penempatan" class="btn btn-info"><i class="fa fa-table"></i> Data Penempatan</a>
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