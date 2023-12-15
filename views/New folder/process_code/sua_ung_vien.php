<?
session_start();
$admin = true;
include('../../home/config.php');

$uv_id = getValue("uv_id1", "str", 'POST', '');
$uv_name = getValue("uv_name", "str", 'POST', '');
$uv_email = getValue("uv_email1", "str", 'POST', '');
$uv_pass = md5(getValue("uv_pass", "str", 'POST', ''));
$uv_phone = getValue("uv_phone", "str", 'POST', '');
$uv_sex = getValue("uv_sex", "str", 'POST', '');
$uv_birth = getValue("uv_birth", "str", 'POST', '');
$uv_city = getValue("uv_city", "str", 'POST', '');
$uv_district = getValue("uv_district", "str", 'POST', '');
$uv_exp = getValue("uv_exp", "str", 'POST', '');
$uv_des = getValue("uv_des", "str", 'POST', '');
$uv_job = getValue("uv_job", "str", 'POST', '');
$uv_jobtype = getValue("uv_jobtype", "str", 'POST', '');
$uv_jobdesire = getValue("uv_jobdesire", "str", 'POST', '');
$uv_citydesire = getValue("uv_citydesire", "str", 'POST', '');
$uv_luong = getValue("uv_luong", "str", 'POST', '');
$uv_luong1 = getValue("uv_luong1", "str", 'POST', '');
$uv_luong2 = getValue("uv_luong2", "str", 'POST', '');
$uv_ht_traluong = getValue("uv_ht_traluong", "str", 'POST', '');
$uv_linh_vuc = getValue("uv_linh_vuc", "str", 'POST', '');
$uv_skill = implode(",", getValue("uv_skill", "arr", 'POST', ''));
$ten_file = getValue("ten_file", "str", 'POST', '');
$uv_old_file = getValue("uv_old_file", "str", 'POST', '');
$updated_at = date("Y-m-d");


$user_token = md5($uv_pass . $uv_email);
$file_up=$uv_old_file;
$filename = "";
$time = time();

if ($_FILES['uv_file']['error'] == 0) {
    // $dir = "../".getcvuv($time);
    $filename = 'file_' . $time . "." . end(explode(".", $_FILES['uv_file']['name']));

    $y = date('Y', time());
    $m = date('m', time());
    $d = date('d', time());
    $dir = __DIR__ . "/../../files/" . $y;
    if (!is_dir($dir)) {
        mkdir($dir,0777);
    }
    if (!is_dir($dir . "/" . $m)) {
        mkdir($dir . "/" . $m,0777);
    }
    if (!is_dir($dir . "/" . $m . "/" . $d)) {
        mkdir($dir . "/" . $m . "/" . $d,0777);
    }
    $dir .= "/" . $m . "/" . $d;

    move_uploaded_file($_FILES['uv_file']['tmp_name'], $dir . '/' . $filename);
    $file_up = ('../files/' . $y . '/' . $m . '/' . $d . '/' . $filename);
    unlink("../" . $uv_old_file);
}

$list = [
    'phone'=>$uv_phone,
    'name'=>$uv_name,
    'password'=>$uv_pass,
    'city_id'=>$uv_city,
    'district_id'=>$uv_district,
    'sex'=>$uv_sex,
    'birthday'=>$uv_birth,
    'salary_type'=>'1',
    'salary_permanent_number'=>$uv_luong,
    'salary_estimate_number_1'=>$uv_luong1,
    'salary_salary_estimate_number_2'=>$uv_luong2,
    'salary_permanent_date'=>$uv_ht_traluong,
    'user_type'=>'0',
    'category_id'=>$uv_linh_vuc,
    'skill_year'=>$uv_exp,
    'skill_detail'=>$uv_skill,
    'updated_at'=>$updated_at,
    'user_des'=>$uv_des,
    'form_of_work'=>$uv_jobtype,
    'work_desire'=>$uv_jobdesire,
    'user_job'=>$uv_job,
    'work_place'=>$uv_citydesire,
    'ten_file'=>$ten_file,
    'file'=>$file_up,
    'token'=>$user_token,
];
$condition = [
    'id_user' => $uv_id,
];
update('users', $list, $condition);

echo "<script>alert('Chỉnh sửa thành công!');</script>";
header('Location: /admin/danh_sach_ung_vien');
