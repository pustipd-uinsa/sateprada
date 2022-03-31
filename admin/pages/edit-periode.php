
    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Peroiode Penilaian
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Edit Periode Penilaian</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Edit Periode Penilaian</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                            include '../koneksi/koneksi.php';

                            $id=$_GET['id'];

                            if(isset($_POST['b1'])){

                            if(empty($_POST['tglm']) or empty($_POST['tgls'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                                $tglm=date('Y-m-d h:i:s',strtotime($_POST['tglm']));
                                $tgls=date('Y-m-d h:i:s',strtotime($_POST['tgls']));
                                $sql=mysqli_query($koneksi,"UPDATE tb_periode_penilaian SET tgl_mulai='$tglm',batas_periode='$tgls' WHERE kd_periode='$id'");
                                

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
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_periode_penilaian where kd_periode='$id'"));
                      ?>
                           <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Batas Untuk</label>
                                   <input type="text" name="btsu" class="form-control" maxlength="100" value="<?php echo $q['untuk']; ?>" readonly>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Tanggal Mulai Penilaian</label>
                                   <input type="text" name="tglm" class="form-control" maxlength="100" id="datepicker1" value="<?php echo $q['tgl_mulai']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Batas Akhir Penilaian</label>
                                   <input type="text" name="tgls" class="form-control" maxlength="100" value="<?php echo $q['batas_periode']; ?>" id="datepicker2">
                                      </div>
                                     
                                </div>
                            </div>
                           <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-success"><i class="fa fa-save"></i> Edit</button>
                                    <a href="index.php?p=list-periode" class="btn btn-info"><i class="fa fa-table"></i> List Periode</a>
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