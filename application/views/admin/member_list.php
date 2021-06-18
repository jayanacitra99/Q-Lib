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
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Transaction List</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <table id="dataaTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Member Type</th>
                <th>Join Time</th>
                <th>Expired Time</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $no = 1;
                foreach ($member as $data) {
                    echo '<tr>
                          <td>'.$no.'</td>
                          <td>'.$data->USERNAME.'</td>
                          <td>'.$data->MEMBER_TYPE.'</td>
                          <td>'.$data->JOIN_TIME.'</td>
                          <td>'.$data->EXPIRED_TIME.'</td>
                        </tr>';
                  $no++;
                }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Member Type</th>
                <th>Join Time</th>
                <th>Expired Time</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
