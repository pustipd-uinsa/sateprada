
    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Proses Mahasiswa PKL
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">Proses</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Proses Mahasiswa PKL</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                            include '../koneksi/koneksi.php';

                            $id=$_GET['id'];

                            if(isset($_POST['b1'])){

                            if(empty($_POST['status'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';
                              }else{

                              $sql=mysqli_query($koneksi,"UPDATE tb_penempatan SET status='$_POST[status]',ket='$_POST[ket]',posisi='$_POST[pss]' WHERE kd_penempatan='$id'");

                              if($_POST['status']=="Diterima"){

                                $sql=mysqli_query($koneksi,"INSERT INTO tb_nilai_instansi VALUES ('','$_POST[nim]','','','','','','','','','','','$_POST[kdins]','','','','Belum')");

                              }
                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil diproses.
                                  </div>';

                                   echo "<meta http-equiv=refresh content=1;url=index.php?p=list-mahasiswa-pkl>";
                            }
                            }
                            ?>
              <div class="col-lg-6">

                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                      <?php 
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT tb_mhs.nama,tb_mhs.nim,tb_penempatan.* FROM tb_penempatan,tb_mhs where tb_mhs.nim=tb_penempatan.nim and tb_penempatan.kd_penempatan='$id'"));
                      ?>

                            
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nama Mahasiswa</label>
                                <input type="hidden" name="kdins" class="form-control" maxlength="100" value="<?php echo $q['kd_instansi']; ?>">
                                <input type="hidden" name="nim" class="form-control" maxlength="100" value="<?php echo $q['nim']; ?>">
                                   <input type="text" name="nama" class="form-control" maxlength="100" value="<?php echo $q['nama']; ?>" readonly>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Status</label>
                                   <select name="status" class="form-control">
                                     <option value="Pending">Pending</option>
                                     <option value="Diterima">Diterima</option>
                                     <option value="Ditolak">Ditolak</option>
                                   </select>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                              <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Posisi Penempatan</label>
                                  <input type="text" name="pss" class="form-control">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Keterangan</label>
                                  <textarea name="ket" class="form-control"><?php echo $q['ket']; ?></textarea>
                                    <span><i>* Diisi sebagai catatan untuk stmik indonesia seperti alasan penolakan ditulis disini.</i></span>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                    <a href="index.php?p=list-mahasiswa-pkl" class="btn btn-info"><i class="fa fa-table"></i> Data Mahasiswa PKL</a>
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