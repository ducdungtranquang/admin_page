<?php
session_start();
$admin = true;
include('../../home/config.php');

$id  = getValue('id', 'int', 'POST', '');
$noidung      = getValue('noidung', 'str', 'POST', '');
$tieude_goiy  = getValue('tieude_goiy', 'str', 'POST', '');
$noidung_goiy = getValue('noidung_goiy', 'str', 'POST', '');

$skill = [
    'content'      => $noidung,
    'title_suggest'  => $tieude_goiy,
    'content_suggest' => $noidung_goiy,
];
$condition = [
    'id' => $id,
];

update('post_city_category', $skill, $condition);
echo json_encode([
    'result' => true,
    'msg'    => 'Update bài viết thành công',
]);