
<?php include('head.php');?>
<head>
<title>Đăng Nhập | <?=$site_tenweb;?></title>
</head> 
<body style="background:url(<?=$bg_login;?>); background-repeat: no-repeat; background-size: cover;">
  <div class="main-content" >
  <?php require_once('./system/menu-login.php');?>
    <!-- Header -->
    <div class="header bg-gradient py-7 py-lg-8">
      <div class="container" >
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <p class="text-white"><?=$site_text_login;?></p>
            </div>
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
            <div class="card-header bg-transparent pb-5">
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
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>VUI LÒNG NHẬP THÔNG TIN ĐỂ ĐĂNG NHẬP</small>
              </div>

<?php
if (isset($_POST["btnLogin"]))
{
  $username = check_string($_POST['username']);
  $password = check_string($_POST['password']);
  $password = md5($password);
  if (empty($username) || empty($password) ) 
  {
    echo '<script type="text/javascript">swal("Thất Bại", " Không được để trống tên đăng nhập hoặc mật khẩu", "error");</script>';
  }
  else
  {
    $query = $ketnoi->query("select * from users where username = '$username' and password = '$password' ");
    if (mysqli_num_rows($query) == 0) 
    {
      echo '<script type="text/javascript">swal("Thất Bại", " Thông tin đăng nhập không chính xác !!!", "error");</script>';
    }
    else
    {
      $_SESSION['username'] = $username;
      $ketnoi->query("UPDATE `users` SET ip =  '".$ip_address."' WHERE `username` = '".$username."'");
      $ketnoi->query("INSERT INTO `log` SET 
        `content`= 'Đăng nhập vào hệ thống!',
        `createdate` = now(),
        `username`= '".$_SESSION['username']."' ");
      echo '<script type="text/javascript">swal("Thành Công","Đăng Nhập Thành Công","success");
          setTimeout(function(){ location.href = "/home/" },1000);</script>';
      exit();
    }
  }
}
?> 


              <form role="form" action="" method="post">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Tài khoản" name="username" type="text"  required="">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" name="password" type="password" required="">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4" name="btnLogin">ĐĂNG NHẬP</button>
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