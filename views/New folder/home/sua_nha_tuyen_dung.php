<?
$id_uv = getValue('id', 'int', "GET", "");
$user_qr = new db_query("SELECT * FROM users WHERE id_user = $id_uv");
$user_detail = mysql_fetch_assoc($user_qr->result);

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa nhà tuyển dụng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sửa ứng viên</li>
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
                            <form id="them_ung_vien" method="POST" action="/admin/process_code/sua_nha_tuyen_dung.php" enctype="multipart/form-data">
                                <input type="hidden" name="uv_id" id="uv_id" value="<?= $id_uv ?>">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Tên ứng viên</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="text" class="form-control" name="uv_name" placeholder="Nhập tên ứng viên" value="<?= $user_detail['name'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="text" class="form-control" name="uv_email1" id="uv_mail" placeholder="Nhập email ứng viên" value="<?= $user_detail['email'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="text" class="form-control" name="uv_phone" placeholder="Nhập số điện thoại" value="<?= $user_detail['phone'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Giới tính</label>
                                            <span class="badge badge-danger">*</span>
                                            <select class="form-control" name="uv_sex">
                                                <option value="">Chọn giới tính</option>
                                                <option <?= $user_detail['sex'] == 0 ? "selected" : "" ?> value="0">Nam</option>
                                                <option <?= $user_detail['sex'] == 1 ? "selected" : "" ?> value="1">Nữ</option>
                                                <option <?= $user_detail['sex'] == 2 ? "selected" : "" ?> value="2">Khác</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Ngày sinh</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="date" class="form-control" name="uv_birth" value="<?= $user_detail['birthday'] ?>" max="<?= date('Y-m-d')?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tỉnh thành</label>
                                            <span class="badge badge-danger">*</span>
                                            <select class="form-control" name="uv_city" id="uv_city" onchange="valid_sl2('uv_city')">
                                                <option value="">Chọn tỉnh thành</option>
                                                <?
                                                foreach ($citys_arr as $city) {
                                                ?>
                                                    <option <?= $user_detail['city_id'] == $city['cit_id'] ? "selected" : "" ?> value="<?= $city['cit_id'] ?>"><?= $city['cit_name'] ?></option>
                                                <?
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Quận huyện</label>
                                            <span class="badge badge-danger">*</span>
                                            <select class="form-control" name="uv_district" id="uv_district" onchange="valid_sl2('uv_district')">
                                                <option value="<?= $user_detail['district_id'] ?>"></option>
                                            </select>
                                        </div>
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