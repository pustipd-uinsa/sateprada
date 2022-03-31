<?php $id_mhs = $_SESSION['id'];  ?>
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
                            $sql = mysqli_query($koneksi,"SELECT * FROM tb_penempatan where nim = '$_SESSION[id]'");

                            if (mysqli_num_rows($sql) > 0){
                              echo "<script>alert('Anda sudah memilih')</script>";
                            } else {
                              

                            if(empty($_POST['periode']) or empty($_POST['kd_instansi'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{
                                $select_prodi2 = mysqli_query($koneksi,"SELECT prodi from tb_mhs where nim = '$_SESSION[id]'");
                                $d_prodi2 = mysqli_fetch_array($select_prodi2);
                                $prodi2 = $d_prodi2['prodi'];
                                
                                $jum_pendaftar2 = mysqli_query($koneksi,"SELECT count(tb_mhs.prodi) as jum_prodi FROM `tb_penempatan` inner join tb_mhs on tb_penempatan.nim = tb_mhs.nim where tb_penempatan.kd_instansi = '$_POST[kd_instansi]' AND tb_mhs.prodi = $prodi2 AND tb_mhs.stts_hps ='0'");
                                $d_jum_pendaftar2 = mysqli_fetch_array($jum_pendaftar2);

                                $jum_kuota2 = mysqli_query($koneksi,"SELECT * FROM tb_kuota WHERE kd_instansi= '$_POST[kd_instansi]' AND id_prodi = $prodi2");
                                if (mysqli_num_rows($jum_kuota2) > 0){
                                  $d_jum_kuota = mysqli_fetch_array($jum_kuota2);
                                  $j_kuota2 = $d_jum_kuota['jum_kuota'];
                                } else{
                                  $j_kuota2 = 0;
                                }
                                
                                if ($d_jum_pendaftar2['jum_prodi'] < $j_kuota2){
                                    //echo "boleh mengisi";die;
                                    $sql=mysqli_query($koneksi,"INSERT INTO tb_penempatan values ('','$_SESSION[id]','$_POST[kd_instansi]','','Pending','$_POST[periode]','$_POST[tgl_mulai_pkl]','$_POST[tgl_akhir_pkl]','')");


                                    // if($sql){
                                    //   echo "sukses";die;
                                    // } else{
                                    //   echo "gagal";die;
                                    // }
                                    
    
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
                              
                            }

                            
                            ?>
              <div class="col-lg-6">

                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                          <?php 
                            $q_mhs = mysqli_query($koneksi, "SELECT * FROM tb_mhs where nim = '$id_mhs';");
                            $d_mhs = mysqli_fetch_array($q_mhs);

                            $id_prodi = $d_mhs['prodi'];
                            $q_prodi = mysqli_query($koneksi, "SELECT * FROM tb_nmprodi where id = '$id_prodi';");
                            $d_prodi = mysqli_fetch_array($q_prodi);

                          ?>
                           <div class="row">
                                <div class="form-group">
                                  <div class="col-lg-12 ">
                                    <label>Nama Mahasiswa</label>
                                      <input class="form-control" name="nim" type="text" placeholder="Nama Mahasiswa" readonly value="<?php echo $d_mhs['nama'] ?>"> 
                                  </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                  <div class="col-lg-12 ">
                                    <label>Prodi</label>
                                    <input class="form-control" type="text" placeholder="Prodi" readonly value="<?php echo $d_prodi['prodi'] ?>">
                                  </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Penempatan / Nama Instansi</label>
                                     <select name="kd_instansi" class="form-control select2ku">
                                     <option value="">-Pilih-</option>
                                      <?php
                                          include './../koneksi/koneksi.php'; 

                                        $sql=mysqli_query($koneksi,"SELECT * FROM tb_instansi");
                                          while($q=mysqli_fetch_array($sql)){ 
                                            $kode_ins = $q['kd_instansi'];
                                            $prodi_mhs = $d_mhs['prodi'];
                                        $jum_pendaftar = mysqli_query($koneksi,"SELECT count(tb_mhs.prodi) as jum_prodi FROM `tb_penempatan` inner join tb_mhs on tb_penempatan.nim = tb_mhs.nim where tb_penempatan.kd_instansi = '$kode_ins' AND tb_mhs.prodi = $prodi_mhs AND tb_mhs.stts_hps ='0'");

                                        $d_jum_pendaftar = mysqli_fetch_array($jum_pendaftar);

                                        $jum_kuota = mysqli_query($koneksi,"SELECT * FROM tb_kuota WHERE kd_instansi= '$kode_ins' AND id_prodi = $id_prodi");
                                        if (mysqli_num_rows($jum_kuota) > 0){
                                          $d_jum_kuota = mysqli_fetch_array($jum_kuota);
                                          $j_kuota = $d_jum_kuota['jum_kuota'];
                                        } else{
                                          $j_kuota = 0;
                                        }

                                        
                                      ?>
                                     <option value="<?php echo $q['kd_instansi']; ?>" <?php if ($d_jum_pendaftar['jum_prodi'] < $j_kuota) {} else {echo "disabled";}  ?>><?php echo $q['nm_instansi']; ?> <?php if ($d_jum_pendaftar['jum_prodi'] < $j_kuota) {} else {echo "(Penuh)";}  ?> </option>

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
                                   <input type="text" name="tgl_mulai_pkl" class="form-control" maxlength="100" id="datepicker3" value="">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Tanggal Akhir PLP/PMPI/PPL</label>
                                   <input type="text" name="tgl_akhir_pkl" class="form-control" maxlength="100" value="" id="datepicker4">
                                      </div>
                                     
                                </div>
                            </div>
                           <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                    <!-- <a href="index.php?p=list-penempatan" class="btn btn-info"><i class="fa fa-table"></i> Data Penempatan</a> -->
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
