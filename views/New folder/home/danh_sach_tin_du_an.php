<?
$post_list_qr = new db_query("SELECT id,users.name as user_name,title_job,alias,jobs.category_id,skill_id,duyet_tin FROM `jobs`
JOIN users ON jobs.user_id = users.id_user  
WHERE job_type = 0");
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách bài tin đăng dự án</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách tin đăng dự án</li>
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
                                        <th>Tên NTD</th>
                                        <th>Tên tin đăng</th>
                                        <th>Sửa</th>
                                        <th>Duyệt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?
                                    while ($post = mysql_fetch_assoc($post_list_qr->result)) {
                                    ?>
                                        <tr>
                                            <td><?= $post['id'] ?></td>
                                            <td><?= $post['user_name'] ?></td>
                                            <td><?= $post['title_job'] ?></td>
                                            <td><a href="sua_tin_dang?id=<?= $post['id'] ?>">Sửa</a></td>
                                            <td>
                                                <select name="" id="" class="form-control duyet_tin" data-id="<?=$post['id']?>" <?=$post['duyet_tin']==0?"":"disabled"?>>
                                                    <option <?=$post['duyet_tin']==0?"selected":""?> value="0">Chưa duyệt</option>
                                                    <option <?=$post['duyet_tin']==1?"selected":""?> value="1">Đã duyệt</option>
                                                </select>
                                            </td>
                                        </tr>
                                    <?
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên NTD</th>
                                        <th>Tên tin đăng</th>
                                        <th>Sửa</th>
                                        <th>Duyệt</th>
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