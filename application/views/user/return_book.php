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
        <h1><?php echo $mytrans->TITLE?></h1>
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
            <h3 class="card-title"><?php echo $mytrans->TITLE?></h3>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
        <div class="card-body">
          <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter Title" value="<?php echo $mytrans->TITLE?>" disabled>
          </div>
          <div class="form-group">
            <label for="">Publisher</label>
            <input type="text" name="publisher" class="form-control" placeholder="Enter Publisher" value="<?php echo $mytrans->PUBLISHER?>" disabled>
          </div>
          <div class="form-group">
            <label for="">Writer</label>
            <input type="text" name="writer" class="form-control" placeholder="Enter Writer" value="<?php echo $mytrans->WRITER?>" disabled>
          </div>
          <div class="form-group">
            <label for="">Year</label>
            <input type="number" name="year" min="1000" max="<?php echo date('Y')?>" class="form-control" placeholder="Enter Year" value="<?php echo $mytrans->YEAR?>" disabled>
          </div>
        </div>
        <!-- /.card-body -->
        <?php 
          $end = $mytrans->END_DATE;
          $today = date('Y-m-d');

          if($end >= $today){
            $fine = 0;
          } else {
              $endmonth = $end[5].$end[6];
              if($endmonth == date('m')){
                $endday = $end[8].$end[9];
                $endday = intval($endday);
                $todayday = intval(date('d'));
                $fine = ($todayday - $endday) * 10000;
              } else if($endmonth == '12'){
                $endyear = $end[0].$end[1].$end[2].$end[3];
                $endyear = intval($enyear);
                $todayyear = intval(date('Y'));
                $todayyear = ($todayyear - $endyear) * 12;
                $endmonth = $end[5].$end[6];
                $endmonth = intval($endmonth);
                $todaymonth = intval(date('m')) + $todayyear;
                $todaymonth = ($todaymonth - $endmonth) * 30;
                $endday = $end[8].$end[9];
                $endday = intval($endday);
                $todayday = intval(date('d')) + $todaymonth;
                $fine = ($todayday - $endday) * 10000;
              }else {
                $endmonth = $end[5].$end[6];
                $endmonth = intval($endmonth);
                $todaymonth = intval(date('m'));
                $todaymonth = ($todaymonth - $endmonth) * 30;
                $endday = $end[8].$end[9];
                $endday = intval($endday);
                $todayday = intval(date('d')) + $todaymonth;
                $fine = ($todayday - $endday) * 10000;
              }
            }
        ?>
        <div class="card-footer">
          <a  id="returnbut" transid="<?php echo $mytrans->ID_TRANSACTION?>" qrfine="<?php echo base_url()?>assets/qrfine.png" fine="<?php echo $fine?>" returnid="<?php echo $mytrans->ID_BUKU?>" onclick="myConfirm()"><button type="submit"class="btn btn-info" >Return This Book</button></a>
        </div>
        <script>
          function myConfirm(){
            Swal.fire({
              title: 'Return This Book?',
              text: "Are you done reading this book?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, Return it!'
            }).then((result) => {
              if (result.isConfirmed) {
                var fine = $('#returnbut').attr('fine');
                if(fine == 0){
                  var returnid = $('#returnbut').attr('returnid');
                  var transid = $('#returnbut').attr('transid');
                  window.location.replace('<?php echo base_url()?>User/returnThisBook/'+returnid+'/'+fine+'/'+transid);
                } else {
                  var qrfine = $('#returnbut').attr('qrfine');
                  Swal.fire({
                    title: 'Oops! You exceed the return date!',
                    text: "Pay this fine to return Rp."+fine,
                    icon: 'error',
                    imageUrl : qrfine,
                    imageWidth : 400,
                    imageHeight : 400,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Pay and Return it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      var returnid = $('#returnbut').attr('returnid');
                      var transid = $('#returnbut').attr('transid');
                      window.location.replace('<?php echo base_url()?>User/returnThisBook/'+returnid+'/'+fine+'/'+transid);
                    }
                  })
                }
              }
            })
          }
        </script>
    </div>
    <!-- /.card -->
    <div class="card card-primary col-lg-5">
      <div class="card-body">
          <div class="form-group">
            <label for="exampleInputFile">Book Cover</label>
            <div class="input-group d-flex justify-content-center">
              <img src="<?php echo base_url()?>uploads/buku/<?php echo $mytrans->FOTO?>" width="350px;">
            </div>
          </div>
      </div>
    </div>      
  </div>
</section>