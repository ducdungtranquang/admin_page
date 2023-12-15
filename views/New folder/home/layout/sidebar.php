<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Freelancer.vn</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION['UID']?></a>
        </div>
        
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
              <p>
                Quản lý ứng viên
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="danh_sach_ung_vien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách ứng viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="them_ung_vien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm ứng viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="danh_sach_ung_vien_dang_ky_loi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ứng viên đăng ký lỗi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="danh_sach_ung_vien_an" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ứng viên ẩn</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class=" nav-icon fas fa-tag"></i>
              <p>
                Quản lý tag
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="danh_sach_tag" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách tag</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="them_tag" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm tag</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class=" nav-icon fas fa-user-tie"></i>
              <p>
                Quản lý nhà tuyển dụng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="danh_sach_nha_tuyen_dung" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách nhà tuyển dung</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="them_nha_tuyen_dung" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm nhà tuyển dụng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="danh_sach_nha_tuyen_dung_dang_ky_loi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách NTD đăng ký lỗi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Quản lý bài viết
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="bai_viet_tinh_thanh" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bài viết tỉnh thành</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="bai_viet_linh_vuc" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bài viết lĩnh vực</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="bai_viet_tag" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bài viết tag</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="bai_viet_city_tag" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bài viết city tag</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="bai_viet_city_cate" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bài viết city cate</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Quản lý tin đăng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="danh_sach_tin_du_an" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách tin đăng dự án</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="danh_sach_tin_ban_tg" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách tin đăng bán thời gian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="them_tin_du_an" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm tin đăng theo dự án</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="them_tin_ban_tg" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm tin đăng bán thời gian</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fab fa-pinterest-p"></i>
              <p>
                Quản lý điểm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="nap_diem" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cộng điểm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="lich_su_nap_diem" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lịch sử nạp điểm</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Đăng xuất</li>
          <li class="nav-item">
            <a href="process_code/logout.php" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Đăng xuất
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>