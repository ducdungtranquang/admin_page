<?
session_start();
$admin = true;
include('../../home/config.php');

$cit_id = getValue("cit_id", "str", 'GET', '');
$cate_id = getValue("cate_id", "str", 'GET', '');

$check_qr = new db_count("SELECT count(*) as count FROM post_city_category WHERE cit_id='$cit_id' AND category_id='$cate_id'");

if ($check_qr->total == 0) {
    echo json_encode([
        'result' => true,
        'msg'    => 'Chưa có bài viết',
    ]);
} else {
    echo json_encode([
        'result' => false,
        'msg'    => 'Đã có bài viết',
    ]);
}
