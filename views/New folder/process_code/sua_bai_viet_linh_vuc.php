<?php
session_start();
$admin = true;
include('../../home/config.php');

$cate_id  = getValue('id', 'int', 'POST', '');
$noidung      = getValue('noidung', 'str', 'POST', '');
$tieude_goiy  = getValue('tieude_goiy', 'str', 'POST', '');
$noidung_goiy = getValue('noidung_goiy', 'str', 'POST', '');

$cate = [
    'content'      => $noidung,
    'title_suggest1'  => $tieude_goiy,
    'content_suggest' => $noidung_goiy,
];
$condition = [
    'id_category' => $cate_id,
];

update('category', $cate, $condition);
echo json_encode([
    'result' => true,
    'msg'    => 'Update bài viết thành công',
]);