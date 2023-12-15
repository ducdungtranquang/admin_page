<?
session_start();
$admin = true;
include('../../home/config.php');

$skill_name = getValue("skill_name", "str", 'POST', '');
$cate_id = getValue("cate_id", "str", 'POST', '');

$create_pr = new db_query("INSERT INTO skills (`skill_name`,`category_id`) VALUE ('$skill_name','$cate_id')");

header('Location: /admin/danh_sach_tag');
