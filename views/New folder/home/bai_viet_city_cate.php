<?
  $post_list_qr= new db_query("SELECT id,category_id,cit_id,content,title_suggest,content_suggest FROM post_city_category WHERE skill_id IS NULL ");
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách bài viết tỉnh thành +lĩnh vực</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Danh sách bài viết tỉnh thành+ lĩnh vực</li>
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
                    <th>Tên tỉnh thành</th>
                    <th>Tên lĩnh vực</th>
                    <th>Tiêu đề gợi ý</th>
                    <th>Sửa</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?
                      while($post = mysql_fetch_assoc($post_list_qr->result)){
                    ?>
                  <tr>
                    <td><?=$post['id']?></td>
                    <td><?=$citys_arr[$post['cit_id']]['cit_name']?></td>
                    <td><?=$cates_arr[$post['category_id']]['category_name']?></td>
                    <td><?=$post['title_suggest']?></td>
                    <td><a href="sua_bai_viet_city_cate?id=<?=$post['id']?>">Sửa</a></td>

                  </tr>
                    <?
                      }
                    ?>
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Tên tỉnh thành</th>
                    <th>Tên lĩnh vực</th>
                    <th>Tiêu đề gợi ý</th>
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