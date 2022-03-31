<?php
session_start();
$isLoggedIn = $_SESSION['isLoggedIn'];
$id=$_SESSION['id'];
$nama=$_SESSION['nama'];
$foto=$_SESSION['foto'];
$lev=$_SESSION['lev'];
 
if($isLoggedIn != 'yes'){
 
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>

<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link rel="shortcut icon" href="../images/logo.png"/>

    <title>Sistem Informasi SATe PraDA UIN Sunan Ampel Surabaya</title>
   
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="../css/datatables.min.css"/>

    <!-- Theme style -->
    <link rel="stylesheet" href="../css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../css/skins/_all-skins.min.css">
     <!-- jQuery 2.1.4 -->
    <script src="../js/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.5 -->
      <script src="../js/moment.js"></script>

     <script src="../js/bootstrap-datetimepicker.min.js"></script>
   
  </head>
  
  <body class="hold-transition skin-blue sidebar-mini">
     <?php
     include '../koneksi/koneksi.php';
     ?>
    <div class="wrapper">
          <div class="logo">
            <img src="../images/logo.png" class="img-logo">
            <span class="jd-logo">Sistem Informasi</span>
            <span class="nm-sek">SATe PraDA UIN Sunan Ampel Surabaya</span>
        </div>
      <header class="main-header">
        <!-- Logo -->
        <div href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b></b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><?php echo $lev; ?></b></span>
        </div>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
        

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../images/user/<?php echo $foto; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $nama; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../images/user/<?php echo $foto; ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $nama." ".$id ; ?>
                      <small><?php echo $lev; ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                 
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <?php if($lev=="Mahasiswa"){ ?>  
                      <a href="index.php?p=edit-mahasiswa2&id=<?php echo $id; ?>" class="btn btn-default btn-flat"><i class="fa fa-user"> Profil</i></a>                      
                     <?php }else { ?>
                      <a href="index.php?p=dataProfil" class="btn btn-default btn-flat"><i class="fa fa-user"> Profil</i></a>
                      
                    <?php } ?>
                    </div>
                    <div class="pull-right">
                      
                      <a href="../logout/logout.php" class="btn btn-default btn-flat">
                        <i class="fa fa-sign-out"></i> Keluar
                      </a>
                     
                    </div>
                  </li>
                </ul>
              </li>
           
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="margin-top: 60px;">
       <?php include "menu.php"; ?>
      </aside>

      <!-- Content Wrapper. Contains page content -->
     
        <?php
        date_default_timezone_set("Asia/Jakarta");
     $page_dir='pages';
    if(!empty($_GET['p'])){
        $page=scandir($page_dir,0);
        unset($page[0],$page[1]);
        $p=$_GET['p'];
        if(in_array($p.'.php',$page)){
         include($page_dir.'/'.$p.'.php');
        }
        else{
        include ($page_dir.'/404-page.php');
        }
    }
    else{
        include ($page_dir.'/home.php');
    }
    ?>

 

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b></b> 
        </div>
         &copy; Copyright <?php echo date('Y');  ?> UIN Sunan Ampel Surabaya
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark" style="top:50px;">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
         
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
          </div>
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
  
    </div><!-- ./wrapper -->


     <script type="text/javascript">
      $('#penempatan_mhs').on('change', function(){
        var val = $(this).val();
        //alert(val);
        $.ajax({
            url: "cek_mhs.php",
            type: "post",
            data: {
              val : val,
            },
            success: function (response) {
              if(response == "data ada"){
                alert("data sudah ada");
                $('#penempatan_mhs').val("pilih").trigger("change");
              } else {
                //alert(response);
                $('#change_view').html(response);
                $('.select2ku').select2();
              }
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
      });

      $(function () {
        
        $('#datepicker1').datetimepicker({
                                  
          format: 'YYYY-MM-DD HH:mm:s',
           sideBySide: true,
          widgetPositioning: {
              horizontal: 'right',
              vertical: 'bottom'
          }
          
        });

        $('#datepicker2').datetimepicker({

         format: 'YYYY-MM-DD hh:mm:ss',
           sideBySide: true,
          widgetPositioning: {
              horizontal: 'right',
              vertical: 'bottom'
          }

        });
        
       
         $('#datepicker3').datetimepicker({
                                  
          format:'YYYY-MM-DD',
            sideBySide: true,
          widgetPositioning: {
              horizontal: 'right'
          }
          
        });
          $('#datepicker4').datetimepicker({
                                  
          format:'YYYY-MM-DD',
            sideBySide: true,
          widgetPositioning: {
              horizontal: 'right'
          }
          
        });
       
      
      });
      
      $(document).ready(function() {
            $('.select2ku').select2();
        });
      </script>
    <script src="../js/bootstrap.min.js"></script>

    <script src="../ckeditor/ckeditor.js"></script>
 
    <script type="text/javascript" src="../js/datatables.min.js"></script>

    <!-- AdminLTE App -->
    <script src="../js/appLTE.min.js"></script>

    <script src="../js/backtoTop.js"></script>
 <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>