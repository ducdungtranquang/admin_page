<?
session_start();
$admin = true;
include('../../home/config.php');

$adm_email = getValue("adm_mail", "str", 'POST', '');
$adm_pass = md5(getValue("adm_pass", "str", 'POST', ''));

$adm_qr = new db_count("SELECT count(*) as count FROM admin WHERE adm_email='$adm_email' AND adm_pass='$adm_pass'");

if(!$adm_qr->total==0){
    $_SESSION["UID"] = $adm_email;
    redirect("../index" );
}else{
    echo "<script>Sai thông tin đăng nhập</script>";
    redirect("../login" );
}
