<?
  $id_job= getValue('id','int',"GET","");
  $job_qr = new db_query("SELECT * FROM jobs WHERE id = '$id_job'");
  $job_detail = mysql_fetch_assoc($job_qr->result);
  
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa tin đăng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sửa tin đăng</li>
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
                            <form id="sua_tin_dang" method="POST" action="/admin/process_code/sua_tin_dang.php" enctype="multipart/form-data">
                            <input type="hidden" id="job_id" value="<?=$job_detail['id']?>">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>ID bài viết</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="text" class="form-control" name="id_job" readonly value="<?=$job_detail['id']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Tên công việc</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="text" class="form-control" name="job_name" placeholder="Nhập tên công việc" value="<?=$job_detail['title_job']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tỉnh thành</label>
                                            <span class="badge badge-danger">*</span>
                                            <select class="form-control" name="uv_city" id="uv_city">
                                                <option value="">Chọn tỉnh thành</option>
                                                <?
                                                foreach ($citys_arr as $city) {
                                                ?>
                                                    <option <?=$job_detail['work_city']==$city['cit_id']?"selected":""?> value="<?= $city['cit_id'] ?>"><?= $city['cit_name'] ?></option>
                                                <?
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Lĩnh vực</label>
                                            <span class="badge badge-danger">*</span>
                                            <select class="form-control" name="uv_linh_vuc" id="uv_linh_vuc">
                                                <option value="">Chọn hình thức</option>
                                                <?
                                                foreach ($cates_arr as $cate) {
                                                ?>
                                                    <option <?=$job_detail['category_id']==$cate['id_category']?"selected":""?> value="<?= $cate['id_category'] ?>">
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
                                            <select class="form-control" name="uv_jobtype">
                                                <option value="">Chọn hình thức làm việc</option>
                                                <option <?=$job_detail['work_type']==1?"selected":"" ?> value="1">Toàn thời gian cố định</option>
                                                <option <?=$job_detail['work_type']==2?"selected":"" ?> value="2">Toàn thời gian tạm thời</option>
                                                <option <?=$job_detail['work_type']==3?"selected":"" ?> value="3">Bán thời gian</option>
                                                <option <?=$job_detail['work_type']==4?"selected":"" ?> value="4">Bán thời gian tạm thời</option>
                                                <option <?=$job_detail['work_type']==5?"selected":"" ?> value="5">Hợp đồng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kinh nghiệm làm việc</label>
                                            <select class="form-control" name="uv_exp">
                                                <option value="">Chọn kinh nghiệm làm việc</option>
                                                <option <?=$job_detail['work_exp']==1?"selected":"" ?> value="1">Chưa có kinh nghiệm làm việc</option>
                                                <option <?=$job_detail['work_exp']==2?"selected":"" ?> value="2">0-1 năm</option>
                                                <option <?=$job_detail['work_exp']==3?"selected":"" ?> value="3">1-2 năm</option>
                                                <option <?=$job_detail['work_exp']==4?"selected":"" ?> value="4">2-5 năm</option>
                                                <option <?=$job_detail['work_exp']==5?"selected":"" ?> value="5">5-10 năm</option>
                                                <option <?=$job_detail['work_exp']==6?"selected":"" ?> value="6">Hơn 10 năm</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Nội dụng các công việc cần thực hiện</label>
                                            <textarea class="form-control" rows="3" name="uv_des" placeholder="Nội dụng các công việc cần thực hiện"><?=$job_detail['work_des']?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Mức lương cố định</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="number" min="1" class="form-control" name="uv_luong" value="<?=$job_detail['salary_permanent_number']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group luong_ul">
                                            <label>Mức lương ước lượngg</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="number" min="1" id="price_start" class="form-control" onchange="check_price()" name="uv_luong1" placeholder="Từ" value="<?=$job_detail['salary_estimate_number_1']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>.</label>
                                            <input type="number" min="1" id="price_end" class="form-control" onchange="check_price()" name="uv_luong2" placeholder="Đến" value="<?=$job_detail['salary_salary_estimate_number_2']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Hình thức trả lương</label>
                                            <span class="badge badge-danger">*</span>
                                            <select name="ht_luong_time" id="" class="form-control">
                                                <option value="">Chọn hình thức trả lương</option>
                                                <option <?=$job_detail['salary_permanent_date']==1?"selected":"" ?> value="1">Ngày</option>
                                                <option <?=$job_detail['salary_permanent_date']==2?"selected":"" ?> value="2">Tuần</option>
                                                <option <?=$job_detail['salary_permanent_date']==3?"selected":"" ?> value="3">Tháng</option>
                                                <option <?=$job_detail['salary_permanent_date']==4?"selected":"" ?> value="4">Năm</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Ngày bắt đầu đặt giá</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="date" class="form-control" name="price_start_date" value="<?=$job_detail['date_bid_start']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Ngày kết thúc đặt giá</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="date" class="form-control" name="price_end_date" value="<?=$job_detail['date_bid_end']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Ngày bắt đầu làm việc</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="date" class="form-control" name="work_start_date" value="<?=$job_detail['date_work_start']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Thời hạn làm việc</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="number" min="1" class="form-control" name="work_term" placeholder="Tháng" value="<?=$job_detail['working_term']?>">
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