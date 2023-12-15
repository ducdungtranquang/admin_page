<?
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
$admin = true;
include('../../home/config.php');
if (!isset($_SESSION['UID'])) {
    header("Location: login");
}
$page_name = getValue("page_name", "str", 'GET', 'index');

if (!file_exists($page_name . '.php') == 1) {
    header('HTTP/1.0 404 Not Found');
}

$db_qr = new db_query("SELECT cit_id,cit_name FROM city ORDER BY cit_id ASC");
$citys_arr  = $db_qr->result_array('cit_id');

$db_qr_city2 = new db_query("SELECT cit_id,cit_name,cit_parent FROM city2 WHERE cit_parent > 0 ORDER BY cit_id ASC");
$distrcts_arr  = $db_qr_city2->result_array('cit_parent');

$db_qr_cate = new db_query("SELECT id_category,category_name FROM category");
$cates_arr  = $db_qr_cate->result_array('id_category');

$db_qr_skill = new db_query("SELECT id_skill,skill_name FROM skills");
$skills_arr  = $db_qr_skill->result_array('id_skill');

?>
<?
include('layout/head.php');
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?
        include('layout/navbar.php');
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?
        include('layout/sidebar.php');
        ?>

        <!-- Content Wrapper. Contains page content -->
        <? include($page_name . '.php') ?>
        <!-- /.content-wrapper -->

        <?
        include('layout/footer.php');
        ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/admin/dist/js/demo.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/admin/plugins/jszip/jszip.min.js"></script>
    <script src="/admin/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/admin/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Validate -->
    <script src="/admin/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="/admin/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- Select2 -->
    <script src="/admin/plugins/select2/js/select2.full.min.js"></script>
    <!-- Editor -->
    <script type="text/javascript" src="/admin/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/admin/ckeditor/config.js"></script>

    <script>
        CKEDITOR.replace('content');
        CKEDITOR.replace('noidung_goiy');
    </script>
    <script>
        var check_city_cate;
        $("#post_city,#post_cate").change(function() {
            let type = $('.city_insert_form').data('type');
            cit_id = $("#post_city").val();
            cate_id = $("#post_cate").val();

            let url = "";
            if (type == "citytag") {
                url = "/admin/process_code/check_city_tag.php"
            } else if (type == "citycate") {
                url = "/admin/process_code/check_city_cate.php"
            }

            $.ajax({
                url: '/admin/process_code/check_city_tag.php',
                data: {
                    cate_id: cate_id,
                    cit_id: cit_id,
                },
                dataType: "json",
                success: function(data) {
                    alert(data.msg);
                    if (data.result == false) {
                        check_city_cate = false
                    } else {
                        check_city_cate = true
                    }
                }
            })
        })
        $('.duyet_tin').change(function() {
            let id = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "/admin/process_code/duyet_tin.php",
                data: {
                    job_id: id,
                },
                dataType: "json",
                success: function(data) {
                    alert(data.msg);
                    location.reload();
                }
            })
        })
        $('.city_insert_form').submit(function() {
            if (check_city_cate == true) {
                let cit_id = $("#post_city").val();
                let cate_id = $("#post_cate").val();
                let type = $(this).data('type');
                let noidung = CKEDITOR.instances.content.getData();
                let noidung_goiy = CKEDITOR.instances.noidung_goiy.getData();
                let tieude_goiy = $('.tieude_goiy').val();
                let url = "";
                if (type == "citytag") {
                    url = "/admin/process_code/them_bai_viet_city_tag.php"
                } else if (type == "citycate") {
                    url = "/admin/process_code/them_bai_viet_city_cate.php"
                }

                if (noidung == "") {
                    $('.content_er').html("Không được để trống");
                    return false;
                } else {
                    $('.content_er').html("");
                }

                if (tieude_goiy == "") {
                    $('.tieude_er').html("Không được để trống");
                    return false;
                } else {
                    $('.tieude_er').html("");
                }

                if (noidung_goiy == "") {
                    $('.noidung_goiy_er').html("Không được để trống");
                } else {
                    $('.noidung_goiy_er').html("");
                }

                let data = new FormData();
                data.append('cit_id', cit_id);
                data.append('cate_id', cate_id);
                data.append('noidung', noidung);
                data.append('tieude_goiy', tieude_goiy);
                data.append('noidung_goiy', noidung_goiy);
                $.ajax({
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    url: url,
                    data: data,
                    async: false,
                    dataType: "json",
                    success: function(data) {
                        alert(data.msg);
                    }
                })
                return false
            } else {
                alert("Đã có bài viết");
                return false
            }
        })
    </script>
    <script>
        $('.insert_form').submit(function(event) {
            let type = $(this).data('type');
            let id = $(this).data('id');
            let noidung = CKEDITOR.instances.content.getData();
            let noidung_goiy = CKEDITOR.instances.noidung_goiy.getData();
            let tieude_goiy = $('.tieude_goiy').val();
            let url = "";
            if (type == "city") {
                url = "/admin/process_code/sua_bai_viet_tinh_thanh.php"
            } else if (type == "cate") {
                url = "/admin/process_code/sua_bai_viet_linh_vuc.php"
            } else if (type == "tag") {
                url = "/admin/process_code/sua_bai_viet_tag.php"
            } else if (type == "citycate") {
                url = "/admin/process_code/sua_bai_viet_city_cate.php"
            } else if (type == "citytag") {
                url = "/admin/process_code/sua_bai_viet_city_tag.php"
            }

            if (noidung == "") {
                $('.content_er').html("Không được để trống");
                return false;
            } else {
                $('.content_er').html("");
            }

            if (tieude_goiy == "") {
                $('.tieude_er').html("Không được để trống");
                return false;
            } else {
                $('.tieude_er').html("");
            }

            if (noidung_goiy == "") {
                $('.noidung_goiy_er').html("Không được để trống");
            } else {
                $('.noidung_goiy_er').html("");
            }
            console.log(type);

            let data = new FormData();
            data.append('id', id);
            data.append('noidung', noidung);
            data.append('tieude_goiy', tieude_goiy);
            data.append('noidung_goiy', noidung_goiy);
            $.ajax({
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                url: url,
                data: data,
                async: false,
                dataType: "json",
                success: function(data) {
                    alert("Bạn đã cập nhật thành công");
                    // location.replace("bai_viet_tinh_thanh");
                }
            })
            return false
        });
    </script>
    <script>
        $('#uv_city,#post_city').select2({
            theme: 'bootstrap4'
        })
        $('#uv_linh_vuc,#post_cate').select2({
            theme: 'bootstrap4'
        })
        $('#uv_district').select2({
            theme: 'bootstrap4'
        })
        $('#uv_skill').select2({
            theme: 'bootstrap4',
            maximumSelectionLength: 3
        })
        $('#uv_jobdesire').select2({
            theme: 'bootstrap4',
        })
        $('#uv_citydesire').select2({
            theme: 'bootstrap4',
        })
        $('#ntd_id').select2({
            theme: 'bootstrap4',
            minimumInputLength: 3,
            placeholder: 'Nhập tên nhà tuyển dụng',
            ajax: {
                url: '/admin/process_code/search_ntd.php',
                dataType: 'json',
                data: function(params) {
                    var query = {
                        search: params.term,
                    }
                    return query;
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.id_user + '.' + item.name,
                                id: item.id_user,
                                data: item,
                            }
                        })
                    };
                }
            }
        })
        //lấy danh sách kĩ năng
        function getSkill(cate_id, job_id, uv_id, element) {
            $.ajax({
                url: '/admin/process_code/get_skill.php',
                data: {
                    cate_id: cate_id,
                    uv_id: uv_id,
                    job_id: job_id,
                },
                success: function(data) {
                    $(element).html(data);
                }
            })
        }
        //lâyy danh sách quận huyên
        function getDistrict(cit_id, uv_id, element) {
            $.ajax({
                url: '/admin/process_code/get_district.php',
                data: {
                    cit_id: cit_id,
                    uv_id: uv_id,
                },
                success: function(data) {
                    $(element).html(data);
                }
            })
        }
        var uv_id = $('#uv_id').val()

        $(document).ready(function() {
            let cate_id = $('#uv_linh_vuc').val()
            let job_id = $('#job_id').val()
            getSkill(cate_id, job_id, uv_id, "#uv_skill")
            let cit_id = $('#uv_city').val()
            getDistrict(cit_id, uv_id, "#uv_district");
            console.log(cate_id + uv_id);
        });


        $('#uv_linh_vuc').change(function() {
            let cate_id = $(this).val()
            getSkill(cate_id, '', '', "#uv_skill")
        })
        $('#uv_city').change(function() {
            let cit_id = $(this).val()
            getDistrict(cit_id, uv_id, "#uv_district")

        })
        var ntd_id = ""
        $('#ntd_id').change(function() {
            let ntd_id = $(this).val()
        })
    </script>
    <script>
        $(function() {
            $("#uv_list").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#uv_list_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        $('#them_ung_vien').validate({
            rules: {
                uv_email: {
                    required: true,
                    email: true,
                    remote: {
                        url: '/admin/process_code/check_mail_uv.php',
                        type: 'POST',
                        dataType: 'json',
                    }
                },
                uv_name: {
                    required: true,
                },
                uv_pass: {
                    required: true,
                    minlength: 6,
                },
                uv_phone: {
                    required: true,
                    validatePhone: true,
                },
                uv_sex: {
                    required: true,
                },
                uv_birth: {
                    required: true,
                },
                uv_city: {
                    required: true,
                    remote: {
                        url: '/admin/process_code/check_city_job.php',
                        type: 'POST',
                        data: {
                            'ntd_id': function() {
                                return $("#ntd_id").val();
                            },
                        },
                        dataType: 'json',
                    }
                },
                uv_district: {
                    required: true,
                },
                uv_jobform: {
                    required: true,
                },
                uv_job: {
                    required: true,
                },
                uv_jobtype: {
                    required: true,
                },
                uv_jobdesire: {
                    required: true,
                },
                uv_citydesire: {
                    required: true,
                },
                uv_luong: {
                    required: true,
                },
                uv_luong1: {
                    required: true,
                },
                uv_luong2: {
                    required: true,
                },
                uv_ht_traluong: {
                    required: true,
                },
                ht_luong_time: {
                    required: true,
                },
                uv_linh_vuc: {
                    required: true,
                    remote: {
                        url: '/admin/process_code/check_cate_job.php',
                        type: 'POST',
                        data: {
                            'ntd_id': function() {
                                return $("#ntd_id").val();
                            },
                        },
                        dataType: 'json',
                    }
                },
                uv_skill: {
                    required: true,
                },
                uv_exp: {
                    required: true,
                },
                uv_des: {
                    required: true,
                },
                price_start_date: {
                    required: true,
                },
                price_end_date: {
                    required: true,
                },
                work_start_date: {
                    required: true,
                },
                work_term: {
                    required: true,
                },
                nap_diem: {
                    required: true,
                },
                job_name: {
                    required: true,
                    remote: {
                        url: '/admin/process_code/check_title_job.php',
                        type: 'POST',
                        dataType: 'json',
                    }
                },
            },
            messages: {
                uv_email: {
                    remote: "Email đã được sử dụng!"
                },
                job_name: {
                    remote: "Tiêu đề đã được sử dụng!"
                },
                uv_city: {
                    remote: "Tỉnh thành này đã có bài viêt!"
                },
                uv_linh_vuc: {
                    remote: "Lĩnh vực này đã có bài viêt!"
                },
            },

            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
        $('#sua_tin_dang').validate({
            rules: {
                uv_name: {
                    required: true,
                },
                uv_city: {
                    required: true,
                    remote: {
                        url: '/admin/process_code/check_city_job1.php',
                        type: 'POST',
                        data: {
                            'ntd_id': function() {
                                return $("#ntd_id").val();
                            },
                        },
                        dataType: 'json',
                    }
                },
                uv_jobtype: {
                    required: true,
                },
                uv_luong: {
                    required: true,
                },
                uv_luong1: {
                    required: true,
                },
                uv_luong2: {
                    required: true,
                },
                uv_ht_traluong: {
                    required: true,
                },
                ht_luong_time: {
                    required: true,
                },
                uv_linh_vuc: {
                    required: true,
                    remote: {
                        url: '/admin/process_code/check_cate_job1.php',
                        type: 'POST',
                        data: {
                            'ntd_id': function() {
                                return $("#ntd_id").val();
                            },
                        },
                        dataType: 'json',
                    }
                },
                uv_skill: {
                    required: true,
                },
                uv_exp: {
                    required: true,
                },
                price_start_date: {
                    required: true,
                },
                price_end_date: {
                    required: true,
                },
                work_start_date: {
                    required: true,
                },
                work_term: {
                    required: true,
                },
                job_name: {
                    required: true,
                },
            },
            messages: {
                uv_city: {
                    remote: "Tỉnh thành này đã có bài viêt!"
                },
                uv_linh_vuc: {
                    remote: "Lĩnh vực này đã có bài viêt!"
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });


        jQuery.validator.addMethod("validatePhone", function(uv_phone, element) {
            uv_phone = uv_phone.replace(/\s+/g, "");
            return this.optional(element) || uv_phone.length > 9 && uv_phone.length < 11 &&
                uv_phone.match(/^(0)?(\([0-9]\d{1}\)|[3]\d{1}|[9]\d{1}|[7]\d{1}|[8]\d{1}|[5]\d{1})-?[0-9]\d{2}-?\d{4}$/);
            // uv_phone.match(/^(0)?(\([9]\d{1}\)|[3]\d{1})-?[0-9]\d{2}-?\d{4}$/);
        }, "Vui lòng nhập lại số điện thoại / 03|08|07|09|05xxxxxxxx");


        // $("input[name = 'uv_luong1'], input[name = 'uv_luong2']").change(function() {

        //         // else {
        //         //     $('#dk_uocluong-error').text('Vui lòng nhập đầy đủ lương ước lượng');
        //         // }
        //     });

        function check_price() {
            var price_start = $("#price_start").val();
            var price_end = $("#price_end").val();
            if (price_start != 0 && price_end != 0) {
                price_start = parseInt(price_start);
                price_end = parseInt(price_end);
                if (price_end <= price_start) {
                    $('#price_start-error').text("Mức lương bắt đầu phải nhỏ hơn mức lương kết thúc!");

                    $('.luong_ul .invalid-feedback').show();
                    $('#price_end-error').text("");
                } else {
                    $('#price_start-error').text("");
                }
            }
        }


        $('#uv_city').change(function() {

            // $('.is-invalid').remove();
        });

        function valid_sl2(id) {
            var value_valid = $('#' + id).val();
            if (value_valid != "") {
                $('#' + id + '-error').hide();
                $('#' + id).removeClass('is-invalid');
            } else {
                $('#' + id + '-error').show();
                $('#' + id).addClass('is-invalid');
            }
            return;
        }
    </script>
</body>

</html>