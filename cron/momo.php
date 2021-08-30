<?php
    require_once "../config.php";

    /* ĐƠN VỊ THIẾT KẾ WEB WWW.CMSNT.CO | ZALO 0947838128 | FB.COM/NTGTANETWORK */

    $token = ''; // NHẬP TOKEN MOMO VÀO ĐÂY
    $result = curl_get("https://api.web2m.com/historyapimomo/$token");
    $result = json_decode($result, true);
    foreach($result['momoMsg']['tranList'] as $data)
    {
        $partnerId      = $data['partnerId'];               // SỐ ĐIỆN THOẠI CHUYỂN
        $comment        = $data['comment'];                 // NỘI DUNG CHUYỂN TIỀN
        $tranId         = $data['tranId'];                  // MÃ GIAO DỊCH
        $partnerName    = $data['partnerName'];             // TÊN CHỦ VÍ
        $id             = parse_order_id($comment);         // TÁCH NỘI DUNG CHUYỂN TIỀN
        $amount         = $data['amount'];
        $money          = $amount;
        //Xử lý giao dịch
        if ($id)
        {
            $check_code = $ketnoi->query("SELECT * FROM momo WHERE tranId = '$tranId' ");
            $check_username = $ketnoi->query("SELECT * FROM users WHERE id = '$id' ");
            if($check_username)
            {
                $array_user = $check_username->fetch_array();
                if($check_code->fetch_assoc() == 0)
                {
                    $money = str_replace('.', '', $money);
                    $create = $ketnoi->query("INSERT INTO momo SET 
                        `tranId` = '$tranId',
                        `username` = '".$array_user['username']."',
                        `comment` = '$comment',
                        `time` = now(),
                        `partnerId` = '$partnerId',
                        `amount` = '$money',
                        `partnerName` = '$partnerName' ");
                        
                    if ($create)
                    {
                        $ketnoi->query("INSERT INTO `log` SET 
                        `content`= '+ ".format_cash($money)."  lý do: Nạp MOMO Auto  #".$tranId." ',
                        `createdate` = now(),
                        `username`= '".$array_user['username']."' ");
                        $ketnoi->query("UPDATE users SET 
                        `money` = `money` + '".$money."',
                        `total_nap` = `total_nap` + '".$money."' WHERE `username` = '".$array_user['username']."' ");
                    }
                }
            }
        }
    }
?>