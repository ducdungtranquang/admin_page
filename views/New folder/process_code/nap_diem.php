<?
session_start();
$admin = true;
include('../../home/config.php');

$id_ntd = getValue("uv_name", "str", 'POST', '');
$diem = getValue("nap_diem", "str", 'POST', '');
if ($diem > 0 ) {
$old_point_qr= new db_query("SELECT point FROM point WHERE employer_id ='$id_ntd' ");
$old_point = mysql_fetch_assoc($old_point_qr->result);

$list =[
    "point"=>$diem+$old_point['point'],
];
$condition=[
    "employer_id"=>$id_ntd
];

update("point",$list,$condition);

// $point_log= new db_query("INSERT INTO point(id, employer_id, point) VALUES point WHERE employer_id ='$id_ntd' ");

// header('Location: /admin/lich_su_nap_diem');
echo "<script>alert('Cộng điểm thành công!')</script>";
redirect('/admin/lich_su_nap_diem');
}

else {
    echo "<script>alert('Số điểm phải lớn hơn 0')</script>";
    redirect('/admin/nap_diem');
}
?>
