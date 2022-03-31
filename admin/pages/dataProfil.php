<div class="content-wrapper">
 <section class="content-header">
          <h1>
            Profil Admin
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Profil</li>
          </ol>
        </section>
        <?php if($lev=="Prodi"){ ?>
    <section class="content">
          <?php 
                         include '../koneksi/koneksi.php';

                           

                            if(isset($_POST['b1'])){

                            if(empty($_POST['id']) or empty($_POST['nm'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{


                                if($_POST['pas_lama']==$_POST['pas']){
                                  $pass=$_POST['pas'];
                                }else{
                                  $pass=md5($_POST['pas']);
                                }
                              
                                $sql=mysqli_query($koneksi,"UPDATE tb_adm_prodi SET nama='$_POST[nm]',jekel='$_POST[jekel]',email='$_POST[email]',alamat='$_POST[alamat]',username='$_POST[user]',password='$pass' WHERE kd_prodi='$_POST[id]'");

                                
                            

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil diedit.
                                  </div>';
                            }
                            }
                            ?>

      <div class="row">
     
        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
               
                             <?php 
                       
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_adm_prodi where kd_prodi='$_SESSION[id]'"));
                      ?>
              <img class="profile-user-img img-responsive img-circle" src="../images/user/default.png" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $q['nama']; ?></h3>

              <p class="text-muted text-center"></p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Biodata</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
             
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama</label>

                    <div class="col-sm-10">
                       <input type="hidden" class="form-control" name="id" id="inputName" value="<?php echo $q['kd_prodi']; ?>" placeholder="kd">
                      <input type="text" class="form-control" name="nm" id="inputName" value="<?php echo $q['nama']; ?>" placeholder="Name">
                     
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Jenis Kelamin</label>

                    <div class="col-sm-10">
                      
                      <input type="text" class="form-control" name="jekel" id="inputName" value="<?php echo $q['jekel']; ?>" placeholder="jekel">
                     
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                     
                      <input type="text" class="form-control" name="email" id="inputName" value="<?php echo $q['email']; ?>" placeholder="Name">
                     
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">ALamat</label>

                    <div class="col-sm-10">
                     
                      <textarea class="form-control" name="alamat"><?php echo $q['alamat']; ?></textarea>
                     
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" name="user" value="<?php echo $q['username']; ?>" placeholder="Username">
                    
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputSkills" name="pas" value="<?php echo $q['password']; ?>" placeholder="Password">
                      <input type="hidden" class="form-control" id="inputSkills" name="pas_lama" value="<?php echo $q['password']; ?>" placeholder="Password">
                      <span><i>* Untuk mengganti password hapus password lama dan masukan password baru.</i></span>
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="b1" class="btn btn-info">Update</button>
                    </div>
                  </div>
                
              </div>
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </form>
      </div>
    </section>
  <?php }elseif($lev=="Instansi"){ ?>
  <section class="content">
          <?php 
                         include '../koneksi/koneksi.php';

                           

                            if(isset($_POST['b1'])){

                            if(empty($_POST['id']) or empty($_POST['nm'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{


                                if($_POST['pas_lama']==$_POST['pas']){
                                  $pass=$_POST['pas'];
                                }else{
                                  $pass=md5($_POST['pas']);
                                }
                              
                                $sql=mysqli_query($koneksi,"UPDATE tb_instansi SET nm_instansi='$_POST[nm]',telp='$_POST[telp]',fax='$_POST[fax]',email='$_POST[email]',alamat='$_POST[alamat]',web='$_POST[web]',username='$_POST[user]',password='$pass' WHERE kd_instansi='$_POST[id]'");

                                
                            

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil diedit.
                                  </div>';
                            }
                            }
                            ?>

      <div class="row">
     
        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
               
                             <?php 
                       
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_instansi where kd_instansi='$_SESSION[id]'"));
                      ?>
              <img class="profile-user-img img-responsive img-circle" src="../images/user/<?php echo $q['logo']; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $q['nm_instansi']; ?></h3>

              <p class="text-muted text-center"></p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Biodata</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
             
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama Instansi</label>

                    <div class="col-sm-10">
                       <input type="hidden" class="form-control" name="id" id="inputName" value="<?php echo $q['kd_instansi']; ?>" placeholder="kd">
                      <input type="text" class="form-control" name="nm" id="inputName" value="<?php echo $q['nm_instansi']; ?>" placeholder="Name">
                     
                    </div>
                  </div>
                 <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Telepon</label>

                    <div class="col-sm-10">
                     
                      <input type="text" class="form-control" name="telp" id="inputName" value="<?php echo $q['telp']; ?>" placeholder="Name">
                     
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Fax</label>

                    <div class="col-sm-10">
                     
                      <input type="text" class="form-control" name="fax" id="inputName" value="<?php echo $q['fax']; ?>" placeholder="Fax">
                     
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                     
                      <input type="text" class="form-control" name="email" id="inputName" value="<?php echo $q['email']; ?>" placeholder="Name">
                     
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="alamat"><?php echo $q['alamat']; ?></textarea>
                     
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Alamat Web</label>

                    <div class="col-sm-10">
                     
                      <textarea class="form-control" name="web"><?php echo $q['web']; ?></textarea>
                     
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" name="user" value="<?php echo $q['username']; ?>" placeholder="Username">
                    
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputSkills" name="pas" value="<?php echo $q['password']; ?>" placeholder="Password">
                      <input type="hidden" class="form-control" id="inputSkills" name="pas_lama" value="<?php echo $q['password']; ?>" placeholder="Password">
                      <span><i>* Untuk mengganti password hapus password lama dan masukan password baru.</i></span>
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="b1" class="btn btn-info">Update</button>
                    </div>
                  </div>
                
              </div>
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </form>
      </div>
    </section>
  <?php }elseif($lev=="Dosen"){ ?>
  <section class="content">
          <?php 
                         include '../koneksi/koneksi.php';

                           

                            if(isset($_POST['b1'])){

                            if(empty($_POST['id']) or empty($_POST['nm'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{


                                if($_POST['pas_lama']==$_POST['pas']){
                                  $pass=$_POST['pas'];
                                }else{
                                  $pass=md5($_POST['pas']);
                                }
                              
                                $sql=mysqli_query($koneksi,"UPDATE tb_dosen SET nm_dosen='$_POST[nm]',jekel='$_POST[jekel]',telp='$_POST[telp]',email='$_POST[email]',alamat='$_POST[alamat]',username='$_POST[user]',password='$pass' WHERE nidn='$_POST[id]'");

                                
                            

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil diedit.
                                  </div>';
                            }
                            }
                            ?>

      <div class="row">
     
        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
               
                             <?php 
                       
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_dosen where nidn='$_SESSION[id]'"));
                      ?>
              <img class="profile-user-img img-responsive img-circle" src="../images/user/default.png" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $q['nm_dosen']; ?></h3>

              <p class="text-muted text-center"></p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Biodata</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
             
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama Dosen</label>

                    <div class="col-sm-10">
                       <input type="hidden" class="form-control" name="id" id="inputName" value="<?php echo $q['nidn']; ?>" placeholder="kd">
                      <input type="text" class="form-control" name="nm" id="inputName" value="<?php echo $q['nm_dosen']; ?>" placeholder="Name">
                     
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Jenis Kelamin</label>

                    <div class="col-sm-10">
                     
                      <input type="text" class="form-control" name="jekel" value="<?php echo $q['jekel']; ?>">
                     
                    </div>
                  </div>
                 <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Telepon</label>

                    <div class="col-sm-10">
                     
                      <input type="text" class="form-control" name="telp" id="inputName" value="<?php echo $q['telp']; ?>" placeholder="Name">
                     
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                     
                      <input type="text" class="form-control" name="email" id="inputName" value="<?php echo $q['email']; ?>" placeholder="Name">
                     
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">ALamat</label>

                    <div class="col-sm-10">
                     
                      <textarea class="form-control" name="alamat"><?php echo $q['alamat']; ?></textarea>
                     
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" name="user" value="<?php echo $q['username']; ?>" placeholder="Username">
                    
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputSkills" name="pas" value="<?php echo $q['password']; ?>" placeholder="Password">
                      <input type="hidden" class="form-control" id="inputSkills" name="pas_lama" value="<?php echo $q['password']; ?>" placeholder="Password">
                      <span><i>* Untuk mengganti password hapus password lama dan masukan password baru.</i></span>
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="b1" class="btn btn-info">Update</button>
                    </div>
                  </div>
                
              </div>
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </form>
      </div>
    </section>
  <?php } ?>
</div>
