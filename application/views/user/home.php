<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/asset2/public/css/home.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- SweetAlert2 -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
      <!-- Toastr -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/toastr/toastr.min.css">
      <script type="text/javascript">
    function clickNotif(){
      document.getElementById('notifSwal').click();
    }
  </script>
  <style type="text/css">
      a {
        text-decoration: none;
        color: inherit;
      }
      a:hover {
        color: inherit;
      }
      html {
        scroll-behavior: smooth;
      }
  </style>
    <title>Home</title>
</head>

<body>
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
    <header style="background-image: url(<?php echo base_url()?>assets/asset2/public/images/cover.png); background-attachment: fixed;">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#" style="color: white"><strong>LibraryQ</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <?php 
                            if($this->session->userdata('logged_in') == TRUE){
                                echo '<li class="nav-item active">
                                        <a class="nav-link text-white" qrpay="'.base_url().'assets/qrfine.png" onclick="myMember()" userid="'.$id->ID_USER.'" id="memberButton"><button type="submit" class="btn btn-primary btn-sm">Get Membership</button></a>
                                    </li>';
                            }
                        ?>
                    </ul>
                    <script>
                        function myMember(){
                            (async () => {
                                /* inputOptions can be an object or Promise */
                                const inputOptions = new Promise((resolve) => {
                                  setTimeout(() => {
                                    resolve({
                                      'SILVER'     : 'Silver (7 Days) : Rp.20.000',
                                      'GOLD'     : 'Gold (30 Days) : Rp.50.000',
                                      'PLATINUM'    : 'Platinum (1 Year) : Rp.150.000'
                                    })
                                  }, 1000)
                                })
                                qrpay = $('#memberButton').attr('qrpay')
                                const { value: member } = await Swal.fire({
                                  title: 'Select Membership',
                                  input: 'radio',
                                  imageUrl : qrpay,
                                  imageWidth : 400,
                                  imageHeight : 400,
                                  showCancelButton : true,
                                  inputOptions: inputOptions,
                                  inputValidator: (value) => {
                                    if (!value) {
                                      return 'You need to choose something!'
                                    }
                                  }
                                })

                                if (member) {
                                    Swal.fire({ html: `Success become ${member} member, Enjoy it!` });
                                    userid = $('#memberButton').attr('userid');
                                    window.location.replace('<?php echo base_url()?>User/getMembership/'+userid+'/'+member);
                                }

                                }
                            )()
                        }
                    </script>
                    <form class="form-inline my-2 my-lg-0">
                        <strong class="" style="color:white;">Hello, <?php echo $this->session->userdata('username');?></strong><a class="btn btn-primary ml-2" href="<?php echo base_url()?>Auth/logout" role="button">Logout</a>
                    </form>
                </div>
            </nav>
            <div class="heading mt-5 pt-5">
                <h1>Create New Experiences by Reading</h1>
                <h1 class="mb-5">Books in LibaryQ</h1>
            </div>
        </div>
    </header>

    <div class="cards container form-inline">
        <div class="jurnal">
            <a href="#newR">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="80" fill="currentColor" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/>
                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                  </svg>
                <h5>New Realases</h5>
            </a>
        </div>
        <div class="ebook">
            <a href="#catalogue">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="80" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
              </svg>
            <h5>Book Catalogue</h5>
            </a>
        </div>
        <div class="article">
            <a href="#last">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="80" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z"/>
                <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z"/>
              </svg>
            <h5>Last Borrowed</h5>
            </a>
        </div>
    </div>

    <div class="newrelease container" id="newR">
        <h2 class="mb-4">New Release</h2>
        <div class="card-deck">
            <?php 
            $no = 1;
                foreach ($newR as $data) {
                    if($no < 5){
                        echo '<div class="card">
                                <a href="'.base_url().'User/infoBuku/'.$data->ID_BUKU.'"><img class="card-img-top" src="'.base_url().'uploads/buku/'.$data->FOTO.'" alt="'.$data->TITLE.'"></a>
                            </div>';
                    }
                    $no++;
                }
            ?>
        </div>
    </div>

    <div class="popular container mt-5" id="catalogue">
        <h2 class="mb-4">Books Catalogue</h2>
        <div class="card-deck">
            <table id="dataaTable" class="">
                <thead>
                    <tr>
                      <th></th>
                    </tr>
                </thead>
                <tbody class="d-flex justify-content-center flex-wrap">
                    <?php 
                        foreach ($books as $data) {
                            echo '<tr >
                                      <td style="width:200px;" class="pt-5">
                                          <div class="card" style="height:450px;">
                                            <a href="'.base_url().'User/infoBuku/'.$data->ID_BUKU.'">
                                                <img class="card-img-top" src="'.base_url().'uploads/buku/'.$data->FOTO.'" alt="'.$data->TITLE.'">
                                                <div class="card-body">
                                                    <h5 class="card-title">'.$data->TITLE.'</h5>
                                                    <p class="card-text">'.$data->PUBLISHER.'</p>
                                                    <p class="card-text"><small class="text-muted">'.$data->YEAR.'</small></p>
                                                </div>
                                            </a>
                                        </div>
                                      </td>
                                    </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="testimoni container mt-5" id="last">
        <h2 class="mb-4">Last Borrowed</h2>
        <div class="card-deck">
            <?php 
            $no = 1;
                foreach ($last as $data) {
                    if($no < 5){
                        echo '<div class="card" >
                                <a href="'.base_url().'User/infoBuku/'.$data->ID_BUKU.'">
                                    <img class="card-img-top" src="'.base_url().'uploads/buku/'.$data->FOTO.'" alt="'.$data->TITLE.'">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$data->TITLE.'</h5>
                                        <p class="card-text">'.$data->YEAR.'</p>
                                    </div>
                                </a>
                            </div>';
                    }
                    $no++;
                }
            ?>
        </div>
    </div>

    <?php 
        if($this->session->userdata('logged_in') == TRUE){
            echo '<div class="testimoni container mt-5 d-flex flex-wrap" id="last">
                    <h2 class="mb-4">On You</h2>
                    <div class="card-deck">';
            foreach ($onyou as $data) {
                echo '<div class="card d-flex flex-wrap flex-grow-2">
                            <a href="'.base_url().'User/returnBuku/'.$data->ID_BUKU.'" class="">
                                <img class="card-img-top" src="'.base_url().'uploads/buku/'.$data->FOTO.'" alt="'.$data->TITLE.'">
                                <div class="card-body">
                                    <h5 class="card-title">'.$data->TITLE.'</h5>
                                    <p class="card-text">End Date :<br> '.$data->END_DATE.'</p>
                                </div>
                            </a>
                        </div>';
            }
            echo '</div></div>';
        }
    ?>

    <footer class="mt-5">
        <div class="container">
            <div class="logo pt-5 float-left">
                <h4 class="text-white ">LibraryQ</h4>
                <p class="mt-5"><a class="form-inline text-white " href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram mr-2" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                  </svg> Instagram</a>
                </p>
                <p class="mt-4"><a class="form-inline text-white" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook mr-2" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                  </svg> Facebook</a>
                </p>
                <p class="mt-4"><a href="#" class="form-inline text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube mr-2" viewBox="0 0 16 16">
                    <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                  </svg> Youtube</a>
                </p>
            </div>
            <div class="contact float-left pt-5">
                <h4 class="text-white ">Contact LibraryQ</h4>
                <p class="mt-5"><a class="form-inline text-white " href="#">Phone : 022-1248539</a>
                </p>
                <p class="mt-4"><a class="form-inline text-white" href="#">Email  : LibraryQ@contact.com</a>
                </p>
            </div>
            <div class="address float-left pt-5">
                <h4 class="text-white ">Address LibraryQ</h4>
                <p class="mt-5"><a class="form-inline text-white " href="#">Jln. Perpustakaan Indonesia, <br> No. 12, Bandung, Jawa Barat</a>
                </p>
            </div>
        </div>
    </footer>
    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo base_url();?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?php echo base_url()?>assets/package/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/package/dist/sweetalert2.min.css">
    <!-- Toastr -->
    <script src="<?php echo base_url();?>assets/plugins/toastr/toastr.min.js"></script>
    <script type="text/javascript">
      $(function () {
        $("#example1").DataTable();
        $('#dataaTable').DataTable({
          "pageLength" : 10,
          "lengthChange": false,
          "ordering": false,
          "info": false,
          "autoWidth": true,
        });
      });
      $('.notifSwal').click(function() {
          Swal.fire({
            icon: $('#notif').attr('swalType'),
            title: $('#notif').attr('swalTitle'),
            showConfirmButton: true,
            timer: 5000
          })
        });
    </script>
</body>
</html>