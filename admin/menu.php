 <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../images/user/<?php echo $foto; ?>" class="img-rounded" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $nama." ".$id; ?></p>
              <a href="#"><i class="fa fa-users text-success"></i> <?php echo $lev; ?></a>
            </div>
          </div>
       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
           
            <li class="treeview" style="border-top: 1px solid #c8c8cb !important;  ">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <?php if($lev=="Mahasiswa"){  
              include './../koneksi/koneksi.php'; 
              $qa=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_mhs WHERE nim='$id'"));
              ?>
            <!-- <li class="treeview">
              <a href="index.php?p=edit-mahasiswa2&id=<?php echo $id; ?>">
                <i class="fa fa-user"></i>
                <span>Biodata</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li> -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Biodata</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?p=edit-mahasiswa2&id=<?php echo $id; ?>"><i class="fa fa-circle-o"></i> Edit Biodata </a></li>
                <li><a href="index.php?p=list-mahasiswa-mahasiswa"><i class="fa fa-circle-o"></i> Biodata </a></li>
                
              </ul>
            </li>
             <?php if(empty($qa['jd_lap_pkl'])){?> 
              <li class="treeview">
              <a href="index.php?p=form-judul-lap-pkl&id=<?php echo $id; ?>">
                <i class="fa fa-files-o"></i>
                <span>Judul Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
          <?php } ?>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-map-marker"></i>
                <span>Penempatan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="index.php?p=tambah-penempatan-mahasiswa"><i class="fa fa-circle-o"></i> Pilih Penempatan</a></li>
              </ul>
            </li>
             <li class="treeview">
              <a href="index.php?p=list-dosen-single2&id=<?php echo $id; ?>">
                <i class="fa fa-users"></i>
                <span>Dosen Pembimbing</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
              <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Nilai</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="index.php?p=list-nilai-instansi-mahasiswa-pro2&id=<?php echo $id; ?>"><i class="fa fa-circle-o"></i> Nilai Dari Instansi</a></li>
                <li><a href="index.php?p=list-nilai-dosen-mahasiswa-pro2&id=<?php echo $id; ?>"><i class="fa fa-circle-o"></i> Nilai Dari Dosen</a></li>
              </ul>
            </li>
             <li class="treeview">
              <a href="index.php?p=list-nilai-akhir-mahasiswa-pro2&id=<?php echo $id; ?>">
                <i class="fa fa-files-o"></i>
                <span>Nilai Akhir Mahasiswa</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>

            <?php }elseif($lev=="Dosen"){ ?>

              <li class="treeview">
              <a href="index.php?p=list-mahasiswa-bimbingan">
                <i class="fa fa-users"></i>
                <span>Mahasiswa</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              
            </li>
              <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Beri Nilai Mhs</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             <ul class="treeview-menu">
                 <li><a href="index.php?p=list-mahasiswa-belum-dinilai-dosen"><i class="fa fa-circle-o"></i> Mhs Belum Diberi Nilai </a></li>
                <li><a href="index.php?p=list-mahasiswa-sudah-dinilai-dosen"><i class="fa fa-circle-o"></i> Mhs Sudah Diberi Nilai</a></li>
            
              </ul>
            </li>
             <li class="treeview">
              <a href="index.php?p=list-mahasiswa-nilai-instansi">
                <i class="fa fa-files-o"></i>
                <span>Nilai Dari Instansi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            
            </li>
            <li class="treeview">
              <a href="index.php?p=list-periode2">
                <i class="fa fa-calendar"></i>
                <span>Periode Penilaian</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>

            <?php }elseif($lev=="nmprodi"){ ?> <!-- Prodi1 = nama prodi -->

              <li class="treeview">
              <a href="index.php?p=list-mahasiswa-prodi">
                <i class="fa fa-users"></i>
                <span>Mahasiswa</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              
            </li>
             

             <?php }elseif($lev=="Instansi"){ ?>

               <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Mahasiswa</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             <ul class="treeview-menu">
                 <li><a href="index.php?p=list-mahasiswa-pkl"><i class="fa fa-circle-o"></i> Mahasiswa Belum Diproses </a></li>
                <li><a href="index.php?p=list-mahasiswa-pkl-diproses"><i class="fa fa-circle-o"></i> Mahasiswa Sudah Diproses</a></li>
            
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Penilaian Mhs</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             <ul class="treeview-menu">
                 <li><a href="index.php?p=list-mahasiswa-belum-dinilai"><i class="fa fa-circle-o"></i> Mhs Belum Diberi Nilai </a></li>
                <li><a href="index.php?p=list-mahasiswa-sudah-dinilai"><i class="fa fa-circle-o"></i> Mhs Sudah Diberi Nilai</a></li>
            
              </ul>
            </li>
             <li class="treeview">
              <a href="index.php?p=list-periode2">
                <i class="fa fa-calendar"></i>
                <span>Periode Penilaian</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
          <?php }else{ ?>

             <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Mahasiswa</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="index.php?p=tambah-mahasiswa"><i class="fa fa-circle-o"></i> Tambah Mahasiswa </a></li>
                <li><a href="index.php?p=list-mahasiswa"><i class="fa fa-circle-o"></i> Data Mahasiswa</a></li>
                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Dosen</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="index.php?p=tambah-dosen"><i class="fa fa-circle-o"></i> Tambah Dosen </a></li>
                <li><a href="index.php?p=list-dosen"><i class="fa fa-circle-o"></i> Data Dosen</a></li>
            
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-building-o"></i>
                <span>Prodi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="index.php?p=tambah-prodi"><i class="fa fa-circle-o"></i> Tambah Prodi </a></li>
                <li><a href="index.php?p=list-prodi"><i class="fa fa-circle-o"></i> Data Prodi</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-building-o"></i>
                <span>Instansi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="index.php?p=tambah-instansi"><i class="fa fa-circle-o"></i> Tambah Instansi </a></li>
                <li><a href="index.php?p=list-instansi"><i class="fa fa-circle-o"></i> Data Instansi</a></li>
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-map-marker"></i>
                <span>Penempatan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="index.php?p=tambah-penempatan"><i class="fa fa-circle-o"></i> Tambah Penempatan</a></li>
                <li><a href="index.php?p=list-penempatan"><i class="fa fa-circle-o"></i> Data Penempatan</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="index.php?p=list-periode">
                <i class="fa fa-calendar"></i>
                <span>Periode Penilaian</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Nilai Mahasiswa</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="index.php?p=list-nilai-instansi-mahasiswa-pro"><i class="fa fa-circle-o"></i> Nilai Dari Instansi</a></li>
                <li><a href="index.php?p=list-nilai-dosen-mahasiswa-pro"><i class="fa fa-circle-o"></i> Nilai Dari Dosen</a></li>
              </ul>
            </li>
             <li class="treeview">
              <a href="index.php?p=list-nilai-akhir-mahasiswa-pro">
                <i class="fa fa-files-o"></i>
                <span>Nilai Akhir Mahasiswa</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
            <?php } ?>
          </ul>
        </section>
        <!-- /.sidebar -->