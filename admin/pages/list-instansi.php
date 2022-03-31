      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Instansi
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">List Instansi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data List Instansi</h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">     
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>LOGO</th>
                        <th>KD Instansi</th>
                        <th>Nama Instansi</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Fax</th>
                        <th>Web</th>
                        <th>ALamat</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_instansi");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                          <td><img src="./../images/user/<?php echo $q['logo']; ?>" alt="" style="width: 100px;height: 100px;"></td>
                         <td><?php echo $q['kd_instansi']; ?></td>
                         <td><?php echo $q['nm_instansi']; ?></td>
                        <td><?php echo $q['email']; ?></td>
                        <td><?php echo $q['telp']; ?></td>
                        <td><?php echo $q['fax']; ?></td>
                        <td><?php echo $q['web']; ?></td>
                        <td><?php echo $q['alamat']; ?></td>
                        <td><?php echo $q['username']; ?></td>
                        <td><?php echo $q['password']; ?></td>
                         <td>
                          <a href="index.php?p=edit-instansi&id=<?php echo $q['kd_instansi']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                          <a href="./pages/delete-instansi.php?id=<?php echo $q['kd_instansi']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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