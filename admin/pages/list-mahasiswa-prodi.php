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
                  <h3 class="box-title">Data List Mahasiswa PLP/PMPI/PPL</h3>  
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
                        <th>Agama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Periode</th>
                        <th>Penempatan</th>
                        <th>Judul Laporan</th>
                        <th>File Laporan</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                    // $sql=mysqli_query($koneksi,"SELECT tb_mhs.*,tb_dosen.nm_dosen FROM tb_mhs,tb_dosen where tb_mhs.nip_pembimbing=tb_dosen.nip and tb_mhs.nip_pembimbing='$id'");
                    //   while($q=mysqli_fetch_array($sql)){
                    //     $no++;
                    $sql=mysqli_query($koneksi,"SELECT tb_mhs.*,tb_nmprodi.prodi FROM tb_mhs,tb_nmprodi where tb_mhs.prodi=tb_nmprodi.id and stts_hps = '0' and tb_mhs.prodi='$id'");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><img src="./../images/user/<?php echo $q['foto']; ?>" alt="" style="width: 100px;height: 100px;"></td>
                        <td><?php echo $q['nim']; ?></td>
                        <td><?php echo $q['nama']; ?></td>
                        <td><?php echo $q['prodi']; ?></td>
                        <td><?php echo $q['jekel']; ?></td>
                        <td><?php echo date('d F Y',strtotime($q['tgl_lahir'])); ?></td>
                        <td><?php echo $q['agama']; ?></td>
                        <td><?php echo $q['email']; ?></td>
                        <td><?php echo $q['telp']; ?></td>
                        <td><?php echo $q['alamat']; ?></td>
                        <td><?php echo $q['periode']; ?></td>
                        <td>
                           <?php 
                            $penempatan = $q['nim'];
                            $q_tempat=mysqli_query($koneksi,"SELECT tb_penempatan.*,tb_mhs.nama,tb_instansi.nm_instansi FROM tb_penempatan,tb_mhs,tb_instansi where tb_mhs.nim=tb_penempatan.nim and tb_instansi.kd_instansi=tb_penempatan.kd_instansi");
                            $d_tempat = mysqli_fetch_array($q_tempat);

                            if (mysqli_num_rows($q_tempat) > 0){
                            echo $d_tempat['nm_instansi'];
                          }else{
                            echo "";
                          }
                           ?>
                          
                        </td>
                        <td><?php echo $q['jd_lap_pkl']; ?> </td>
                        <td>
                          <a href="pages/download.php?file=<?php echo $q['file_lap']?>" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span> Download</a>
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