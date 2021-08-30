<?php include('../head.php');?>

<head>
    <title>Nạp Tiền | <?=$site_tenweb;?></title>
</head>
<?php include('../nav.php');?>
<?php if(!isset($_SESSION['username']))
{
    echo '<script type="text/javascript">swal("Thất Bại", "Vui lòng đăng nhập để tiếp tục.", "error");
        setTimeout(function(){ location.href = "/dang-nhap/" },100);</script>';
    die();
}
?>

<div class="header bg-gradient pb-8 pt-5 pt-md-8" style="background-color: <?=$site_color;?>">
    <!-- Mask -->
    <span class="mask bg-gradient opacity-8" style="background-color: <?=$site_color1;?>;"></span>
    <!-- Header container -->
</div>

<div class="container-fluid mt--7">



    <div class="row">
        <div class="col-xl-6">
            <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#napbank">
                NẠP QUA NGÂN HÀNG AUTO
            </button>
        </div>
        <div class="col-xl-6">
            <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#momo">
                NẠP QUA MOMO AUTO
            </button>
        </div>
    </div>
    <br>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-text"><?=$site_text_nap_tien;?></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="momo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">NẠP TIỀN TỰ ĐỘNG QUA VÍ MOMO</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h2>Thông Tin ví MOMO</h2>

                    <h3>Số Điện Thoại: <b><?=$site_sdt_momo;?></b> <a data-toggle="collapse" data-target="#qr"><i
                                class="fa fa-qrcode" aria-hidden="true"></i></a></h3>
                    <h3>Chủ Tài Khoản: <b><?=$site_ten_momo;?></b></h3>
                    <h3>Nội Dung: <b class="text-danger"
                            style="border: 2px dashed #e04f1a30; padding: 3px; color: #e53e3e!important;"
                            id="copyNoiDung"><?=$site['MEMO_PREFIX'].$my_id;?></b>
                        <a class="copy" data-clipboard-target="#copyNoiDung"><i class="fa fa-copy"></i></a></h3>
                    <div id="qr" class="collapse">
                        <img src="<?=$site_qr_momo;?>" width="100%">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="napbank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">THÔNG TIN CHUYỂN KHOẢN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="exampleInputPassword1">NỘI DUNG CHUYỂN TIỀN</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="<?=$site['MEMO_PREFIX'].$my_id;?>" id="myInput"
                            readonly>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit" onclick="myFunction()"
                                onmouseout="outFunc()">COPY</button>
                        </div>
                    </div>
                    <h4 class="text-center">VUI LÒNG CHUYỂN ĐẾN 1 TRONG CÁC NGÂN HÀNG DƯỚI ĐÂY</h4>
                    <h5>Lưu Ý: chuyển chính xác nội dung chuyển tiền để QTV xử lý giao dịch.</h5>
                    <?php
$result = mysqli_query($ketnoi,"SELECT * FROM `bank` ORDER BY id desc ");
while($row = mysqli_fetch_assoc($result))
{
?>
                    <hr>
                    <ul>
                        <li>Tên Ngân Hàng: <b><?=$row['name'];?></b></li>
                        <li>Số Tài Khoản: <b><?=$row['stk'];?></b></li>
                        <li>Chủ Tài Khoản: <b><?=$row['bank_name'];?></b></li>
                        <li>Chi Nhánh: <b><?=$row['chi_nhanh'];?></b></li>
                    </ul>
                    <?php }?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-4 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">NẠP THẺ TỰ ĐỘNG</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="#!" class="btn btn-sm btn-primary">PHÍ <?=$site_ck_nap_the;?>%</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="" accept-charset="UTF-8">
                        <div class="form-group">
                            <label for="email">Loại Thẻ:</label>
                            <select class="form-control form-control-alternative" name="loaithe" id="loaithe" required>
                                <option value="">Chọn loại thẻ *</option>
                                <option value="Viettel">Viettel</option>
                                <option value="Vinaphone">Vinaphone</option>
                                <option value="Mobifone">Mobifone</option>
                                <option value="Zing">Zing</option>
                                <option value="Vietnamobile">Vietnamobile</option>
                            </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="email">Mệnh Giá:</label>
                            <select class="form-control form-control-alternative" name="menhgia" id="menhgia" required>
                                <option value="">Chọn mệnh giá *</option>
                                <option value="10000">10.000</option>
                                <option value="20000">20.000</option>
                                <option value="30000">30.000</option>
                                <option value="50000">50.000</option>
                                <option value="100000">100.000</option>
                                <option value="200000">200.000</option>
                                <option value="300000">300.000</option>
                                <option value="500000">500.000</option>
                                <option value="1000000">1.000.000</option>
                            </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="email">Seri:</label>
                            <input type="text" class="form-control form-control-alternative" name="seri" required="">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mã Thẻ:</label>
                            <input type="text" class="form-control form-control-alternative" name="pin" required="">
                        </div>
                        <div class="form-group">
                            <div class="alert alert-default" role="alert">
                                <h3 class="text-center text-white"> Thực nhận: <span id="ketqua"
                                        style="color: yellow;">0</span></h3>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <button type="submit" name="submit_napthe" class="btn btn-primary ">NẠP THẺ</button>
                    </form>
                </div>
            </div>
        </div>
        <?php

