    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Dosen
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">Dosen</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Edit Dosen</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                            include '../koneksi/koneksi.php';

                            $id=$_GET['id'];

                            if(isset($_POST['b1'])){

                            if(empty($_POST['telp']) or empty($_POST['nama'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';
                              }else{

                              if($_POST['password'] != $_POST['password_lama']){
                                $pass=md5($_POST['password']);
                              }else{
                                $pass=$_POST['password_lama'];
                              }
                              

                              $sql=mysqli_query($koneksi,"UPDATE tb_dosen SET nm_dosen='$_POST[nama]',jekel='$_POST[jekel]',alamat='$_POST[alamat]',telp='$_POST[telp]',email='$_POST[email]',username='$_POST[username]',password='$pass' WHERE nip='$id'");
                                

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
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_dosen where nip='$id'"));
                      ?>

                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>NIP</label>
                                   <input type="text" name="nim" class="form-control" maxlength="100" value="<?php echo $q['nip']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nama</label>
                                   <input type="text" name="nama" class="form-control" maxlength="100" value="<?php echo $q['nm_dosen']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Jenis Kelamin</label>
                                <br>
                                 <label class="radio-inline">
                                          <input type="radio" name="jekel" id="inlineRadio1" value="Laki-laki" <?php if($q['jekel']=="Laki-laki") echo "Checked" ?>> Laki-laki
                                        </label>
                                        <label class="radio-inline">
                                          <input type="radio" name="jekel" id="inlineRadio2" value="Perempuan" <?php if($q['jekel']=="Perempuan") echo "Checked" ?>> Perempuan
                                        </label>
                                     
                                </div>
                            </div>
                          </div>
                       
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nomor Telepon</label>
                                   <input type="text" name="telp" class="form-control" maxlength="100" value="<?php echo $q['telp']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Email</label>
                                   <input type="email" name="email" class="form-control" maxlength="100" value="<?php echo $q['email']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Alamat</label>
                                 <textarea name="alamat" class="form-control"><?php echo $q['alamat']; ?></textarea>
                                   
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
                            <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                    <a href="index.php?p=list-dosen" class="btn btn-info"><i class="fa fa-table"></i> Data Dosen</a>
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