      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Mahasiswa PKL
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">List Mahasiswa PKL</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data List Mahasiswa PKL <?php echo $id; ?></h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">     
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                         <th>Foto</th>
                        <th>Nama Mahasiswa</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                    //$sql=mysqli_query($koneksi,"SELECT * FROM tb_mhs,tb_instansi,tb_penempatan where tb_penempatan.nim=tb_mhs.nim and tb_penempatan.kd_instansi='$id' and tb_mhs.stts_hps = '0' AND tb_penempatan.status='Diterima' And tb_mhs.nim NOT IN (SELECT nim FROM tb_nilai_instansi)");
                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_mhs,tb_penempatan where tb_penempatan.nim=tb_mhs.nim and tb_penempatan.kd_instansi='$id' and tb_mhs.stts_hps = '0' AND tb_penempatan.status='Diterima' And tb_mhs.nim NOT IN (SELECT nim FROM tb_nilai_instansi)");

                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><img src="./../images/user/<?php echo $q['foto']; ?>" alt="" style="width: 100px;height: 100px;"></td>
                        <td><a href="index.php?p=list-mahasiswa-single&id=<?php echo $q['nim']; ?>"><?php echo strtoupper($q['nama']); ?></a></td>
                          <td>
                           
                          <a href="index.php?p=form-nilai-instansi&id=<?php echo $q['nim']; ?>" class="btn btn-info">Beri Nilai</a>
                         
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