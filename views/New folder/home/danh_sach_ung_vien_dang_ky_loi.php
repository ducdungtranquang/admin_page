<?
// $user_list_qr = new db_query("SELECT id_user,email,phone,name,avatar,type FROM users WHERE user_type = 0 ");
$db_qr_uv_detail = new db_query("SELECT users_error.id, users_error.name, users_error.city_id, users_error.district_id, 
users_error.email, users_error.phone, users_error.sex, users_error.created_at, users_error.user_type,users_error.type, city2.cit_id, city2.cit_name  
AS district_name, city.cit_name 
    FROM users_error 
    LEFT JOIN city2 ON users_error.district_id = city2.cit_id 
    LEFT JOIN city ON users_error.city_id = city.cit_id 
    WHERE users_error.user_type = '0'
    ORDER BY users_error.id DESC");
// $user_list_qr = mysql_fetch_assoc($db_qr_uv_detail->result);
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh sách ứng viên đăng ký lỗi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Danh sách ứng viên</li>
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
              <table id="uv_list" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Giới tính</th>
                    <th>Tỉnh/thành</th>
                    <th>Quận/huyện</th>
                    <th>Thời gian</th>
                    <th>Đăng ký</th>
                  </tr>
                </thead>
                <tbody>
                  <?
                  while ($uv = mysql_fetch_assoc($db_qr_uv_detail->result)) {
                  ?>
                    <tr>
                      <td style="text-align: center;"><?= $uv['id'] ?></td>
                      <td><?= $uv['name'] ?></td>
                      <td><?= $uv['email'] ?></td>
                      <td><?= $uv['phone'] ?></td>
                      <td><?= ($uv['sex'] == 0 )? "Nam" : (($uv['type'] == 1 )? "Nữ" : "Khác") ?></td>
                      <td><?= $uv['cit_name'] ?></td>
                      <td><?= $uv['district_name'] ?></td>
                      <td><?= date('d-m-Y',$uv['created_at']) ?></td>
                      <td><?= $uv['type'] == 1 ? "Web" : "App" ?></td>

                    </tr>
                  <?
                  }
                  ?>

                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Giới tính</th>
                    <th>Tỉnh/thành</th>
                    <th>Quận/huyện</th>
                    <th>Thời gian</th>
                    <th>Đăng ký</th>
                  </tr>
                </tfoot>
              </table>
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