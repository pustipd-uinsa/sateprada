<div class="content-wrapper">
 <section class="content-header">
          <h1>
            Dashboard
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->


          <div class="row">
             <?php if($lev=="Prodi"){ ?> 
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                    <?php
                    include "../koneksi/koneksi.php"; 
                    date_default_timezone_set("Asia/Jakarta");

                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_mhs");
                    $q=mysqli_num_rows($sql);
                    ?>
                  <h3><?php echo $q; ?></h3>
                  <p>Mahasiswa</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="index.php?p=list-mahasiswa" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                    <?php

                    $sql2=mysqli_query($koneksi,"SELECT * FROM tb_dosen");
                    $q2=mysqli_num_rows($sql2);
                    ?>
                  <h3><?php echo $q2; ?></h3>
                  <p>Dosen</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <a href="index.php?p=list-dosen" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <?php

                    $sql3=mysqli_query($koneksi,"SELECT * FROM tb_instansi");
                    $q3=mysqli_num_rows($sql3);
                    ?>
                  <h3><?php echo $q3; ?></h3>
                  <p>Instansi</p>
                </div>
                <div class="icon">
                  <i class="fa fa-building-o"></i>
                </div>
                <a href="index.php?p=list-instansi" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <?php
                   
                    $sql4=mysqli_query($koneksi,"SELECT * FROM tb_penempatan");
                    $q4=mysqli_num_rows($sql4);
                    ?>
                  <h3><?php echo $q4; ?></h3>
                  <p>Penempatan PKL</p>
                </div>
                <div class="icon">
                  <i class="fa fa-map-marker"></i>
                </div>
                <a href="index.php?p=list-penempatan" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          <?php }elseif($lev=="Instansi"){ ?>
          <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                   
                  <h3>Mahasiswa</h3>
                  <p>PKL</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="index.php?p=list-mahasiswa-pkl-diproses" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
                     
             <?php }elseif($lev=="Dosen"){ ?> 
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                    <?php
                    include "../koneksi/koneksi.php"; 
                    date_default_timezone_set("Asia/Jakarta");

                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_mhs where nip_pembimbing='$id'");
                    $q=mysqli_num_rows($sql);
                    ?>
                  <h3><?php echo $q; ?></h3>
                  <p>Mahasiswa Bimbingan</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="index.php?p=list-mahasiswa-bimbingan" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
          <?php }else{ ?>
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">

                  <h3>Menu</h3>
                  <p>Biodata</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="index.php?p=edit-mahasiswa2&id=<?php echo $id; ?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">

                  <h3>Menu</h3>
                  <p>Dosen Pembimbing</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <a href="index.php?p=list-dosen-single2&id=<?php echo $id; ?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                 
                  <h3>Menu</h3>
                  <p>Penempatan PKL</p>
                </div>
                <div class="icon">
                  <i class="fa fa-building-o"></i>
                </div>
                <a href="index.php?p=list-penempatan2&id=<?php echo $id; ?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          <?php } ?>
          </div><!-- /.row -->


        </section><!-- /.content -->
      </div>
