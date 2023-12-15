
<?
session_start();
$admin = true;
include('../../home/config.php');

$cate_id = (int)$_GET['cate_id'];

if(isset($_GET['uv_id'])){
    $uv_id=$_GET['uv_id'];
    $selected_pr = new db_query("SELECT skill_detail FROM users where id_user = '$uv_id'");
    $selecteds= mysql_fetch_assoc($selected_pr->result);
    $skill_arr = split(",",$selecteds['skill_detail']);
    if($cate_id != ''){
        $query = new db_query("SELECT id_skill,skill_name FROM skills where category_id = '".$cate_id."'");
        while($row= mysql_fetch_assoc($query->result)) {
        ?>
            <option <?=in_array($row['id_skill'],$skill_arr)?"selected":""?> value="<?=$row['id_skill']; ?>">
        <?=$row['skill_name']; ?>
        </option>
        <?
        }
    }
}
elseif(isset($_GET['job_id'])){
    $job_id=$_GET['job_id'];
    $selected_pr = new db_query("SELECT skill_id FROM jobs where id = '$job_id'");
    $selecteds= mysql_fetch_assoc($selected_pr->result);
    $skill_arr = split (",",$selecteds['skill_id']);
    if($cate_id != ''){
        $query = new db_query("SELECT id_skill,skill_name FROM skills where category_id = $cate_id");
        while($row= mysql_fetch_assoc($query->result)) {
        ?>
            <option <?=in_array($row['id_skill'],$skill_arr)?"selected":""?> value="<?=$row['id_skill']; ?>">
        <?=$row['skill_name']; ?>
        </option>
        <?
        }
    }
}
else{
    if($cate_id != ''){
        $query = new db_query("SELECT id_skill,skill_name FROM skills where category_id = $cate_id");
        while($rownnct= mysql_fetch_assoc($query->result)) {
        ?>
        <option <?=in_array($rownnct['id_skill'],$skill_arr)?"selected":""?> value="<?=$rownnct['id_skill']; ?>">
        <?=$rownnct['skill_name']; ?>
        </option>
        <?
        }
    }
}
