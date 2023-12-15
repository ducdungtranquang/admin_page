<?
session_start();
$admin = true;
include('../../home/config.php');

if(isset($_POST['uv_city'])&&$_POST['ntd_id']!=""){
    $uv_city = $_POST['uv_city'];
    $ntd_id = $_POST['ntd_id'];

    $city_post_check = new db_count("SELECT count(*) as count FROM jobs WHERE work_city='$uv_city' AND user_id='$ntd_id'");
    if($city_post_check->total>0){
        echo "false";
    }else{
        echo "true";
    }
}else{
    echo "true";
}