<?
session_start();
$admin = true;
include('../../home/config.php');

if(isset($_POST['uv_linh_vuc'])&&isset($_POST['ntd_id'])){
    $uv_linh_vuc = $_POST['uv_linh_vuc'];
    $ntd_id = $_POST['ntd_id'];

    $city_post_check = new db_count("SELECT count(*) as count FROM jobs WHERE category_id='$uv_linh_vuc' AND user_id='$ntd_id'");
    if($city_post_check->total>1){
        echo "false";
    }else{
        echo "true";
    }
}else{
    echo "true";
}