
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
                <small>VUI LÒNG NHẬP THÔNG TIN ĐỂ TÌM LẠI MẬT KHẨU</small>
              </div>



              <form role="form" action="" method="post">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Nhập email để tìm lại mật khẩu" name="mail" type="email" required="">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4" name="submit">XÁC MINH</button>
                  <a type="button" class="btn btn-info mt-4" href="/quen-mat-khau/">QUÊN MẬT KHẨU</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



<?php
if (isset($_POST["submit"]))
{
  $mail = check_string($_POST['mail']);
  $get_username = $ketnoi->query("SELECT `username` FROM `users` WHERE `mail` = '".$mail."'  ")->fetch_array()['username'];
  $get_token = random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', '32');

  if ($mail == "") 
  {
      echo '<script type="text/javascript">swal("Thất Bại", " Không được để trống", "error");</script>';
  }
  else
  {
      $sql = "select * from users where mail = '".$mail."' ";
      $query = mysqli_query($ketnoi,$sql);
      $num_rows = mysqli_num_rows($query);
      
      if ($num_rows == 0) 
      {
          echo '<script type="text/javascript">swal("Thất Bại", " Email không tồn tại", "error");</script>';
      }
      else
      {  
        $ketnoi->query("UPDATE `users` SET `token` = '".$get_token."' WHERE `username` = '".$get_username."' ");
        $guitoi = $mail;   
        $subject = 'XÁC NHẬN KHÔI PHỤC MẬT KHẨU';
        $bcc = $site_tenweb;
        $hoten ='Client';
        $noi_dung = '<h3>Có ai đó vừa yêu cầu khôi phục lại mật khẩu bằng Email này, nếu là bạn vui lòng nhấn vào liên kết dưới đây để xác minh</h3>
        <table >
        <tbody>
        <tr>
        <td>Tài Khoản:</td>
        <td><b>'.$get_username.'</b></td>
        </tr>
        <tr>
        <td>Liên Kết Xác Minh:</td>
        <td><b style="color:blue;"><a href="'.$_SERVER['HTTP_HOST'].'/reset-password/'.$get_token.'">'.$_SERVER['HTTP_HOST'].'/reset-password/'.$get_token.'</a></b></td>
        </tr>
        </tbody>
        </table>';
        sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc);   
        echo '<script type="text/javascript">swal("Thành Công","Vui lòng kiểm tra hòm thư email của bạn!","success");
        setTimeout(function(){ location.href = "" },1000);</script>';

      }
  }
}

?> 




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