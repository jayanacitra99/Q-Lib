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

<section class="content">
  <div class="container-fluid">
    <div class="">
      <div class="register-logo">
        <b>Library</b>Q
      </div>

      <div class="card">
        <div class="card-body register-card-body">
          <p class="login-box-msg">Info User <?php echo $users->NAME?></p>

          <form action="<?php echo base_url()?>Admin/editUser/<?php echo $users->ID_USER?>" method="post">
            <div class="input-group mb-3">
              <input type="text" name="name" class="form-control" placeholder="Full name" value="<?php echo $users->NAME?>">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="number" name="phone" min="1000000000" size="15" class="form-control" placeholder="Phone Number" value="<?php echo $users->PHONE?>">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-phone"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $users->EMAIL?>">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="username" name="username" class="form-control" placeholder="Username" value="<?php echo $users->USERNAME?>">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" name="password" value="<?php echo $users->PASSWORD?>" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" name="password_confirm" value="<?php echo $users->PASSWORD?>" class="form-control" placeholder="Retype password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>

            <div class="card-footer d-flex justify-content-center">
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" name="submit" value="submit" class="btn btn-info btn-block">Edit this user</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
        </div>
        <!-- /.form-box -->
      </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
  </div>
</section>