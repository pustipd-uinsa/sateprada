<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="images/logo.png"/>
  <title>Login Sistem Informasi SATe PraDA UIN Sunan Ampel Surabaya</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="css/skins/_all-skins.min.css">
    <style type="text/css">
      .btn-primary {
    background-color: #3ABDD1;
    border-color: #3ABDD1;
}
.btn-primary.active.focus, .btn-primary.active:focus, .btn-primary.active:hover, .btn-primary.focus:active, .btn-primary:active:focus, .btn-primary:active:hover, .open > .dropdown-toggle.btn-primary.focus, .open > .dropdown-toggle.btn-primary:focus, .open > .dropdown-toggle.btn-primary:hover {
    color: #fff;
    background-color: #3ABDD1;
border-color: #3ABDD1;
}
.btn-primary:hover, .btn-primary:active, .btn-primary.hover {
    background-color: #3ABDD1;
}
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="images/logo2.png" alt=""/>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Selamat Datang</p>

    <form action="login/login-proses.php" method="post">
      <!-- <div class="form-group has-feedback">
        <select name="level" class="form-control" required="">
          <option value="">- Level -</option>
          <option value="Mahasiswa">Mahasiswa</option>
          <option value="Dosen">Dosen</option>
          <option value="Prodi">Admin</option>
          <option value="Instansi">Instansi</option>
        </select>
      </div> -->
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="user" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="pas" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-info btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.1.4 -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.5 -->
    <script src="js/bootstrap.min.js"></script>

    <!-- AdminLTE App -->
    <script src="js/app.min.js"></script>
</body>
</html>
