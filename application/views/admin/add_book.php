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
        <h1>Add New Book</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
      <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Book</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url()?>Admin/addBook" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title" value="<?php echo set_value('title')?>">
                  </div>
                  <div class="form-group">
                    <label for="">Publisher</label>
                    <input type="text" name="publisher" class="form-control" placeholder="Enter Publisher" value="<?php echo set_value('publisher')?>">
                  </div>
                  <div class="form-group">
                    <label for="">Writer</label>
                    <input type="text" name="writer" class="form-control" placeholder="Enter Writer" value="<?php echo set_value('writer')?>">
                  </div>
                  <div class="form-group">
                    <label for="">Year</label>
                    <input type="number" name="year" min="1000" max="<?php echo date('Y')?>" class="form-control" placeholder="Enter Year" value="<?php echo set_value('year')?>">
                  </div>
                  <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="number" name="quantity" min="1" max="100" class="form-control" placeholder="Enter Quantity" value="<?php echo set_value('quantity')?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Input Book Cover</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" accept=".jpg,.png,.jpeg" required="Book Cover">
                        <label class="custom-file-label">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" style="background-color : rgba(0,0,0,0.3);" id="">Book Cover Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
      </div>
</section>