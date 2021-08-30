<?php require_once('../head.php');?>
<head>
<title>Đổi Mật Khẩu | <?=$site_tenweb;?></title>
</head> 
<?php require_once('../nav.php');?>

<?php if(!isset($_SESSION['username']))
{
    echo '<script type="text/javascript">swal("Thất Bại", "Vui lòng đăng nhập để tiếp tục.", "error");
        setTimeout(function(){ location.href = "/dang-nhap/" },100);</script>';
    die();
}
?>

<?php
if (isset($_POST["btnChangePass"]) && isset($_SESSION['username'])) 
{
  $password = md5(check_string($_POST['password']));
  $newpassword = md5(check_string($_POST['newpassword']));
  $renewpassword = md5(check_string($_POST['renewpassword']));

  if (empty($password) || empty($newpassword) || empty($renewpassword))
  {
    echo '<script type="text/javascript">swal("Thất Bại", "Vui lòng nhập dữ liệu vào ô !", "error");</script>';
  }
  else if ($password != $my_password)
  {
    echo '<script type="text/javascript">swal("Thất Bại", "Mật khẩu hiện tại không đúng !", "error");</script>';
  }
  else if ($newpassword != $renewpassword)
  {
    echo '<script type="text/javascript">swal("Thất Bại", "Xác nhận mật khẩu không đúng !", "error");</script>';
  }
  else 
  {
    $create = $ketnoi->query("UPDATE users SET password = '$newpassword' WHERE username = '$my_username' ");
    if ($create)
    {
      echo '<script type="text/javascript">swal("Thành Công", "Thay đổi mật khẩu thành công !", "success");
        setTimeout(function(){ location.href = "" },1000);</script>';
      die();
    }
    else
    {
      echo '<script type="text/javascript">swal("Thất Bại", "Không thể kết nối DATABASE !", "error");</script>';
    }
  }
}
?>

 <!-- End Navbar -->
    <!-- Header -->
<div class="header bg-gradient pb-8 pt-5 pt-md-8" style="background-color: <?=$site_color;?>">      <!-- Mask -->
      <span class="mask bg-gradient opacity-8" style="background-color: <?=$site_color1;?>;"></span>
</div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="<?=$my_avt;?>" width="200%" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">

              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">

                   
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  <?=$my_username;?>
                </h3>
                <h3>
                  <?=format_cash($my_vnd);?> <?=$site_currency;?>
                </h3>
                <hr class="my-4" />
                <a href="/nap-tien/" class="btn btn-success">NẠP TIỀN</a>
                <a href="/doi-mat-khau/" class="btn btn-danger">ĐỔI MẬT KHẨU</a>
                <a href="/dang-xuat/" class="btn btn-info">THOÁT</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Thay Đổi Mật Khẩu</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form enctype="multipart/form-data" action="" method="post">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Mật Khẩu Hiện Tại</label>
                        <input type="password"  class="form-control form-control-alternative" name="password" placeholder="Nhập mật khẩu hiện tại" required="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Mật Khẩu Mới</label>
                        <input type="password"  class="form-control form-control-alternative" name="newpassword" placeholder="Nhập mật khẩu mới" required="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Xác Nhận Mật Khẩu</label>
                        <input type="password"  class="form-control form-control-alternative" name="renewpassword" placeholder="Nhập lại mật khẩu mới" required="">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <button  type="submit" name="btnChangePass" class="btn btn-info">Xác Nhận</button>
              </form>
            </div>
          </div>
        </div>

      </div>


<?php include('../foot.php');?>          