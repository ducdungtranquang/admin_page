<?
session_start();
$admin = true;
include('../../home/config.php');

$id_job= getValue('id_job','str','POST','');
// $ntd_id = getValue("uv_name", "str", 'POST', '');
$job_name = getValue("job_name", "str", 'POST', '');
$uv_city = getValue("uv_city", "str", 'POST', '');
$uv_linh_vuc = getValue("uv_linh_vuc", "str", 'POST', '');
$uv_skill = implode(",", getValue("uv_skill", "arr", 'POST', ''));
$uv_jobtype = getValue("uv_jobtype", "arr", 'POST', '');
$uv_exp = getValue("uv_exp", "arr", 'POST', '');
$uv_des = getValue("uv_des", "str", 'POST', '');
$uv_luong = getValue("uv_luong", "str", 'POST', '');
$uv_luong1 = getValue("uv_luong1", "str", 'POST', '');
$uv_luong2 = getValue("uv_luong2", "str", 'POST', '');
$ht_luong_time = getValue("ht_luong_time", "str", 'POST', '');
$price_start_date = getValue("price_start_date", "str", 'POST', '');
$price_end_date = getValue("price_end_date", "str", 'POST', '');
$work_start_date = getValue("work_start_date", "str", 'POST', '');
$work_term = getValue("work_term", "str", 'POST', '');
$updated_at = time();

// var_dump($_POST); die;

$list = [
    // 'id'=>$id_job,
    'title_job' => $job_name,
    'category_id' => $uv_linh_vuc,
    'skill_id' => $uv_skill,
    'work_type' => $uv_jobtype,
    'work_city' => $uv_city,
    'work_exp' => $uv_exp,
    'work_des' => $uv_des,
    'salary_permanent_number' => $uv_luong,
    'salary_estimate_number_1' => $uv_luong1,
    'salary_salary_estimate_number_2' => $uv_luong2,
    'salary_permanent_date' => $ht_luong_time,
    'date_bid_start' => $price_start_date,
    'date_bid_end' => $price_end_date,
    'date_work_start' => $work_start_date,
    'working_term' => $work_term,
    'updated_at' => $updated_at,
];
$condition=[
    'id'=>$id_job,
];
// echo ($id_job); die;

update('jobs', $list, $condition);


$select_jobtype = new db_query("SELECT job_type FROM jobs WHERE id = '".$id_job."'");
$sl_jobtype = mysql_fetch_assoc($select_jobtype -> result);
// echo ($sl_jobtype['job_type']); die;
echo "<script>alert('Sửa bài viết thành công!')</script>";
if ($sl_jobtype['job_type'] == 0) {
    redirect("/admin/danh_sach_tin_du_an");
}
else {
    redirect("/admin/danh_sach_tin_ban_tg");
}

