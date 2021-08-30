
<?php include('head.php');?>
<head>
<title>Quên Mật Khẩu | <?=$site_tenweb;?></title>
</head> 
<body style="background:url(<?=$bg_login;?>); background-repeat: no-repeat; background-size: cover;">
  <div class="main-content" >
    <?php require_once('./system/menu-login.php');?>
    <!-- Header -->
    <div class="header bg-gradient py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">

          </div>
        </div>
      </div>

    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">
            <!--<div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-4"><small>Sign up with</small></div>
              <div class="text-center">
                <a href="#" class="btn btn-neutral btn-icon mr-4">
                  <span class="btn-inner--icon"><img src="../assets/img/icons/common/github.svg"></span>
                  <span class="btn-inner--text">Github</span>
                </a>
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="../assets/img/icons/common/google.svg"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div>-->
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>ĐẶT LẠI MẬT KHẨU MỚI</small>
              </div>

<?php
if(isset($_GET["id"]))
{
  $id = check_string($_GET['id']);
  $query = $ketnoi->query("select * from users where token = '".$id."' ");
  $check_token = mysqli_num_rows($query);
  if ($check_token == 0) 
  {
    echo '<script type="text/javascript">swal("Thất Bại","Liên kết không tồn tại!","error");
      setTimeout(function(){ location.href = "/" },2000);</script>';
  }
}

if (isset($_POST["submit"]))
{
  $password = check_string($_POST['password']);
  $repassword = check_string($_POST['repassword']);

  $password = md5($password);
  $repassword = md5($repassword);

  $get_username = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT `username` FROM `users` WHERE `token` = '".$id."'  ")) ['username'];

  $query = $ketnoi->query("select * from users where token = '".$id."' ");
  $check_token = mysqli_num_rows($query);

  if ($check_token == 0) 
  {
      echo '<script type="text/javascript">swal("Thất Bại", " Liên kết không tồn tại!", "error");</script>';
  }
  else if ($password == "" || $repassword == "") 
  {
      echo '<script type="text/javascript">swal("Thất Bại", " Vui lòng điền vào ô dưới!", "error");</script>';
  }
  else if ($password != $repassword) 
  {
      echo '<script type="text/javascript">swal("Thất Bại", " Nhập lại mật khẩu không đúng!", "error");</script>';
  }
  else
  {
    $create = $ketnoi->query("INSERT INTO `logs` SET 
    `content` = 'Khôi phục lại mật khẩu IP (".$ip_address."). ',
    `username` =  '".$get_username."',
    `createdate` =  now() ");
    $ketnoi->query("UPDATE users SET 
    password =  '".$password."' WHERE token = '".$id."' ");
    echo '<script type="text/javascript">swal("Thành Công","Cập nhật mật khẩu thành công!","success");
    setTimeout(function(){ location.href = "/" },1000);</script>';
  }
}

?> 


              <form role="form" action="" method="post">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Nhập mật khẩu mới" name="password" type="password">
                  </div>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Nhập lại mật khẩu mới" name="repassword" type="password">
                  </div>
                  
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4" name="submit">XÁC NHẬN</button>
                  <a type="button" class="btn btn-info mt-4" href="/quen-mat-khau/">QUÊN MẬT KHẨU</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





  <!--   Core   -->
  <script src="/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="/assets/js/argon-dashboard.min.js?v=1.1.2"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>