if(isset($_POST["submit_napthe"])) 
{
  if(isset($_SESSION['username']))
  {
    $loaithe = check_string($_POST['loaithe']);
    $menhgia = check_string($_POST['menhgia']);
    $seri = check_string($_POST['seri']);
    $pin = check_string($_POST['pin']);
    $code = random('qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM', 12);

    $thucnhandoithe = $menhgia - $menhgia * $site_ck_nap_the / 100;

    if (strlen($seri) < 5 || strlen($pin) < 5)
    {
        echo '<script type="text/javascript">swal("Thất Bại","Mã thẻ hoặc seri không đúng định dạng!","error");</script>';
    }
    else
    {
        $json = json_decode(curl_get('https://card24h.com/api/card-auto.php?auto=true&type='.$loaithe.'&menhgia='.$menhgia.'&seri='.$seri.'&pin='.$pin.'&APIKey='.$site_api.'&callback='.$site_callback.'&content='.$code), true);
        if (isset($json['data']))
        {
            if ($json['data']['status'] == 'error')
            {
                echo '<script type="text/javascript">swal("Thất Bại","'.$json['data']['msg'].'","error");</script>';
            }
            else if ($json['data']['status'] == 'success')
            {
              $create = mysqli_query($ketnoi,"INSERT INTO `card` SET
              `username` = '".$my_username."',
              `code` = '".$code."',
              `type` = '".$loaithe."',
              `amount` = '".$menhgia."',
              `thucnhan` = '".$thucnhandoithe."',
              `seri` = '".$seri."',
              `pin` = '".$pin."',
              `status` = 'xuly',
              `createdate` = now() ");
              die('<script type="text/javascript">swal("Thành Công","'.$json['data']['msg'].'","success");setTimeout(function(){ location.href = "" },1000);</script>');
            }
        }
    }
  }
  else
  {
    die('<script type="text/javascript">swal("Thất Bại", "Vui lòng đăng nhập để tiếp tục", "error");setTimeout(function(){ location.href = "/dang-nhap/" },1000);</script>');
  }
}
?>


        <div class="col-xl-8 order-xl-2">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">LỊCH SỬ NẠP THẺ</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead class="thead-light">
                                <tr class="text-center">
                                    <th scope="col">STT</th>
                                    <th scope="col">LOẠI THẺ</th>
                                    <th scope="col">MỆNH GIÁ</th>
                                    <th scope="col">THỰC NHẬN</th>
                                    <th scope="col">SERI/PIN</th>
                                    <th scope="col">TRẠNG THÁI</th>
                                    <th scope="col">GHI CHÚ</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$i = 0;
$result = mysqli_query($ketnoi,"SELECT * FROM `card` WHERE `username` = '".$my_username."' ORDER BY id desc limit 0, 100");
while($row = mysqli_fetch_assoc($result))
{
?>
                                <tr class="text-center">
                                    <td><?=$i;?> <?php $i++; ?></td>
                                    <td><?=$row['type'];?></td>
                                    <td>
                                        <?=format_cash($row['amount']);?>đ
                                    </td>
                                    <td>
                                        <?=format_cash($row['thucnhan']);?>đ
                                    </td>
                                    <td>
                                        <?=$row['seri'];?> / <?=$row['pin'];?>
                                    </td>
                                    <td>
                                        <?=status($row['status']);?>
                                    </td>
                                    <td>
                                        <?=$row['note'];?>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");

        var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = "Copied: " + copyText.value;
    }

    function outFunc() {
        var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = "Copy to clipboard";
    }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript">
    $('#menhgia').on('change', function() {
        var menhgia = $('#menhgia').val();
        var ck = <?=$site_ck_nap_the;?>;
        var ketqua = menhgia - menhgia * ck / 100;
        $('#ketqua').html(ketqua.toString().replace(/(.)(?=(\d{3})+$)/g, '$1,'));


    });
    </script>
    <?php include('../foot.php');?>