<?
$id_tag = getValue('id', 'int', "GET", "");
$tag_qr = new db_query("SELECT * FROM skills WHERE id_skill = $id_tag");
$tag_detail = mysql_fetch_assoc($tag_qr->result);

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cộng điểm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Cộng điểm</li>
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
                            <form id="them_ung_vien" method="POST" action="/admin/process_code/nap_diem.php" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="uv_id" value="<?= $tag_detail['id_skill'] ?>">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Tên nhà tuyển dụng</label>
                                            <span class="badge badge-danger">*</span>
                                            <select class="form-control" name="uv_name" id="ntd_id" value="">
                                                <option value="">Tìm nhà tuyển dụng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Điểm</label>
                                            <span class="badge badge-danger">*</span>
                                            <input type="number" min="1" class="form-control" name="nap_diem" placeholder="Nhập số điểm..." >
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