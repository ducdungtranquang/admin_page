<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm tag</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thêm tag</li>
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
                            <form id="them_ung_vien" method="POST" action="/admin/process_code/them_tag.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Tên tag</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="text" class="form-control" name="skill_name" placeholder="Nhập tên ứng viên" value="">
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
                                                    <option value="<?= $cate['id_category'] ?>"><?= $cate['category_name'] ?></option>
                                                <?
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary right">Thêm</button>
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