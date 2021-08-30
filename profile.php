<?php include('head.php');?>
<head>
<title>Profile | <?=$site_tenweb;?></title>
</head> 
<?php include('nav.php');?>

<?php if(!isset($_SESSION['username']))
{
    echo '<script type="text/javascript">swal("Thất Bại", "Vui lòng đăng nhập để tiếp tục.", "error");
        setTimeout(function(){ location.href = "/dang-nhap/" },100);</script>';
    die();
}
?>

<?php
if (isset($_POST["btnChangeInfo"]) && isset($_SESSION['username'])) 
{

  $fullname = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['fullname']))));
  $phone = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['phone']))));
  $idfb = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['idfb']))));
  $mail = check_string($_POST['mail']);

  if (check_img('avt') == true)
  {
    $uploads_dir = 'upload/avt/';
    $tmp_name = $_FILES['avt']['tmp_name'];
    $create = move_uploaded_file($tmp_name, "$uploads_dir/$my_username.png");
    if($create)
    {
      $link_img = '/upload/avt/'.$my_username.'.png';
      $ketnoi->query("UPDATE users SET avt = '$link_img' WHERE username = '$my_username' ");
    }
  }
  mysqli_query($ketnoi,"UPDATE users SET 
    fullname =  '$fullname',
    phone =  '$phone',
    mail = '$mail',
    id_facebook =  '$idfb'
    WHERE username = '".$_SESSION['username']."'");

  echo '<script type="text/javascript">swal("Thành Công","Cập nhật thông tin thành công !","success");
  setTimeout(function(){ location.href = "" },1000);</script>';
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
                  <h3 class="mb-0">Thông Tin Tài Khoản</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div>
              </div>
            </div>
            <div class="card-body">
<div class="nav-wrapper">
    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-settings-gear-65 mr-2"></i>CÀI ĐẶT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>NHẬT KÝ</a>
        </li>
    </ul>
</div>

          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
             <form enctype="multipart/form-data" action="" method="post">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" value="<?=$my_username;?>" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email</label>
                        <input type="email" name="mail" class="form-control form-control-alternative" value="<?=$my_mail;?>" required="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Họ và Tên</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" name="fullname" placeholder="Nhập họ và tên của bạn" value="<?=$my_fullname;?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Ảnh Đại Diện</label>
                        <input class="form-control form-control-alternative" type="file" name="avt" id="files" onchange="readURL(this);"  accept="image/*" multiple>
                      </div>

                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Số Điện Thoại</label>
                        <input type="number" id="input-first-name" class="form-control form-control-alternative" name="phone" placeholder="Nhập số điện thoại của bạn" value="<?=$my_phone;?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">ID Facebook</label>
                        <input type="number" id="input-first-name" class="form-control form-control-alternative" placeholder="Nhập ID Facebook của bạn" name="idfb" value="<?=$my_idfb;?>">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <button  type="submit" name="btnChangeInfo" class="btn btn-info">Lưu Thông Tin</button>
              </form>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                <div class="table-responsive">
              <table id="datatable1" class="table table-bordered table-striped">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center" scope="col">STT</th>
                    <th scope="col">NỘI DUNG</th>
                    <th class="text-center" scope="col">THỜI GIAN</th>
                  </tr>
                </thead>
                <tbody>
<?php
$i = 0;
$result = mysqli_query($ketnoi,"SELECT * FROM `log` WHERE `username` = '".$my_username."' ORDER BY id desc limit 0, 100");
while($row = mysqli_fetch_assoc($result))
{
?>
                  <tr>
                    <td class="text-center"><?=$i;?></td>
                    <td><?=$row['content'];?></td>
                    <td class="text-center"><span class="badge badge-default text-white"><?=$row['createdate'];?></span></td>
                    
                  </tr>
<?php $i++; }?>
                </tbody>
              </table>
            </div>

            </div>
        </div>

            </div>
          </div>
        </div>

      </div>

<script>     
function readURL(input)
{
  if (input.files && input.files[0])
  {
      var reader = new FileReader();
      reader.onload = function (e)
      {
          $('#blah').attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
  }
}
</script>
<?php include('foot.php');?>          