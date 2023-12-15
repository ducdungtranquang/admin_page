<?
  $id_uv= getValue('id','int',"GET","");
  $user_qr = new db_query("SELECT * FROM users WHERE id_user = $id_uv");
  $user_detail = mysql_fetch_assoc($user_qr->result);
  
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sửa ứng viên</h1>
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
                <form id="them_ung_vien" method="POST" action="/admin/process_code/sua_ung_vien.php" enctype="multipart/form-data">
                <input type="hidden" name="uv_id1" id="uv_id1" value="<?=$id_uv?>">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tên ứng viên</label>
                        <span class="badge badge-danger">*</span>
                        <input type="text" class="form-control" name="uv_name" placeholder="Nhập tên ứng viên" value="<?=$user_detail['name']?>">
                        <input type="hidden" id="uv_id" value="<?=$user_detail['id_user']?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Email</label>
                        <span class="badge badge-danger">*</span>
                        <input type="text" class="form-control" name="uv_email1" id="uv_mail" placeholder="Nhập email ứng viên" value="<?=$user_detail['email']?>" disabled >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Phone</label>
                        <span class="badge badge-danger">*</span>
                        <input type="text" class="form-control" name="uv_phone" placeholder="Nhập số điện thoại"  value="<?=$user_detail['phone']?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Giới tính</label>
                        <span class="badge badge-danger">*</span>
                        <select class="form-control" name="uv_sex">
                          <option value="">Chọn giới tính</option>
                          <option <?=$user_detail['sex']==0?"selected":"" ?> value="0">Nam</option>
                          <option <?=$user_detail['sex']==1?"selected":"" ?> value="1">Nữ</option>
                          <option <?=$user_detail['sex']==2?"selected":"" ?> value="2">Khác</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Ngày sinh</label>
                        <span class="badge badge-danger">*</span>
                        <input type="date" class="form-control" name="uv_birth" value="<?=$user_detail['birthday']?>" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tỉnh thành</label>
                        <span class="badge badge-danger">*</span>
                        <select class="form-control" name="uv_city" id="uv_city">
                          <option value="">Chọn tỉnh thành</option>
                          <?
                            foreach($citys_arr as $city){
                          ?>
                          <option <?=$user_detail['city_id']==$city['cit_id']?"selected":"" ?> value="<?=$city['cit_id']?>"><?=$city['cit_name']?></option>
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
                        <select class="form-control" name="uv_district" id="uv_district">
                          <option value="<?=$user_detail['district_id']?>"></option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Kinh nghiệm làm việc</label>
                        <span class="badge badge-danger">*</span>
                        <select class="form-control" name="uv_exp">
                          <option value="">Chọn kinh nghiệm làm việc</option>
                          <option <?=$user_detail['skill_year']==1?"selected":"" ?> value="1">Chưa có kinh nghiệm</option>
                          <option <?=$user_detail['skill_year']==2?"selected":"" ?> value="2">0-1 năm</option>
                          <option <?=$user_detail['skill_year']==3?"selected":"" ?> value="3">1-2 năm</option>
                          <option <?=$user_detail['skill_year']==4?"selected":"" ?> value="4">2-5 năm</option>
                          <option <?=$user_detail['skill_year']==5?"selected":"" ?> value="5">5-10 năm</option>
                          <option <?=$user_detail['skill_year']==6?"selected":"" ?> value="6">Hơn 10 năm</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Giới thiệu bản thân</label>
                        <textarea class="form-control" rows="3" name="uv_des" placeholder="Giới thiệu bản thân"><?=$user_detail['user_des']?></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nghề nghiệp</label>
                            <span class="badge badge-danger">*</span>
                            <input type="text" class="form-control" name="uv_job" placeholder="Nhập nghề nghiệp của bạn" value="<?=$user_detail['user_job']?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Hình thức làm việc</label>
                            <span class="badge badge-danger">*</span>
                            <select class="form-control" name="uv_jobtype">
                                <option value="">Chọn hình thức làm việc</option>
                                <option <?=$user_detail['form_of_work']==1?"selected":"" ?> value="1">Toàn thời gian cố định</option>
                                <option <?=$user_detail['form_of_work']==2?"selected":"" ?> value="2">Toàn thời gian tạm thời</option>
                                <option <?=$user_detail['form_of_work']==3?"selected":"" ?> value="3">Bán thời gian</option>
                                <option <?=$user_detail['form_of_work']==4?"selected":"" ?> value="4">Bán thời gian tạm thời</option>
                                <option <?=$user_detail['form_of_work']==5?"selected":"" ?> value="5">Hợp đồng</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Công việc mong muốn</label>
                            <span class="badge badge-danger">*</span>
                            <select class="form-control" name="uv_jobdesire" id="uv_jobdesire">
                                <option value="">Chọn công việc</option>
                                <?
                                  foreach($cates_arr as $cate){
                                ?>
                                <option <?=$user_detail['work_desire']==$cate['id_category']?"selected":"" ?> value="<?=$cate['id_category']?>"><?=$cate['category_name']?></option>
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
                            <select class="form-control" name="uv_citydesire" id="uv_citydesire">
                                <option value="">Chọn nơi làm việc</option>
                                <?
                                    foreach($citys_arr as $city){
                                  ?>
                                  <option <?=$user_detail['work_place']==$city['cit_id']?"selected":"" ?> value="<?=$city['cit_id']?>"><?=$city['cit_name']?></option>
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
                            <input type="number" min="1" class="form-control" name="uv_luong" value="<?=$user_detail['salary_permanent_number']?>">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group luong_ul">
                            <label>Mức lương ước lượng</label>
                            <span class="badge badge-danger">*</span>
                            <input type="number" min="1" id="price_start" class="form-control" name="uv_luong1" placeholder="Từ" value="<?=$user_detail['salary_estimate_number_1']?>">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                        <label>.</label>
                            <input type="number" min="1" id="price_end" class="form-control" name="uv_luong2" placeholder="Đến" value="<?=$user_detail['salary_salary_estimate_number_2']?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Hình thức trả lương</label>
                            <span class="badge badge-danger">*</span>
                            <select class="form-control" name="uv_ht_traluong">
                                <option value="">Chọn hình thức</option>
                                <option <?=$user_detail['salary_permanent_date']==1?"selected":"" ?> value="1">Ngày</option>
                                <option <?=$user_detail['salary_permanent_date']==2?"selected":"" ?> value="2">Tuần</option>
                                <option <?=$user_detail['salary_permanent_date']==3?"selected":"" ?> value="3">Tháng</option>
                                <option <?=$user_detail['salary_permanent_date']==4?"selected":"" ?> value="4">Năm</option>
                            </select>
                        </div>
                    </div>

                  </div>
                  <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Lĩnh vực</label>
                                <span class="badge badge-danger">*</span>
                                <select class="form-control" name="uv_linh_vuc" id="uv_linh_vuc">
                                    <option value="">Chọn lĩnh vực</option>
                                    <?
                                      foreach($cates_arr as $cate){
                                    ?>
                                    <option <?=$user_detail['category_id']==$cate['id_category']?"selected":"" ?> value="<?=$cate['id_category']?>"><?=$cate['category_name']?></option>
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
                                <input type="text" class="form-control" name="ten_file" placeholder="Nhập tên hồ sơ" value="<?=$user_detail['ten_file']?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Hồ sơ năng lực</label>
                                <span><?=$user_detail['file']?></span>
                                <input type="file" class="form-control" name="uv_file">
                                <input type="hidden" class="form-control" name="uv_old_file" value="<?=$user_detail['file']?>">
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
  