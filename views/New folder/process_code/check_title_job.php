<?
session_start();
$admin = true;
include('../../home/config.php');

$job_name = $_POST['job_name'];
$job_name_alias = replaceTitle($job_name);
    $sql = "SELECT * from jobs where alias = '$job_name_alias'";
    $qr = new db_query($sql);
    $row = mysql_num_rows($qr->result);
    if ($row >0) {
        echo "false";
    }
    else{
        echo "true";
    }
?>