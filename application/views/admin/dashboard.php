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
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
		  <div class="col-lg-3 col-6">
		    <!-- small box -->
		    <div class="small-box bg-info">
		      <div class="inner">
		        <h3>Users</h3>

		        <p>User List</p>
		      </div>
		      <div class="icon">
		        <i class="fa fa-users"></i>
		      </div>
		      <a href="<?php echo base_url()?>Admin/viewUsers" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		    </div>
		  </div>
		  <!-- ./col -->
		  <div class="col-lg-3 col-6">
		    <!-- small box -->
		    <div class="small-box bg-success">
		      <div class="inner">
		        <h3>Books</h3>

		        <p>Book List</p>
		      </div>
		      <div class="icon">
		        <i class="fa fa-book-open"></i>
		      </div>
		      <a href="<?php echo base_url()?>Admin/viewBooks" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		    </div>
		  </div>
		  <!-- ./col -->
		  <div class="col-lg-3 col-6">
		    <!-- small box -->
		    <div class="small-box bg-warning">
		      <div class="inner">
		        <h3>Transactions</h3>

		        <p>Transaction List</p>
		      </div>
		      <div class="icon">
		        <i class="fa fa-exchange-alt"></i>
		      </div>
		      <a href="<?php echo base_url()?>Admin/viewTransactions" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		    </div>
		  </div>
		  <!-- ./col -->
		  <div class="col-lg-3 col-6">
		    <!-- small box -->
		    <div class="small-box bg-danger">
		      <div class="inner">
		        <h3>History</h3>

		        <p>History</p>
		      </div>
		      <div class="icon">
		        <i class="fa fa-history"></i>
		      </div>
		      <a href="<?php echo base_url()?>Admin/viewHistory" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		    </div>
		  </div>
		  <!-- ./col -->
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>