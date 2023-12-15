<?
  $user_list_qr= new db_query("SELECT id_user,email,phone,name,avatar,type,created_at,user_active FROM users WHERE user_type = 0 ORDER BY id_user DESC");
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách ứng viên</h1>
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
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Ngày đăng kí</th>
                    <th>Đăng kí</th>
                    <th>Active</th>
                    <th>Sửa</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?
                      while($uv = mysql_fetch_assoc($user_list_qr->result)){
                    ?>
                  <tr>
                    <td><?=$uv['id_user']?></td>
                    <td  
                      <img src="<?=$uv['avatar']?>" alt="" width="60" height="60" onerror="this.onerror=null;this.src='/images/img_ntd.png';">
                    </td>
                    <td><?=$uv['name']?></td>
                    <td><?=$uv['email']?></td>
                    <td><?=$uv['phone']?></td>
                    <td><?=$uv['created_at']?></td>
                    <td><?=$uv['type']==1?"Web":"App"?></td>
                    <td><?=$uv['user_active']==1?"Active":"Chưa active"?></td>
                    <td><a href="sua_ung_vien?id=<?=$uv['id_user']?>">Sửa</a></td>

                  </tr>
                    <?
                      }
                    ?>
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Ngày đăng kí</th>
                    <th>Đăng kí</th>
                    <th>Sửa</th>
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