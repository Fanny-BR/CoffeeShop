<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CoffeeShop | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- Sweet Alert -->
  <link href="bower_components/sweet/sweetalert.css" rel="stylesheet" type="text/css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="rival_kasir.png" style="width:363px; height:200px;" alt="kasir">
    <body style="background-image: url(intro.jpg); background-size:100%; background-position:top; background-attachment: fixed">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" name="masuk" class="btn btn-primary btn-block btn-flat" value="Login">
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="bower_components/sweet/sweetalert.min.js" type="text/javascript"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
<?php
include 'koneksi.php';
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if(isset($_SESSION["level"])){
  header("location:index.php");
  exit;
}


if(isset($_POST['masuk'])){
  
  $username	= $_POST['username'];
  $password	= $_POST['password'];
  
  $query = mysqli_query($koneksi, "SELECT user.id, user.nama, user.nomor, user.alamat, user.username, user.password, level.nama_level
            FROM user, level  
            where user.id_level = level.id AND user.username='$username' AND user.password='$password'");
  if(mysqli_num_rows($query) == 0){
    echo "<script>swal({
      type: 'error',
      title: 'Login Gagal',
      text: 'Data Akun Tidak Ada Dalam Database, Pastikan Username & Password Benar!!!',
      footer: '<a href>Perlu Bantuan?</a>'
      })</script>";
      echo "<meta http-equiv='refresh' content='1;url=login.php'>";
  }else{
    $data = mysqli_fetch_assoc($query);
    
    if($data['nama_level'] == 'admin'){
      echo "<script>swal('Login Berhasil', 'Selamat Datang $username', 'success');</script>";
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['nama'] = $data['nama'];
                    $_SESSION['level'] = $data['nama_level'];
                    $_SESSION['nomor'] = $data['nomor'];
                    $_SESSION['alamat'] = $data['alamat'];
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['password'] = $data['password'];
                    echo "<meta http-equiv='refresh' content='1;url=index.php'>";
    }else if($data['nama_level'] == 'karyawan'){
      echo "<script>swal('Login Berhasil', 'Selamat Datang $username', 'success');</script>";
                     $_SESSION['id'] = $data['id'];
                    $_SESSION['nama'] = $data['nama'];
                    $_SESSION['level'] = $data['nama_level'];
                    $_SESSION['nomor'] = $data['nomor'];
                    $_SESSION['alamat'] = $data['alamat'];
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['password'] = $data['password'];
                    echo "<meta http-equiv='refresh' content='1;url=index.php'>";
    }else{
      echo "<script>swal({
        type: 'error',
        title: 'Login Gagal',
        text: 'Pastikan Username & Password Benar!!!',
        footer: '<a href>Perlu Bantuan?</a>'
        })</script>";
        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
    }
  }
}
?>