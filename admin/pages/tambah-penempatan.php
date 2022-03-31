<div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Penempatan
            
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
                  <h3 class="box-title">Form Penempatan</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include '../koneksi/koneksi.php';


                            if(isset($_POST['b1'])){

                            if(empty($_POST['mhs']) or empty($_POST['instansi'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{
                                
                                $select_prodi2 = mysqli_query($koneksi,"SELECT prodi from tb_mhs where nim = '$_POST[mhs]'");
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
                                    $sql=mysqli_query($koneksi,"INSERT INTO tb_penempatan values ('','$_POST[mhs]','$_POST[instansi]','','Pending','$_POST[periode]','$_POST[tglm]','$_POST[tgls]','')");
                                

                                     echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">×</span></button>
                                      <strong>Sukses!</strong> Data berhasil ditambah.
                                      </div>';
                                    
                                } else {
                                    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">×</span></button>
                                      <strong>Gagal!</strong> Tidak bisa mengisi karena data penuh.
                                      </div>';
                                }

                                
                            }
                            }
                            ?>
              <div class="col-lg-6">

                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                    
                           <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nama Mahasiswa</label>
                                   <select name="mhs" id="penempatan_mhs" class="form-control select2ku">
                                     <option value="pilih">-Pilih-</option>
                                      <?php
                                          include './../koneksi/koneksi.php'; 
                                        $sql=mysqli_query($koneksi,"SELECT * FROM tb_mhs");
                                          while($q=mysqli_fetch_array($sql)){ ?>
                                     <option value="<?php echo $q['nim']; ?>"><?php echo $q['nama']; ?></option>
                                   <?php } ?>
                                   </select>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div id="change_view">
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Prodi</label>
                                   <input type="text" class="form-control" name="prodi" id="penempatan_prodi" value="" readonly="" placeholder="Pilih Mahasiswa">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Penempatan / Nama Instansi</label>
                                     <select name="instansi" class="form-control select2ku">
                                     <option value="">-Pilih-</option>
                                      <?php
                                          include './../koneksi/koneksi.php'; 
                                        $sql=mysqli_query($koneksi,"SELECT * FROM tb_instansi");
                                          while($q=mysqli_fetch_array($sql)){ 
                                            
                                            ?>
                                     <option value="<?php echo $q['kd_instansi']; ?>"><?php echo $q['nm_instansi']; ?></option>
                                   <?php } ?>
                                   </select>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                          </div>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Periode</label>
                                   <input type="text" name="periode" class="form-control" maxlength="100" value="">
                                   <span> <i>* exp : 2018/2019</i></span>
                                      </div>
                                     
                                </div>
                            </div>
                          <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Tanggal Mulai PLP/PMPI/PPL</label>
                                   <input type="text" name="tglm" class="form-control" maxlength="100" id="datepicker3" value="">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Tanggal Akhir PLP/PMPI/PPL</label>
                                   <input type="text" name="tgls" class="form-control" maxlength="100" value="" id="datepicker4">
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
