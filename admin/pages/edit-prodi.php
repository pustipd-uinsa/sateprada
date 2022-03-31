

    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Prodi
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">Prodi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Edit Prodi</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                           include '../koneksi/koneksi.php';

                           $id=$_GET['id'];

                            if(isset($_POST['b1'])){

                            if(empty($_POST['prodi']) or empty($_POST['kaprodi'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';
                              }else{

                              $sql=mysqli_query($koneksi,"UPDATE tb_nmprodi SET prodi='$_POST[prodi]',kaprodi='$_POST[kaprodi]',nip_kaprodi='$_POST[nip_kaprodi]',username='$_POST[username]',password='$_POST[password]' WHERE id='$id'");
                                
                                // if($sql){
                                //   echo "sukses";die;
                                // } else{
                                //   echo "gagal";die;
                                // }

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil diedit.
                                  </div>';
                            }
                            }
                            ?>
              <div class="col-lg-6">

                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                      <?php 
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_nmprodi where id='$id'"));
                      ?> 

                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Prodi</label>
                                   <input type="text" name="prodi" class="form-control" maxlength="100" value="<?php echo $q['prodi'] ?>">
                                   
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Kaprodi</label>
                                   <input type="text" name="kaprodi" class="form-control" maxlength="100" value="<?php echo $q['kaprodi'] ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>NIP Kaprodi</label>
                                   <input type="text" name="nip_kaprodi" class="form-control" maxlength="100" value="<?php echo $q['nip_kaprodi'] ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Username</label>
                                   <input type="text" name="username" class="form-control" maxlength="100" value="<?php echo $q['username']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Password</label>
                                   <input type="password" name="password" class="form-control" maxlength="100" value="<?php echo $q['password']; ?>">
                                    <input type="hidden" name="password_lama" class="form-control" maxlength="100" value="<?php echo $q['password']; ?>">
                                    <span><i>* Untuk mengganti Password silahkan hapus password lama isi dengan password baru</i></span>
                                      </div>
                                     
                                </div>
                            </div>
                            
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                    <a href="index.php?p=list-prodi" class="btn btn-info"><i class="fa fa-table"></i> Data Prodi</a>
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