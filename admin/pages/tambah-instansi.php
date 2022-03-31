<div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Instansi
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">Instansi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Instansi</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include '../koneksi/koneksi.php';

                              $auto=rand(111111,999999);
                              $kode="INS".$auto;

                            if(isset($_POST['b1'])){

                            if(empty($_POST['telp']) or empty($_POST['nama'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                               $tmpf=$_FILES['ft']['tmp_name'];
                              $nmf=$_FILES['ft']['name'];
                              move_uploaded_file($tmpf,"../images/user/".$nmf);

                              $pass=md5($_POST['password']);

                                $sql=mysqli_query($koneksi,"INSERT INTO tb_instansi values ('$_POST[kd]','$_POST[nama]','$_POST[telp]','$_POST[fax]','$_POST[email]','$_POST[alamat]','$_POST[web]','$nmf','$_POST[username]','$pass')");

                                $q_prodi = mysqli_query($koneksi,"SELECT * FROM tb_nmprodi");
                                while($d_prodi = mysqli_fetch_array($q_prodi)) {
                                  $id = $d_prodi['id'];
                                  //$kode;
                                  $id_prodi = $_POST['id_prodi_'.$id];
                                  if ($_POST['kuota_'.$id] != ""){
                                    $kuota = $_POST['kuota_'.$id];
                                  } else {
                                    $kuota = 0;
                                  }
                                  $temp = $_POST['kd_instansi_'.$id];
                                  $sql_kuota = mysqli_query($koneksi,"INSERT INTO tb_kuota values('','$temp',$id_prodi,$kuota)");
                                }
                                


                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil ditambah.
                                  </div>';
                            }
                            }
                            ?>
              <div class="col-lg-6">

                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                    
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>KD Instansi</label>
                                   <input type="text" name="kd" class="form-control" maxlength="100" value="<?php echo $kode; ?>" readonly>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nama Instansi</label>
                                   <input type="text" name="nama" class="form-control" maxlength="100" value="">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nomor Telepon</label>
                                   <input type="text" name="telp" class="form-control" maxlength="100" value="">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Email</label>
                                   <input type="email" name="email" class="form-control" maxlength="100" value="">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Alamat</label>
                                 <textarea name="alamat" class="form-control"></textarea>
                                   
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                          <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Alamat Website</label>
                                 <textarea name="web" class="form-control"></textarea>
                                   
                                      </div>
                                     
                                </div>
                            </div>
                                <br>
                                 <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Fax</label>
                                   <input type="text" name="fax" class="form-control" maxlength="100" value="">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                          <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Foto</label>
                                  <input type="file" name="ft" class="form-control" maxlength="100" value="" placeholder="Foto">
                                   
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="form-group">
                                <div class="col-lg-12 ">
                                  <label>Daftar Peserta Per-Prodi</label>
                                  <div class="form-group row">
                                    <?php 
                                        $q_prodi = mysqli_query($koneksi,"SELECT * FROM tb_nmprodi");
                                        while($d_prodi = mysqli_fetch_array($q_prodi)) {
                                       ?>
                                       <div style="margin-bottom: 10px">
                                       <label for="text" class="col-sm-4 col-form-label"><?php echo $d_prodi['prodi'] ?>: </label>
                                        <!-- <div class="col-sm-8"> -->
                                        <div class="col-lg-12 ">
                                          <input type="number" name="kuota_<?php echo $d_prodi['id'] ?>" class="form-control" id="form-controls" value="0">
                                          <input type="hidden" name="id_prodi_<?php echo $d_prodi['id'] ?>" value="<?php echo $d_prodi['id'] ?>">
                                          <input type="hidden" name="kd_instansi_<?php echo $d_prodi['id'] ?>" value="<?php echo $kode; ?>">
                                        </div>
                                      </div>

                                     <?php } ?>
                                    
                                  </div>

                                </div>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Username</label>
                                   <input type="text" name="username" class="form-control" maxlength="100" value="">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Password</label>
                                   <input type="password" name="password" class="form-control" maxlength="100" value="">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                    <a href="index.php?p=list-instansi" class="btn btn-info"><i class="fa fa-table"></i> Data Instansi</a>
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
