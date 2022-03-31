<?php $id_mhs = $_SESSION['id'];  ?> 
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Masukan Judul Laporan PLP/PMPI/PPL
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">Judul</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Judul Laporan PLP/PMPI/PPL</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include '../koneksi/koneksi.php';

                            $id=$_GET['id'];

                            // if(isset($_POST['b1'])){ 

                            // if(empty($_POST['jd'])){

                            // echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                            //       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            //       <span aria-hidden="true">×</span></button>
                            //       <strong>Error!</strong> Data tidak boleh ada yang kosong.
                            //       </div>';
                            //   }else{

                              

                            //   $sql=mysqli_query($koneksi,"UPDATE tb_mhs SET jd_lap_pkl='$_POST[jd]' WHERE nim='$id'");
                                

                            //      echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                            //       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            //       <span aria-hidden="true">×</span></button>
                            //       <strong>Sukses!</strong> Data berhasil diedit.
                            //       </div>';
                            // }
                            // }
                            if(isset($_POST['b1'])){
                            $query = mysqli_query($koneksi,"SELECT * FROM tb_mhs where nim='$id' and file_lap != ''");
                            if (mysqli_num_rows($query)> 0){
                              echo "Anda suda upload";
                            }else {

                            
                            if(!empty($_POST['jd'])){
                              $ekstensi_diperbolehkan = array('pdf','docx','doc');
                              $nama = $_FILES['file']['name'];
                              $x = explode('.', $nama);
                              $ekstensi = strtolower(end($x));
                              $ukuran = $_FILES['file']['size'];
                              $file_tmp = $_FILES['file']['tmp_name']; 

                              if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                                if($ukuran < 10000000000000){      
                                if ( move_uploaded_file($file_tmp, '../file/'.$nama)){
                                  $sql=mysqli_query($koneksi,"UPDATE tb_mhs SET jd_lap_pkl='$_POST[jd]', file_lap='".$nama."' WHERE nim='$id'");
                                  if($sql){
                                    echo 'FILE BERHASIL DI UPLOAD';
                                  }else{
                                    echo 'GAGAL MENGUPLOAD FILE';
                                  }
                                }else{
                                  echo "gagal upload";
                                }
                                  // $query = mysql_query("SELECT * FROM tb_laporan VALUES('',$_POST[nim],'$tgl',$_POST[nama_laporan] '$nama')");
                                  
                                }else{
                                  echo 'UKURAN FILE TERLALU BESAR';
                                }
                              }else{
                                echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
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
                          ?>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Perhatian :</label>
                                <br>
                                    <span><i>* Isikan Judul yang sudah di acc sama Pembimbing, karena pengimputan hanya boleh satu kali (file.pdf, maks.10mb)</i></span>
                                      </div>
                                </div>
                            </div>
                          <br>
                            <div class="row">
                                <div class="form-group">
                                  <div class="col-lg-12 ">
                                    <label>NIM Mahasiswa</label>
                                      <input class="form-control" name="nim" type="text" placeholder="NIM Mahasiswa" readonly value="<?php echo $d_mhs['nim'] ?>"> 
                                  </div>
                                </div>
                            </div>
                            <br>
                          <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Judul Laporan</label>
                                 <textarea name="jd" class="form-control"></textarea>
                                </div>
                                </div>
                            </div>
                            <br>
                              <input class="form-control" type="file" name="file"/>
                            <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                   
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
