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
              <p class="login-box-msg">Register a new membership</p>

              <form action="<?php echo base_url()?>Admin/addUser" method="post">
                <div class="input-group mb-3">
                  <input type="text" name="name" class="form-control" placeholder="Full name" value="<?php echo set_value('name')?>">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="number" name="phone" min="1000000000" size="15" class="form-control" placeholder="Phone Number" value="<?php echo set_value('phone')?>">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-phone"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email')?>">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="username" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username')?>">
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
                <div class="input-group mb-3">
                  <input type="password" name="password_confirm" class="form-control" placeholder="Retype password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="row ">
                  <div class="input-group mb-3 d-flex justify-content-center">
                    <div class="col-lg-3 custom-control custom-radio">
                      <label class="input-group-text" for="radioUser"><input type="radio" name="role" id="radioUser" value="USER"><b>USER</b></label>
                    </div>
                    <div class="col-lg-3 custom-control custom-radio">
                      <label class="input-group-text" for="radioAdmin"><input type="radio" name="role" id="radioAdmin" value="ADMIN"><b>ADMIN</b></label>
                    </div>
                    <div class="col-lg-3 custom-control custom-radio">
                      <label class="input-group-text" for="radioStaff"><input type="radio" name="role" id="radioStaff" value="STAFF"><b>STAFF</b></label>
                    </div>
                  </div>
                </div>

                <div class="card-footer d-flex justify-content-center">
                  <!-- /.col -->
                  <div class="col-4">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block">Register</button>
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