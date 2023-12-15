<?
session_start();
$admin = true;
include('../../home/config.php');

$uv_id = getValue("uv_id", "str", 'POST', '');
$uv_name = getValue("uv_name", "str", 'POST', '');
$uv_email = getValue("uv_email1", "str", 'POST', '');
$uv_pass = md5(getValue("uv_pass", "str", 'POST', ''));
$uv_phone = getValue("uv_phone", "str", 'POST', '');
$uv_sex = getValue("uv_sex", "str", 'POST', '');
$uv_birth = getValue("uv_birth", "str", 'POST', '');
$uv_city = getValue("uv_city", "str", 'POST', '');
$uv_district = getValue("uv_district", "str", 'POST', '');
$updated_at = date("Y-m-d");

$user_token = md5($uv_pass . $uv_email);

$list = [
    'phone'=>$uv_phone,
    'name'=>$uv_name,
    'password'=>$uv_pass,
    'city_id'=>$uv_city,
    'district_id'=>$uv_district,
    'sex'=>$uv_sex,
    'birthday'=>$uv_birth,
    'updated_at'=>$updated_at,
    'token'=>$user_token,
];
$condition = [
    'id_user' => $uv_id,
];

update('users', $list, $condition);


    header('Location: /admin/danh_sach_nha_tuyen_dung');
