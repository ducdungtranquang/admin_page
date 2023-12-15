<?
session_start();
$admin = true;
include('../../home/config.php');

$id = getValue("job_id", "str", 'POST', '');

$list = [
    'duyet_tin'=>1,
];
$condition = [
    'id' => $id,
];
update('jobs', $list, $condition);

echo json_encode([
    'result' => true,
    'msg'    => 'Duyệt tin thành công',
]);
