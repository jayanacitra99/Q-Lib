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
        <h1>User List</h1>
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
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $no = 1;
                foreach ($users as $data) {
                  echo '<tr>
                          <td>'.$no.'</td>
                          <td>'.$data->USERNAME.'</td>
                          <td>'.$data->NAME.'</td>
                          <td>'.$data->EMAIL.'</td>
                          <td>'.$data->PHONE.'</td>
                          <td>'.$data->ROLE.'</td>
                          <td>
                            <a id="deletebut" deleteid="'.$data->ID_USER.'" onclick="myConfirm()"><button class="btn btn-danger">DELETE</button></a>
                            <a href="'.base_url().'Admin/infoUser/'.$data->ID_USER.'"><button class="btn btn-info">INFO</button></a>
                          </td>
                        </tr>';
                  $no++;
                }
              ?>
              <script>
                function myConfirm(){
                  Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      var deleteid = $('#deletebut').attr('deleteid');
                      window.location.replace('<?php echo base_url()?>Admin/deleteUser/'+deleteid);
                    }
                  })
                }
              </script>
            </tbody>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Action</th>
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
