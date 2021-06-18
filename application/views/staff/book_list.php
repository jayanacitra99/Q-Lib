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
        <h1>Book Lists</h1>
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
                <th>Title</th>
                <th>Publisher</th>
                <th>Writer</th>
                <th>Year</th>
                <th>Quantity</th>
                <th>Cover</th>
                <th>Action</th>
              </tr>

            </thead>
            <tbody>
              <?php 
                $no = 1;
                foreach ($books as $data) {
                  echo '<tr>
                          <td>'.$no.'</td>
                          <td>'.$data->TITLE.'</td>
                          <td>'.$data->PUBLISHER.'</td>
                          <td>'.$data->WRITER.'</td>
                          <td>'.$data->YEAR.'</td>
                          <td>'.$data->QUANTITY.'</td>
                          <td>
                            <img src="'.base_url().'uploads/buku/'.$data->FOTO.'" width="100px">
                          </td>
                          <td>
                            <a id="deletebut" deleteid="'.$data->ID_BUKU.'" onclick="myConfirm()"><button class="btn btn-danger">DELETE</button></a>
                            <a href="'.base_url().'Staff/infoBook/'.$data->ID_BUKU.'"><button class="btn btn-info">INFO</button></a>
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
                      var bukuid = $('#deletebut').attr('deleteid');
                      window.location.replace('<?php echo base_url()?>Staff/deleteBook/'+bukuid);
                    }
                  })
                }
              </script>
            </tbody>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Publisher</th>
                <th>Writer</th>
                <th>Year</th>
                <th>Quantity</th>
                <th>Cover</th>
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