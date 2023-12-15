<?
session_start();
$admin = true;
include('../../home/config.php');

$id = getValue("id", "str", 'POST', '');
$skill_name = getValue("skill_name", "str", 'POST', '');
$cate_id = getValue("cate_id", "str", 'POST', '');

$list = [
    'skill_name'=>$skill_name,
    'category_id'=>$cate_id,
];
$condition = [
    'id_skill' => $id,
];
update('skills', $list, $condition);

header('Location: /admin/danh_sach_tag');
