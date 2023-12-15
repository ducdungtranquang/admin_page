<?
session_start();
$admin = true;
include('../../home/config.php');

$search = getValue("search", "str", 'GET', '');

$check_qr = new db_query("SELECT id_user,email,name  FROM users WHERE user_type = '1' AND name LIKE '%$search%' ");

while($row= mysql_fetch_assoc($check_qr->result)){
    $items[] = $row;
}
echo json_encode($items);