      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Mahasiswa PKL
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">List Mahasiswa PLP/PMPI/PPL</li>
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
                        <th>Nama Mahasiswa</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT tb_nilai_instansi.*,tb_mhs.nama,tb_mhs.foto FROM tb_nilai_instansi,tb_mhs where tb_mhs.nim=tb_nilai_instansi.nim and stts_hps = '0' and tb_nilai_instansi.kd_instansi='$id' and tb_nilai_instansi.stt_nilai='Sudah'");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                         <td><img src="./../images/user/<?php echo $q['foto']; ?>" alt="" style="width: 100px;height: 100px;"></td>
                        <td><a href="index.php?p=list-mahasiswa-single&id=<?php echo $q['nim']; ?>"><?php echo strtoupper($q['nama']); ?></a></td>
                          <td>
                           
                          <a href="index.php?p=form-edit-nilai-instansi&id=<?php echo $q['kd_nilai_instansi']; ?>" class="btn btn-warning">Edit Nilai</a>
                          <a href="./pages/cetak-nilai-instansi.php?nim=<?php echo $q['nim']; ?>&kdi=<?php echo $id; ?>" class="btn btn-danger" target="_blank">Cetak Nilai</a>
                         
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