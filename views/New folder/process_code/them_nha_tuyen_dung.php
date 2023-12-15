<?
session_start();
$admin = true;
include('../../home/config.php');

$uv_name = getValue("uv_name", "str", 'POST', '');
$uv_email = getValue("uv_email", "str", 'POST', '');
$uv_pass = md5(getValue("uv_pass", "str", 'POST', ''));
$uv_phone = getValue("uv_phone", "str", 'POST', '');
$uv_sex = getValue("uv_sex", "str", 'POST', '');
$uv_birth = getValue("uv_birth", "str", 'POST', '');
$uv_city = getValue("uv_city", "str", 'POST', '');
$uv_district = getValue("uv_district", "str", 'POST', '');
$uv_exp = getValue("uv_exp", "str", 'POST', '');
$ten_file = getValue("ten_file", "str", 'POST', '');
$created_at=date("Y-m-d");

$user_token =md5($uv_pass.$uv_email);
    $name="";
    $time = time();
    // $dir = "../".getcvuv($time);

    $name = 'file_'.$time.".".end(explode(".",$_FILES['uv_file']['name']));
    if ($name != '') {
        file_put_contents($dir.$name, file_get_contents($_FILES['uv_file']['tmp_name'])); 
    }
    if ($_FILES['uv_file']['error'] == 0){

        $y = date('Y', time());
        $m = date('m', time());
        $d = date('d', time());
        $dir =__DIR__."/../../files/".$y;
        if (!is_dir($dir)){
            mkdir($dir,0777);
        }
        if (!is_dir($dir."/".$m)){
            mkdir($dir."/".$m,0777);
        }
        if (!is_dir($dir."/".$m."/".$d)){
            mkdir($dir."/".$m."/".$d,0777);
        }
        $dir .="/".$m."/".$d;
        $filename= $name;
        move_uploaded_file($_FILES['uv_file']['tmp_name'],$dir.'/'.$filename);
        $file_up = ('../files/'.$y.'/'.$m.'/'.$d.'/'.$filename);
    }


    $created_qr = new db_query("INSERT INTO `users` (`email`, `phone`, `name`, `password`, `city_id`, `district_id`, `sex`, `birthday`, `avatar`, `user_type`, `user_active`, `created_at`, `ten_file`, `file`, `index`, `token`)
    VALUES ('$uv_email','$uv_phone','$uv_name','$uv_pass', '$uv_city', '$uv_district', '$uv_sex','$uv_birth','', '1','1','$created_at', '$ten_file', '$file_up', '0', '$user_token')");

    header('Location: /admin/danh_sach_nha_tuyen_dung');
?>