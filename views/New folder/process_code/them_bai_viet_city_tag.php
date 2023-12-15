<?php
session_start();
$admin = true;
include('../../home/config.php');

$cit_id  = getValue('cit_id', 'int', 'POST', '');
$cate_id  = getValue('cate_id', 'int', 'POST', '');
$noidung      = getValue('noidung', 'str', 'POST', '');
$tieude_goiy  = getValue('tieude_goiy', 'str', 'POST', '');
$noidung_goiy = getValue('noidung_goiy', 'str', 'POST', '');
$created = date("Y-m-d");

$check_qr = new db_count("SELECT count(*) as count FROM post_city_category WHERE cit_id='$cit_id' AND skill_id='$cate_id'");

if ($check_qr->total == 0) {
    $selected_pr = new db_query("INSERT INTO post_city_category (`cit_id`,`skill_id`,`content`,`title_suggest`,`content_suggest`,`created_at`) VALUE ('$cit_id','$cate_id','$noidung','$tieude_goiy','$noidung_goiy','$created')");

    echo json_encode([
        'result' => true,
        'msg'    => 'Thêm bài viết thành công',
    ]);
} else {
    echo json_encode([
        'result' => false,
        'msg'    => 'Đã có bài viết',
    ]);
}
