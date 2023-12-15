<?
  $id_uv= getValue('id','int',"GET","");
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm ứng viên</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thêm ứng viên</li>
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
                <form id="them_ung_vien" method="POST" action="/admin/process_code/them_ung_vien.php" enctype="multipart/form-data">
                <input type="hidden" name="uv_id" id="uv_id" value="">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tên ứng viên</label>
                        <span class="badge badge-danger">*</span>
                        <input type="text" class="form-control" name="uv_name" placeholder="Nhập tên ứng viên" value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Email</label>
                        <span class="badge badge-danger">*</span>
                        <input type="text" class="form-control" name="uv_email" id="uv_mail" placeholder="Nhập email ứng viên" value="" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Password</label>
                        <span class="badge badge-danger">*</span>
                        <input type="password" class="form-control" name="uv_pass" value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Phone</label>
                        <span class="badge badge-danger">*</span>
                        <input type="text" class="form-control" name="uv_phone" placeholder="Nhập số điện thoại"  value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Giới tính</label>
                        <span class="badge badge-danger">*</span>
                        <select class="form-control" name="uv_sex">
                          <option value="">Chọn giới tính</option>
                          <option value="0">Nam</option>
                          <option value="1">Nữ</option>
                          <option value="2">Khác</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Ngày sinh</label>
                        <span class="badge badge-danger">*</span>
                        <input type="date" class="form-control" name="uv_birth" value="" max="<?=date('Y-m-d')?>" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tỉnh thành</label>
                        <span class="badge badge-danger">*</span>
                        <select class="form-control" name="uv_city" id="uv_city" onchange="valid_sl2('uv_city')">
                          <option value="">Chọn tỉnh thành</option>
                          <?
                            foreach($citys_arr as $city){
                          ?>
                          <option value="<?=$city['cit_id']?>"><?=$city['cit_name']?></option>
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
                          <option value="">Chọn quận huyện</option>
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
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Giới thiệu bản thân</label>
                        <span class="badge badge-danger">*</span>
                        <textarea class="form-control" rows="3" name="uv_des" placeholder="Giới thiệu bản thân"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nghề nghiệp</label>
                        <span class="badge badge-danger">*</span>
                            <input type="text" class="form-control" name="uv_job" placeholder="Nhập nghề nghiệp của bạn" >
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
                            <label>Công việc mong muốn</label>
                        <span class="badge badge-danger">*</span>
                            <select class="form-control" name="uv_jobdesire" id="uv_jobdesire" onchange="valid_sl2('uv_jobdesire')">
                                <option value="">Chọn công việc</option>
                                <?
                                  foreach($cates_arr as $cate){
                                ?>
                                <option value="<?=$cate['id_category']?>"><?=$cate['category_name']?></option>
                                <?
                                  }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nơi làm việc mong muốn</label>
                        <span class="badge badge-danger">*</span>
                            <select class="form-control" name="uv_citydesire" id="uv_citydesire" onchange="valid_sl2('uv_citydesire')">
                                <option value="">Chọn nơi làm việc</option>
                                <?
                                    foreach($citys_arr as $city){
                                  ?>
                                  <option value="<?=$city['cit_id']?>"><?=$city['cit_name']?></option>
                                  <?
                                    }
                                  ?>
                            </select>
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
                        <label class="dot">.</label>
                            <input type="number" id="price_end" min="1" class="form-control" name="uv_luong2" placeholder="Đến">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Hình thức trả lương</label>
                            <span class="badge badge-danger">*</span>
                            <select class="form-control" name="uv_ht_traluong">
                                <option value="">Chọn hình thức</option>
                                <option value="1">Ngày</option>
                                <option value="2">Tuần</option>
                                <option value="3">Tháng</option>
                                <option value="4">Năm</option>
                            </select>
                        </div>
                    </div>

                  </div>
                  <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Lĩnh vực</label>
                                <span class="badge badge-danger">*</span>
                                <select class="form-control" name="uv_linh_vuc" id="uv_linh_vuc" onchange="valid_sl2('uv_linh_vuc')">
                                    <option value="">Chọn lĩnh vực</option>
                                    <?
                                      foreach($cates_arr as $cate){
                                    ?>
                                    <option value="<?=$cate['id_category']?>"><?=$cate['category_name']?></option>
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
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tên hồ sơ năng lực</label>
                                <input type="text" class="form-control" name="ten_file" placeholder="Nhập tên hồ sơ">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Hồ sơ năng lực</label>
                                <input type="file" class="form-control" name="uv_file">
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
  