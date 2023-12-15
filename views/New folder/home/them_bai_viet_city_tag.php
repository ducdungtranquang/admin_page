<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm bài viết tỉnh thành kĩ năng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thêm bài viết tỉnh thành kĩ năng</li>
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
                            <form action="#" class="city_insert_form" data-type="citytag" data-id="<?= $post['id'] ?>" method="POST">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="t_input mb-2">
                                            <label for="">Tên kĩ năng</label>
                                            <select class="form-control" name="uv_jobdesire" id="post_cate">
                                                <option value="">Chọn kĩ năng</option>
                                                <?
                                                foreach ($skills_arr as $skill) {
                                                ?>
                                                    <option value="<?= $skill['id_skill'] ?>"><?= $skill['skill_name'] ?></option>
                                                <?
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="t_input mb-2">
                                            <label for="">Tên tỉnh thành</label>
                                            <select class="form-control" name="uv_city" id="post_city">
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
                                    <div class="col-md-12 mb-2">
                                        <div class="t_input mb-2">
                                            <label for="">Content<span class="error">*</span></label>
                                            <textarea type="text" placeholder="Nội dung bài viết" id="content" class="content form-control"></textarea>
                                            <span class="error content_er"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="t_input mb-2">
                                            <label for="">Tiêu đề gợi ý<span class="error">*</span></label>
                                            <input type="text" placeholder="Tiêu đề gợi ý" class="tieude_goiy form-control" id="tieude_goiy" value="">
                                            <span class="error tieude_er"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="t_input mb-2">
                                            <label for="">Nội dung gợi ý<span class="error">*</span></label>
                                            <textarea type="text" placeholder="Nội dung bài viết" id="noidung_goiy" class="noidung_goiy form-control"><</textarea>
                                            <span class="error noidung_goiy_er"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <input type="submit" id="post_submit" class="btn_succces btn btn-primary" value="Tạo bài viết">
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