<?php
session_start();
$admin = true;
include('../../home/config.php');

$cit_id  = getValue('id', 'int', 'POST', '');
$noidung      = getValue('noidung', 'str', 'POST', '');
$tieude_goiy  = getValue('tieude_goiy', 'str', 'POST', '');
$noidung_goiy = getValue('noidung_goiy', 'str', 'POST', '');

$city = [
    'content'      => $noidung,
    'title_suggest'  => $tieude_goiy,
    'content_suggest' => $noidung_goiy,
];
$condition = [
    'cit_id' => $cit_id,
];

update('city', $city, $condition);
echo json_encode([
    'result' => true,
    'msg'    => 'Update bài viết thành công',
]);