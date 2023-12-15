<?
session_start();
$admin = true;
include('../../home/config.php');

$ntd_id = getValue("uv_name", "str", 'POST', '');
$job_name = getValue("job_name", "str", 'POST', '');
$job_name_alias = replaceTitle($job_name);
$uv_city = getValue("uv_city", "str", 'POST', '');
$uv_linh_vuc = getValue("uv_linh_vuc", "str", 'POST', '');
$uv_skill = implode(",",getValue("uv_skill", "arr", 'POST', ''));
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
$created_at=time();

$created_qr = new db_query("INSERT INTO `jobs` (`user_id`, `title_job`, `alias`, `category_id`, `skill_id`, `work_type`, `work_city`, `work_exp`, `work_des`, `salary_type`, `salary_permanent_number`, `salary_estimate_number_1`, `salary_salary_estimate_number_2`, `salary_permanent_date`, `date_bid_start`, `date_bid_end`, `date_work_start`, `working_term`, `job_type`, `created_at`)
VALUES ('$ntd_id','$job_name','$job_name_alias','$uv_linh_vuc', '$uv_skill', '$uv_jobtype', '$uv_city','$uv_exp','$uv_des','1','$uv_luong','$uv_luong1','$uv_luong2','$ht_luong_time','$price_start_date','$price_end_date','$work_start_date','$work_term','0','$created_at')");
    echo"<script>alert('Thêm bài viết thành công')</script>";
    redirect("/admin/danh_sach_tin_du_an");
?>