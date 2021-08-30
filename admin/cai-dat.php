
<?php include('head.php');?>
<?php include('nav.php');?>

<?php
if (isset($_POST["btnSave"]) && isset($_SESSION["admin"]))
{
    $random = random("1234567890", 4);
  if (check_img('logo') == true)
  {
    $uploads_dir = '../upload/';
    $tmp_name = $_FILES['logo']['tmp_name'];
    $create = move_uploaded_file($tmp_name, "$uploads_dir/logo_$random.png");
    if($create)
    {
      $ketnoi->query("UPDATE setting SET logo = '/upload/logo_$random.png' ");
    }
  }
  if (check_img('site_logo1') == true)
  {
    $uploads_dir = '../upload/';
    $tmp_name = $_FILES['site_logo1']['tmp_name'];
    $create = move_uploaded_file($tmp_name, "$uploads_dir/Logo1_$random.png");
    if($create)
    {
      $ketnoi->query("UPDATE setting SET site_logo1 = '/upload/Logo1_$random.png' ");
    }
  }
  if (check_img('site_favicon') == true)
  {
    $uploads_dir = '../upload/';
    $tmp_name = $_FILES['site_favicon']['tmp_name'];
    $create = move_uploaded_file($tmp_name, "$uploads_dir/favicon_$random.png");
    if($create)
    {
      $ketnoi->query("UPDATE setting SET site_favicon = '/upload/favicon_$random.png' ");
    }
  }
  if (check_img('site_img') == true)
  {
    $uploads_dir = '../upload/';
    $tmp_name = $_FILES['site_img']['tmp_name'];
    $create = move_uploaded_file($tmp_name, "$uploads_dir/thumb_$random.png");
    if($create)
    {
      $ketnoi->query("UPDATE setting SET site_img = '/upload/thumb_$random.png' ");
    }
  }
  if (check_img('bg_login') == true)
  {
    $uploads_dir = '../upload/';
    $tmp_name = $_FILES['bg_login']['tmp_name'];
    $create = move_uploaded_file($tmp_name, "$uploads_dir/bgLogin_$random.png");
    if($create)
    {
      $ketnoi->query("UPDATE setting SET bg_login = '/upload/bgLogin_$random.png' ");
    }
  }
  $create = mysqli_query($ketnoi,"UPDATE `setting` SET 
    `site_color_nav` = '".$_POST['site_color_nav']."',
    `MEMO_PREFIX` = '".$_POST['MEMO_PREFIX']."',
    `site_gmail_momo` = '".$_POST['site_gmail_momo']."',
    `site_pass_momo` = '".$_POST['site_pass_momo']."',
    `site_sdt_momo` = '".$_POST['site_sdt_momo']."',
    `site_ten_momo` = '".$_POST['site_ten_momo']."',
    `site_qr_momo` = '".$_POST['site_qr_momo']."',
    `site_gmail` = '".$_POST['site_gmail']."',
    `tenweb` = '".$_POST['tenweb']."',
    `mota` = '".$_POST['mota']."',
    `baotri` = '".$_POST['baotri']."',
    `status_top` = '".$_POST['status_top']."',
    `status_order` = '".$_POST['status_order']."',
    `id_fb` = '".$_POST['idfb']."',
    `api` = '".$_POST['api']."',
    `thong_bao_chay` = '".$_POST['thong_bao_chay']."',
    `text_xac_minh_giao_dich` = '".$_POST['text_xac_minh_giao_dich']."',
    `text_nap_tien` = '".$_POST['text_nap_tien']."',
    `cookie` = '".$_POST['cookie']."',
    `currency` = '".$_POST['currency']."',
    `ck_nap_the` = '".$_POST['ck_nap_the']."',
    `color` = '".$_POST['color']."',
    `color1` = '".$_POST['color']."',
    `thongbao` = '".$_POST['thongbao']."',
    `tukhoa` = '".$_POST['tukhoa']."' ");

  if ($create)
  {
    echo '<script type="text/javascript">swal("Thành Công","Lưu thành công","success");setTimeout(function(){ location.href = "" },1000);</script>'; 
  }
  else
  {
    echo '<script type="text/javascript">swal("Lỗi","Lỗi máy chủ","error");setTimeout(function(){ location.href = "" },1000);</script>'; 
  }
}

?>
<div class="row mb-2">
  <div class="col-sm-6">

  </div><!-- /.col -->
</div><!-- /.row -->

<form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
        <div class="row">
          <div class="col-md-12">
            <button name="btnSave" type="submit" class="btn btn-info btn-block">LƯU THAY ĐỔI</button>
          </div>

          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                Cấu hình giao diện
              </div>
              <!-- /.card-header -->
              <div class="card-body">  
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="exampleInputFile">Upload Favicon</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="site_favicon" accept="image/*">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <img src="<?=$site_favicon;?>" width="100%">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="exampleInputFile">Upload Bìa Website</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="site_img" accept="image/*">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <img src="<?=$site_img;?>" width="100%">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="exampleInputFile">Upload Logo</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="logo" accept="image/*">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <img src="<?=$site_logo;?>" width="100%">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Upload Logo Login</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="site_logo1" accept="image/*">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <img src="<?=$site_logo1;?>" width="100%">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="exampleInputFile">Upload Background Login</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="bg_login" accept="image/*">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <img src="<?=$bg_login;?>" width="100%">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="example-color-input" class="form-control-label">Color</label>
                      <input class="form-control" type="color" value="<?=$site_color;?>" name="color">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="example-color-input" class="form-control-label">Color Nav</label>
                      <input class="form-control" type="color" value="<?=$site_color_nav;?>" name="site_color_nav">
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                Cấu hình thông tin web
              </div>
              <!-- /.card-header -->
              <div class="card-body">  
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">TÊN WEB</label>
                      <input type="text" class="form-control" name="tenweb" value="<?=$site_tenweb;?>"  >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">MÔ TẢ</label>
                      <input type="text" class="form-control" name="mota" value="<?=$site_mota;?>"  >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">TỪ KHÓA</label>
                      <input type="text" class="form-control" name="tukhoa" value="<?=$site_tukhoa;?>"  >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">API CARD24H.COM</label>
                      <input type="text" class="form-control" name="api" value="<?=$site_api;?>"  >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">ID FB ADMIN</label>
                      <input type="text" class="form-control" name="idfb" value="<?=$site_idfb;?>"  >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">GMAIL ADMIN</label>
                      <input type="text" class="form-control" name="site_gmail" value="<?=$site_gmail;?>"  >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">COOKIE BOT</label>
                      <textarea class="form-control"  name="cookie"><?=$site_cookie;?></textarea>
                    </div>
                  </div>

                </div>
            </div>
          </div>
        </div>

        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                Cấu hình MOMO AUTO
              </div>
              <!-- /.card-header -->
              <div class="card-body">  
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">GMAIL LIÊN KẾT MOMO</label>
                      <input type="text" class="form-control" name="site_gmail_momo" value="<?=$site_gmail_momo;?>"  >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">MẬT KHẨU GMAIL</label>
                      <input type="password" class="form-control" name="site_pass_momo" value="<?=$site_pass_momo;?>"  >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">SỐ ĐIỆN THOẠI MOMO</label>
                      <input type="text" class="form-control" name="site_sdt_momo" value="<?=$site_sdt_momo;?>"  >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">TÊN CHỦ VÍ MOMO</label>
                      <input type="text" class="form-control" name="site_ten_momo" value="<?=$site_ten_momo;?>"  >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">LINK ẢNH QR MOMO</label>
                      <input type="text" class="form-control" name="site_qr_momo" value="<?=$site_qr_momo;?>"  >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">NỘI DUNG</label>
                      <input type="text" class="form-control" name="MEMO_PREFIX" value="<?=$site['MEMO_PREFIX'];?>"  >
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>

          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                Cấu hình chung
              </div>
              <!-- /.card-header -->
              <div class="card-body">                
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">TIỀN TỆ</label>
                    <input type="text" class="form-control" name="currency" value="<?=$site_currency;?>"  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">CHIẾT KHẤU NẠP THẺ</label>
                    <input type="text" class="form-control" name="ck_nap_the" value="<?=$site_ck_nap_the;?>"  >
                  </div>
                  <div class="form-group">
                  <label>ON/OFF BẢO TRÌ</label>
                    <select class="form-control select2bs4" name="baotri" style="width: 100%;">
                      <option value="<?=$site_baotri;?>" ><?=$site_baotri;?></option>
                      <option value="ON">ON</option>
                      <option value="OFF">OFF</option>
                    </select>
                  </div>
                  <div class="form-group">
                  <label>ON/OFF TOP NẠP TIỀN</label>
                    <select class="form-control select2bs4" name="status_top" style="width: 100%;">
                      <option value="<?=$site_status_top;?>" ><?=$site_status_top;?></option>
                      <option value="ON">ON</option>
                      <option value="OFF">OFF</option>
                    </select>
                  </div>
                  <div class="form-group">
                  <label>ON/OFF ORDER</label>
                    <select class="form-control select2bs4" name="status_order" style="width: 100%;">
                      <option value="<?=$site_status_order;?>" ><?=$site_status_order;?></option>
                      <option value="ON">ON</option>
                      <option value="OFF">OFF</option>
                    </select>
                  </div>
              </div>
              <div class="col-md-6">
                
                <div class="form-group">
                    <label for="exampleInputEmail1">THÔNG BÁO CHẠY</label>
                    <textarea class="form-control"  name="thong_bao_chay"><?=$site_thong_bao_chay;?></textarea>
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Text Xác Minh Giao Dịch</label>
                    <textarea class="textarea" name="text_xac_minh_giao_dich" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$site_text_xac_minh_giao_dich;?></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Text Nạp Tiền</label>
                    <textarea class="textarea" name="text_nap_tien" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$site_text_nap_tien;?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Thông Báo</label>
                  <textarea class="textarea" name="thongbao" placeholder="Place some text here"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$site_thongbao;?></textarea>
                </div>
              </div>  
                </div>
               
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
</form> 

<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<?php include('foot.php');?>