<?
session_start();
$admin = true;
include('../../home/config.php');

if (!$_GET['uv_id'] == "") {
    $uv_id = $_GET['uv_id'];
    $selected_pr = new db_query("SELECT district_id FROM users where id_user = '$uv_id'");
    $selecteds = mysql_fetch_assoc($selected_pr->result);
    $district_arr = split(",", $selecteds['district_id']);

    $id_cty = (int)$_GET['cit_id'];
    if ($id_cty != '') {
        $query = new db_query("SELECT cit_id,cit_name FROM city2 where cit_parent = $id_cty");
        while ($rowqh = mysql_fetch_assoc($query->result)) {
    ?>
<option <?= in_array($rowqh['cit_id'], $district_arr) ? "selected" : "" ?> value="<?= $rowqh['cit_id']; ?>">
    <?= $rowqh['cit_name']; ?></option>
<?
        }
    }
}else{
    $id_cty = (int)$_GET['cit_id'];
    if ($id_cty != '') {
        $query = new db_query("SELECT cit_id,cit_name FROM city2 where cit_parent = $id_cty");
        while ($rowqh = mysql_fetch_assoc($query->result)) {
    ?>
    <option <?= in_array($rowqh['cit_id'], $district_arr) ? "selected" : "" ?> value="<?= $rowqh['cit_id']; ?>">
        <?= $rowqh['cit_name']; ?></option>
    <?
        }
    }
}