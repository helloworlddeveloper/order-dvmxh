<?php
require_once('config.php');
error_reporting(0);

if ( isset($_GET['content']) && isset($_GET['status']) )
{
    $code = check_string($_GET['content']);
    $card = $ketnoi->query("SELECT * FROM card WHERE code = '$code' ")->fetch_array();

    if ($_GET['status'] == 'hoantat')
    {
        $ketnoi->query("UPDATE card SET status = 'thanhcong' WHERE status = 'xuly' AND code = '".$code."'");
        $ketnoi->query("UPDATE users SET 
            `money` = `money` + '".$card['thucnhan']."',
            `total_nap` = `total_nap` + '".$card['thucnhan']."'
            WHERE `username` = '".$card['username']."' ");
        $ketnoi->query("INSERT INTO `log` SET 
        `content`= 'Nạp tiền qua thẻ cào seri ".$card['seri']." ',
        `createdate` = now(),
        `username`= '".$card['username']."' ");
            
    }
    else if ($_GET['status'] == 'thatbai')
    {
        $ketnoi->query("UPDATE card SET status = 'thatbai' WHERE status = 'xuly' AND code = '".$code."'"); 
    }
}
else
{   
    echo json_encode(array('status' => "error", 'msg' => "Cái quát đờ phắc gì vậy?"));
}


?>