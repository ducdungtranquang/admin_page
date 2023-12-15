<?
$id_tag = getValue('id', 'int', "GET", "");
$tag_qr = new db_query("SELECT * FROM skills WHERE id_skill = $id_tag");
$tag_detail = mysql_fetch_assoc($tag_qr->result);

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa tag</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sửa tag</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="them_ung_vien" method="POST" action="/admin/process_code/sua_tag.php" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="uv_id" value="<?= $tag_detail['id_skill'] ?>">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Tên tag</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="text" class="form-control" name="skill_name" placeholder="Nhập tên ứng viên" value="<?= $tag_detail['skill_name'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tỉnh lĩnh vực</label>
                                            <span class="badge badge-danger">*</span>
                                            <select class="form-control" name="cate_id" id="uv_city">
                                                <option value="">Chọn lĩnh vực</option>
                                                <?
                                                foreach ($cates_arr as $cate) {
                                                ?>
                                                    <option <?= $tag_detail['category_id'] == $cate['id_category'] ? "selected" : "" ?> value="<?= $cate['id_category'] ?>"><?= $cate['category_name'] ?></option>
                                                <?
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary right">Sửa</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>