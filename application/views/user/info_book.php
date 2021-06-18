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
        <h1><?php echo $book->TITLE?></h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid row">
    <!-- general form elements -->
    <div class="card card-primary col-lg-7">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-1">
            <a href="<?php echo base_url()?>User"><button class="btn btn-info"><i class="fa fa-arrow-left"></i></button></a>
          </div>
          <div class="pt-2">
            <h3 class="card-title"><?php echo $book->TITLE?></h3>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
        <div class="card-body">
          <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter Title" value="<?php echo $book->TITLE?>" disabled>
          </div>
          <div class="form-group">
            <label for="">Publisher</label>
            <input type="text" name="publisher" class="form-control" placeholder="Enter Publisher" value="<?php echo $book->PUBLISHER?>" disabled>
          </div>
          <div class="form-group">
            <label for="">Writer</label>
            <input type="text" name="writer" class="form-control" placeholder="Enter Writer" value="<?php echo $book->WRITER?>" disabled>
          </div>
          <div class="form-group">
            <label for="">Year</label>
            <input type="number" name="year" min="1000" max="<?php echo date('Y')?>" class="form-control" placeholder="Enter Year" value="<?php echo $book->YEAR?>" disabled>
          </div>
          <div class="form-group">
            <label for="">Quantity</label>
            <input type="number" name="quantity" min="0" max="100" class="form-control" placeholder="Enter Quantity" value="<?php echo $book->QUANTITY?>" disabled>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <a href="<?php echo base_url()?>User/rentBook/<?php echo $book->ID_BUKU?>"><button type="submit"class="btn btn-info">Rent This Book</button></a>
        </div>
    </div>
    <!-- /.card -->
    <div class="card card-primary col-lg-5">
      <div class="card-body">
          <div class="form-group">
            <label for="exampleInputFile">Book Cover</label>
            <div class="input-group d-flex justify-content-center">
              <img src="<?php echo base_url()?>uploads/buku/<?php echo $book->FOTO?>" width="350px;">
            </div>
          </div>
      </div>
    </div>      
  </div>
</section>