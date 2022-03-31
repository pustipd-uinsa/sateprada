
    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Mahasiswa
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">Mahasiswa</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Edit Mahasiswa</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                            include '../koneksi/koneksi.php';

                            $id=$_GET['id'];

                            if(isset($_POST['b1'])){

                            if(empty($_POST['nim']) or empty($_POST['nama'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';
                              }else{

                             if($_FILES['ft']['name']==""){

                                  $nmf=$_POST['ft_lama'];

                              }else{

                                  $tmpf=$_FILES['ft']['tmp_name'];
                                  $nmf=$_FILES['ft']['name'];
                             
                                  move_uploaded_file($tmpf,"../images/user/".$nmf);
                                }

                              $tgl=$_POST['tahun']."-".$_POST['bulan']."-".$_POST['tanggal'];

                              if($_POST['password'] != $_POST['password_lama']){
                                $pass=md5($_POST['password']);
                              }else{
                                $pass=$_POST['password_lama'];
                              }
                              

                              $sql=mysqli_query($koneksi,"UPDATE tb_mhs SET nim='$_POST[nim]',nama='$_POST[nama]',prodi='$_POST[prodi]',jekel='$_POST[jekel]',agama='$_POST[agama]',alamat='$_POST[alamat]',telp='$_POST[telp]',email='$_POST[email]',tgl_lahir='$tgl',nip_pembimbing='$_POST[dosen]',username='$_POST[username]',password='$pass',foto='$nmf',periode='$_POST[periode]'  WHERE nim='$id'");
                                
                            //   if($sql){
                            //       echo "sukses";die;
                            //      } else{
                            //       echo "gagal";die;
                            //      }

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
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_mhs where nim='$id'"));
                      ?>

                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>NIM</label>
                                   <input type="text" name="nim" class="form-control" maxlength="100" value="<?php echo $q['nim']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nama</label>
                                   <input type="text" name="nama" class="form-control" maxlength="100" value="<?php echo $q['nama']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Prodi</label>
                                   <select name="prodi" class="form-control">
                                     <option value="">-Prodi-</option>
                                     <?php 
                                      $q_prodi = mysqli_query($koneksi,"SELECT * FROM tb_nmprodi");
                                      while($d_prodi = mysqli_fetch_array($q_prodi)) {

                                      
                                     ?>
                                     <option <?php if ($d_prodi['id'] == $q['prodi'] ) {echo "selected";} else{}  ?> value="<?php echo $d_prodi['id'] ?>"><?php echo $d_prodi['prodi'] ?></option>

                                   <?php } ?>
                                   </select>
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
                                <label>Agama</label>
                                   <select name="agama" class="form-control">
                                     <option value="">-Agama-</option>
                                     <option value="Islam" <?php if($q['agama']=="Islam") echo "Selected" ?>>Islam</option>
                                     <option value="Kristen" <?php if($q['agama']=="Kristen") echo "Selected" ?>>Kristen</option>
                                     <option value="Katolik" <?php if($q['agama']=="Katolik") echo "Selected" ?>>Katolik</option>
                                     <option value="Hindu" <?php if($q['agama']=="Hindu") echo "Selected" ?>>Hindu</option>
                                   </select>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12">
                                <label>Tanggal Lahir</label>
                                <div class="row">
                                    <?php
                                            
      echo "<div class='col-md-4'><select name=tanggal class='form-control'> 
      <option value=''>-Pilih Tanggal-</option>";
      for ($no=1;$no<=31;$no++)
      {
      ?>
      <option value="<?php echo $no; ?>" <?php if(date('d',strtotime($q['tgl_lahir']))==$no) echo "selected"; else echo ""; ?>><?php echo $no; ?></option>

      <?php } ?>
      </select></div>

      <?php
      $nm_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" );

      echo "<div class='col-md-4'><select name=bulan class='form-control'>
      <option value=''>-Pilih Bulan-</option>";
      for ($bln=1; $bln<=12; $bln++)
      {
      ?>
      <option value="<?php echo $bln; ?>"<?php if(date('m',strtotime($q['tgl_lahir']))==$bln) echo "selected"; else echo ""; ?>><?php echo $nm_bulan[$bln]; ?></option> ";
      <?php } ?>
      </select></div>

      <?php
      $thn_skrg=date('Y');
      echo "<div class='col-md-4'><select name=tahun class='form-control'>
      <option value='' selected>-Pilih Tahun-</option>";
      for ($thn=1950;$thn<=$thn_skrg;$thn++)
      {
      ?>
      <option value="<?php echo $thn; ?>" <?php if(date('Y',strtotime($q['tgl_lahir']))==$thn) echo "selected"; else echo ""; ?>><?php echo $thn; ?></option>
      <?php } ?>
                </select></div>
              </div>
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
                                <label>Dosen Pembimbing</label>
                                   <select name="dosen" class="form-control">
                                     <option value="">-Pilih-</option>
                                      <?php
                       include './../koneksi/koneksi.php'; 
                    $sql2=mysqli_query($koneksi,"SELECT * FROM tb_dosen");
                      while($q1=mysqli_fetch_array($sql2)){ ?>
                                     <option value="<?php echo $q1['nip']; ?>" <?php if($q['nip_pembimbing']==$q1['nip']) echo "Selected" ?>><?php echo $q1['nm_dosen']; ?></option>
                                   <?php } ?>
                                   </select>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                               <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Periode PLP/PMPI/PPL</label>
                                   <input type="text" name="periode" class="form-control" maxlength="100" value="<?php echo $q['periode']; ?>">
                                   <span> <i>* exp : 2018/2019</i></span>
                                      </div>
                                     
                                </div>
                            </div>
                          <br>
                           <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Foto</label><br>
                                <img src="./../images/user/<?php echo $q['foto']; ?>" style="width: 100px; height: 100px;" class="img-thumbnail">
                                <input type="hidden" name="ft_lama" class="form-control" maxlength="100" value="<?php echo $q['foto']; ?>">
                                   <input type="file" name="ft" class="form-control" maxlength="100" value="">
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
                                    <a href="index.php?p=list-mahasiswa" class="btn btn-info"><i class="fa fa-table"></i> Data Mahasiswa</a>
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