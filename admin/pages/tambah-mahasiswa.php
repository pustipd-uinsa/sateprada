<div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Mahasiswa
            
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
                  <h3 class="box-title">Form Mahasiswa</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include '../koneksi/koneksi.php';

                            if(isset($_POST['b1'])){

                              //  $auto=rand(11111,99999);
                              // $_POST['kd']="KS".$auto;
                              
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

                              $tgl=$_POST['tahun']."-".$_POST['bulan']."-".$_POST['tanggal'];
                              $pass=md5($_POST['password']);

                                $sql=mysqli_query($koneksi,"INSERT INTO tb_mhs values ('$_POST[nim]','$_POST[nama]','$_POST[prodi]','$_POST[jekel]','$_POST[agama]','$_POST[alamat]','$_POST[telp]','$_POST[email]','$tgl','$_POST[dosen]','','','$_POST[username]','$pass','$nmf','$_POST[periode]','$_POST[stts_hps]')");

                              // echo "INSERT INTO tb_mhs values ('$_POST[nim]','$_POST[nama]','$_POST[prodi]','$_POST[jekel]','$_POST[agama]','$_POST[alamat]','$_POST[telp]','$_POST[email]','$tgl','$_POST[dosen]','','$_POST[username]','$pass','$nmf','$_POST[periode]')"; die;

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
                            }
                            }
                            ?>
              <div class="col-lg-6">

                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                    
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>NIM</label>
                                   <input type="text" name="nim" class="form-control" maxlength="100" value="">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nama</label>
                                   <input type="text" name="nama" class="form-control" maxlength="100" value="">
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
                                     <option value="<?php echo $d_prodi['id'] ?>"><?php echo $d_prodi['prodi'] ?></option>

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
                                          <input type="radio" name="jekel" id="inlineRadio1" value="Laki-laki"> Laki-laki
                                        </label>
                                        <label class="radio-inline">
                                          <input type="radio" name="jekel" id="inlineRadio2" value="Perempuan"> Perempuan
                                        </label>
                                     
                                </div>
                            </div>
                          </div>
                            
                            <!-- <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Agama</label>
                                   <select name="agama" class="form-control">
                                     <option value="">-Agama-</option>
                                     <option value="Islam">Islam</option>
                                     <option value="Kristen">Kristen</option>
                                     <option value="Katolik">Katolik</option>
                                     <option value="Hindu">Hindu</option>
                                   </select>
                                      </div>
                                     
                                </div>
                            </div>
                            <br> -->
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <!-- <label>Agama</label> -->
                                   <input type="hidden" name="agama" class="form-control" maxlength="100" value="Islam">
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
                  <option value="<?php echo $no; ?>"><?php echo $no; ?></option>

                  <?php } ?>
                  </select></div>

                  <?php
                  $nm_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

                  echo "<div class='col-md-4'><select name=bulan class='form-control'>
                  <option value=''>-Pilih Bulan-</option>";
                  for ($bln=1; $bln<=12; $bln++)
                  {
                  ?>
                  <option value="<?php echo $bln; ?>"><?php echo $nm_bulan[$bln]; ?></option>
                  <?php } ?>
                  </select></div>

                  <?php
                  $thn_skrg=date('Y');
                  echo "<div class='col-md-4'><select name=tahun class='form-control'>
                  <option value=''>-Pilih Tahun-</option>";
                  for ($thn=1950;$thn<=$thn_skrg;$thn++)
                  {
                  ?>
                  <option value="<?php echo $thn; ?>"><?php echo $thn; ?></option>
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
                                <label>Dosen Pembimbing</label>
                                   <select name="dosen" class="form-control">
                                     <option value="">-Pilih-</option>
                                      <?php
                                          include './../koneksi/koneksi.php'; 
                                        $sql=mysqli_query($koneksi,"SELECT * FROM tb_dosen");
                                         while($q=mysqli_fetch_array($sql)){ ?>
                                     <option value="<?php echo $q['nip']; ?>"><?php echo $q['nm_dosen']; ?></option>
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
                                   <input type="text" name="periode" class="form-control" maxlength="100" value="">
                                   <span> <i>* exp : 2018/2019</i></span>
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
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <!-- <label>Status Hapus</label> -->
                                   <input type="hidden" name="stts_hps" class="form-control" maxlength="100" value="0">
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
