<?
$id = getValue('id', 'int', "GET", "");
$post_qr = new db_query("SELECT id,category_id,cit_id,content,title_suggest,content_suggest FROM post_city_category WHERE id = '$id' AND skill_id IS NULL");
$post = mysql_fetch_assoc($post_qr->result);

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa bài viết tỉnh thành lĩnh vực</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sửa bài tỉnh thành viết lĩnh vực</li>
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
                            <form action="" class="insert_form" data-type="citycate" data-id="<?=$post['id'] ?>" method="POST">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="t_input mb-2">
                                            <label for="">Tên lĩnh vực</label>
                                            <input type="text" readonly class="ten_linh_vuc form-control" value="<?=$cates_arr[$post['category_id']]['category_name'] ?>">
                                            <span class="error" id="err_tencit"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="t_input mb-2">
                                            <label for="">Tên tỉnh thành</label>
                                            <input type="text" readonly class="ten_tinh_thamh form-control" value="<?= $citys_arr[$post['cit_id']]['cit_name'] ?>">
                                            <span class="error" id="err_tencit"></span>
                                        </div>

                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="t_input mb-2">
                                            <label for="">Content<span class="error">*</span></label>
                                            <textarea type="text" placeholder="Nội dung bài viết" id="content" class="content form-control"><?= $post['content'] ?></textarea>
                                            <span class="error content_er"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="t_input mb-2">
                                            <label for="">Tiêu đề gợi ý<span class="error">*</span></label>
                                            <input type="text" placeholder="Tiêu đề gợi ý" class="tieude_goiy form-control" id="tieude_goiy" value="<?= $post['title_suggest'] ?>">
                                            <span class="error tieude_er"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="t_input mb-2">
                                            <label for="">Nội dung gợi ý<span class="error">*</span></label>
                                            <textarea type="text" placeholder="Nội dung bài viết" id="noidung_goiy" class="noidung_goiy form-control"><?= $post['content_suggest'] ?></textarea>
                                            <span class="error noidung_goiy_er"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <input type="submit" class="btn_succces btn btn-primary" value="Cập nhật thông tin">
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