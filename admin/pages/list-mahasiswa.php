      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Mahasiswa
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">List Mahasiswa</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data List Mahasiswa</h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">     
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <!-- <th>Agama</th> -->
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Pembimbing</th>
                        <th>Judul Laporan</th>
                        <th>File Laporan</th>
                        <th>Periode</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                    // $sql=mysqli_query($koneksi,"SELECT tb_mhs.*,tb_dosen.nm_dosen FROM tb_mhs,tb_dosen where tb_mhs.nip_pembimbing=tb_dosen.nip");
                      $sql=mysqli_query($koneksi,"SELECT * FROM tb_mhs where stts_hps = '0'");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                         <td><img src="./../images/user/<?php echo $q['foto']; ?>" alt="" style="width: 100px;height: 100px;"></td>
                         <td><?php echo $q['nim']; ?></td>
                         <td><?php echo $q['nama']; ?></td>
                         <td>
                           <?php 
                            $id_prodi = $q['prodi'];
                            $q_prodi=mysqli_query($koneksi,"SELECT * FROM tb_nmprodi where id = '$id_prodi'");
                            $d_prodi = mysqli_fetch_array($q_prodi);

                            if (mysqli_num_rows($q_prodi) > 0){
                            echo $d_prodi['prodi'];
                          }else{
                            echo "";
                          }
                           ?>
                          
                         </td>
                         <td><?php echo $q['jekel']; ?></td>
                        <td><?php echo date('d F Y',strtotime($q['tgl_lahir'])); ?></td>
                        <!-- <td><?php echo $q['agama']; ?></td> -->
                        <td><?php echo $q['email']; ?></td>
                        <td><?php echo $q['telp']; ?></td>
                        <td><?php echo $q['alamat']; ?></td>
                        <!-- <td><?php echo $q['nip_pembimbing']; ?></td> -->
                        <td>
                           <?php 
                            $nip_dosen = $q['nip_pembimbing'];
                            $q_nip=mysqli_query($koneksi,"SELECT * FROM tb_dosen where nip = '$nip_dosen'");
                            $d_nip = mysqli_fetch_array($q_nip);

                            if (mysqli_num_rows($q_nip) > 0){
                            echo $d_nip['nm_dosen'];
                          }else{
                            echo "";
                          }
                           ?>
                          
                         </td>
                        <td><?php echo $q['jd_lap_pkl']; ?> </td>
                        <!-- <td><?php echo $q['file_lap']; ?> </td> -->
                        <td>
                          <a href="pages/download.php?file=<?php echo $q['file_lap']?>" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span> Download</a>
                        </td>
                        <td><?php echo $q['periode']; ?></td>
                        <td><?php echo $q['username']; ?></td>
                        <td><?php echo $q['password']; ?></td>
                         <td>
                          <a href="index.php?p=edit-mahasiswa&id=<?php echo $q['nim']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                          <a href="./pages/delete-mahasiswa.php?id=<?php echo $q['nim']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>

                  <?php } ?>
                    </tbody>
                  </table>
                </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

            </section><!-- /.content -->
      </div><!-- /.content-wrapper -->