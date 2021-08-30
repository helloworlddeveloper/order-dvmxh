
<?php include('head.php');?>
<head>
<title>Đăng Ký | <?=$site_tenweb;?></title>
</head> 

<body style="background:url(<?=$bg_login;?>); background-repeat: no-repeat; background-size: cover;">
  <div class="main-content" >
    <?php require_once('./system/menu-login.php');?>
    <!-- Header -->
    <div class="header bg-gradient py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <?=$site_text_login;?>
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
                <small>Vui lòng nhập thông tin để đăng ký tài khoản</small>
              </div>

<?php
if (isset($_POST["btnDangKy"]))
{
  $username = check_string($_POST['username']);
  $password = check_string($_POST['password']);
  $repassword = check_string($_POST['repassword']);
  $email = check_string($_POST['email']);
  $password = md5($password);
  $repassword = md5($repassword);
  $query_user_dangky = mysqli_query($ketnoi,"SELECT * FROM `users` WHERE `username` = '".$username."' ");
  $query_email_dangky = mysqli_query($ketnoi,"SELECT * FROM `users` WHERE `mail` = '".$username."' ");
  $partten = "/^[A-Za-z0-9_\.]{6,32}$/";
  if (empty($username) || empty($password) || empty($email) )
  {
    echo '<script type="text/javascript">swal("Thất Bại", " Vui lòng nhập đầy đủ thông tin!", "error");</script>';
  }
  else if(!preg_match($partten ,$username, $matchs))
  {
    echo '<script type="text/javascript">swal("Thất Bại", " Username không đúng định dạng!", "error");</script>';
  }
  else if($password != $repassword)
  {
    echo '<script type="text/javascript">swal("Thất Bại", " Nhập lại mật khẩu không chính xác!", "error");</script>';
  }
  else if(mysqli_num_rows($query_user_dangky)  > 0)
  {
    echo '<script type="text/javascript">swal("Thất Bại", " Tên đăng nhập này đã được sử dụng!", "error");</script>';
  } 
  else if(mysqli_num_rows($query_email_dangky)  > 0)
  {
    echo '<script type="text/javascript">swal("Thất Bại", " Email đã tồn tại!", "error");</script>';
  }
  else
  {
    $create = $ketnoi->query("INSERT INTO `users` SET 
    `username` = '".$username."',
    `password` = '".$password."',
    `mail` = '".$email."',
    `ip` = '".$ip_address."',
    `createdate` = now() ");
    if ($create)
    {
      $ketnoi->query("INSERT INTO `log` SET 
      `content`= 'Đăng ký tài khoản!',
      `createdate` = now(),
      `username`= '".$username."' ");
      $_SESSION['username'] = $username;
      echo '<script type="text/javascript">swal("Thành Công","Đăng ký tài khoản thành công","success");
      setTimeout(function(){ location.href = "/" },1000);</script>';
      die;
    }
    else
    {
      echo '<script type="text/javascript">swal("Thất Bại","Vui lòng liên hệ kỹ thuật","error");
      setTimeout(function(){ location.href = "" },1000);</script>'; 
      die;
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
                    <input class="form-control" placeholder="Tài khoản" name="username" type="text" required="">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" name="email" type="email" required="">
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
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Nhập lại Password" name="repassword" type="password" required="">
                  </div>
                </div>
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                      <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted">Chấp nhận <a href="#!">điều khoản</a> khi đăng ký</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4" name="btnDangKy">Đăng Ký</button>
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