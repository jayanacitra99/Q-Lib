<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LibraryQ | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/toastr/toastr.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script type="text/javascript">
    function clickNotif(){
      document.getElementById('notifSwal').click();
    }
  </script>
</head>
<body class="hold-transition login-page">
<?php
if(!empty($success)){
  echo '<div class="alert alert-success" id="notif" swalType="success" swalTitle="'.$success.'" style="display: none">'.$success.'</div>';
  echo '<script>';
  echo 'window.addEventListener("load",clickNotif);';
  echo '</script>';
}
if(!empty($notif)){
  echo '<div class="alert alert-danger" id="notif" swalType="error" swalTitle="'.$notif.'" style="display: none">'.$notif.'</div>';
  echo '<script>';
  echo 'window.addEventListener("load",clickNotif);';
  echo '</script>';
}
?>
<button type="button" id="notifSwal" class="btn btn-success notifSwal" style="display: none"></button>
<div class="login-box">
  <div class="login-logo">
    <b>Library</b>Q
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form action="<?php echo base_url();?>Auth/login" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-0">
        <a href="<?php echo base_url();?>Auth/register" class="text-center"><b>Dont have an account?</b> Register Now</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url();?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url()?>assets/package/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/package/dist/sweetalert2.min.css">
<!-- Toastr -->
<script src="<?php echo base_url();?>assets/plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
  $('.notifSwal').click(function() {
      Swal.fire({
        icon: $('#notif').attr('swalType'),
        title: $('#notif').attr('swalTitle'),
        showConfirmButton: true,
        timer: 5000
      })
    });
</script>
</body>
</html>
