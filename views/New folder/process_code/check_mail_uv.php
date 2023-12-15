<?
session_start();
$admin = true;
include('../../home/config.php');

if(isset($_POST['uv_email'])){
    $email_uv = $_POST['uv_email'];
        $sql = "SELECT * from users where email = '$email_uv'  AND user_type = '0'  ";
        $qr = new db_query($sql);
        $row = mysql_num_rows($qr->result);
        if ($row >0) {
            echo "false";
        }
        else{
            echo "true";
        }
}
?>