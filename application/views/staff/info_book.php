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
        <h1><?php echo $books->TITLE?></h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid row">
    <!-- general form elements -->
    <div class="card card-primary col-lg-9">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-1">
            <a href="<?php echo base_url()?>Staff/viewBooks"><button class="btn btn-info"><i class="fa fa-arrow-left"></i></button></a>
          </div>
          <div class="pt-2">
            <h3 class="card-title"><?php echo $books->TITLE?></h3>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="<?php echo base_url()?>Staff/editBook/<?php echo $books->ID_BUKU?>" method="post">
        <div class="card-body">
          <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter Title" value="<?php echo $books->TITLE?>">
          </div>
          <div class="form-group">
            <label for="">Publisher</label>
            <input type="text" name="publisher" class="form-control" placeholder="Enter Publisher" value="<?php echo $books->PUBLISHER?>">
          </div>
          <div class="form-group">
            <label for="">Writer</label>
            <input type="text" name="writer" class="form-control" placeholder="Enter Writer" value="<?php echo $books->WRITER?>">
          </div>
          <div class="form-group">
            <label for="">Year</label>
            <input type="number" name="year" min="1000" max="<?php echo date('Y')?>" class="form-control" placeholder="Enter Year" value="<?php echo $books->YEAR?>">
          </div>
          <div class="form-group">
            <label for="">Quantity</label>
            <input type="number" name="quantity" min="0" max="100" class="form-control" placeholder="Enter Quantity" value="<?php echo $books->QUANTITY?>">
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" name="submit" value="submit" class="btn btn-info">Edit Book</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
    <div class="card card-primary col-lg-3">
      <div class="card-body">
        <form action="<?php echo base_url()?>Staff/editBookCover/<?php echo $books->ID_BUKU?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputFile">Input Book Cover</label>
            <div class="input-group d-flex justify-content-center">
              <img src="<?php echo base_url()?>uploads/buku/<?php echo $books->FOTO?>" width="200px;">
            </div>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="foto" class="custom-file-input" accept=".jpg,.png,.jpeg">
                <label class="custom-file-label">Choose file</label>
              </div>
            </div>
          </div>
          <button class="btn btn-info" type="submit" name="submit" value="submit">Edit Cover</button>
        </form>
      </div>
    </div>      
  </div>
</section>