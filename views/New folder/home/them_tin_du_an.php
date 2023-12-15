<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm tin đăng dự án</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thêm tin đăng dự án</li>
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
                            <form id="them_ung_vien" method="POST" action="/admin/process_code/them_tin_du_an.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Tên nhà tuyển dụng</label>
                                            <span class="badge badge-danger">*</span>
                                            <select class="form-control" name="uv_name" id="ntd_id" value="" onchange="valid_sl2('ntd_id')">
                                                <option value="">Tìm nhà tuyển dụng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Tên công việc</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="text" class="form-control" name="job_name" placeholder="Nhập tên công việc" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tỉnh thànhh</label>
                                            <span class="badge badge-danger">*</span>
                                            <select class="form-control" name="uv_city" id="uv_city" onchange="valid_sl2('uv_city')">
                                                <option value="">Chọn tỉnh thành</option>
                                                <?
                                                foreach ($citys_arr as $city) {
                                                ?>
                                                    <option value="<?= $city['cit_id'] ?>"><?= $city['cit_name'] ?></option>
                                                <?
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Lĩnh vựcc</label>
                                            <span class="badge badge-danger">*</span>
                                            <select class="form-control" name="uv_linh_vuc" id="uv_linh_vuc" onchange="valid_sl2('uv_linh_vuc')">
                                                <option value="">Chọn lĩnh vực</option>
                                                <?
                                                foreach ($cates_arr as $cate) {
                                                ?>
                                                    <option value="<?= $cate['id_category'] ?>">
                                                        <?= $cate['category_name'] ?></option>
                                                <?
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kĩ năng</label>
                                            <span class="badge badge-danger">*</span>
                                            <select class="form-control" name="uv_skill[]" id="uv_skill" multiple="multiple">
                                                <option value="">Chọn kĩ năng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Hình thức làm việc</label>
                                            <span class="badge badge-danger">*</span>
                                            <select class="form-control" name="uv_jobtype">
                                                <option value="">Chọn hình thức làm việc</option>
                                                <option value="1">Toàn thời gian cố định</option>
                                                <option value="2">Toàn thời gian tạm thời</option>
                                                <option value="3">Bán thời gian</option>
                                                <option value="4">Bán thời gian tạm thời</option>
                                                <option value="5">Hợp đồng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kinh nghiệm làm việc</label>
                                            <span class="badge badge-danger">*</span>
                                            <select class="form-control" name="uv_exp">
                                                <option value="">Chọn kinh nghiệm làm việc</option>
                                                <option value="1">Chưa có kinh nghiệm làm việc</option>
                                                <option value="2">0-1 năm</option>
                                                <option value="3">1-2 năm</option>
                                                <option value="4">2-5 năm</option>
                                                <option value="5">5-10 năm</option>
                                                <option value="6">Hơn 10 năm</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Nội dụng các công việc cần thực hiện</label>
                                            <span class="badge badge-danger">*</span>
                                            <textarea class="form-control" rows="3" name="uv_des" placeholder="Nội dụng các công việc cần thực hiện"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Mức lương cố định</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="number" min="1" class="form-control" name="uv_luong">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Mức lương ước lượng</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="number" id="price_start" min="1" class="form-control" name="uv_luong1" placeholder="Từ">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>.</label>
                                            <input type="number" id="price_end" min="1" class="form-control" name="uv_luong2" placeholder="Đến">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Hình thức trả lương</label>
                                            <span class="badge badge-danger">*</span>
                                            <select name="ht_luong_time" id="" class="form-control">
                                                <option value="">Chọn hình thức trả lương</option>
                                                <option value="1">Ngày</option>
                                                <option value="2">Tuần</option>
                                                <option value="3">Tháng</option>
                                                <option value="4">Năm</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Ngày bắt đầu đặt giá</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="date" class="form-control" name="price_start_date">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Ngày kết thúc đặt giá</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="date" class="form-control" name="price_end_date">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Ngày bắt đầu làm việc</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="date" class="form-control" name="work_start_date">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Thời hạn làm việc</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="number" min="1" class="form-control" name="work_term" placeholder="Tháng">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary right">Tạo</button>
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