
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title >Netherrealm</title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link href="public/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <link href="https://fonts.googleapis.com/css?family=Akronim" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <h1 style="font-family: 'Akronim', cursive; font-size: 3.5rem" >N</h1>
        </div>
        <div class="sidebar-brand-text mx-3" style="font-family: 'Akronim', cursive;">Netherrealm</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">


        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Bán hàng -->
        <li class="nav-item">
        <a class="nav-link" href="?mod=customer&act=listCustomer">
          <i class="fas fa-shopping-cart"></i>
              <span>Bán hàng</span></a>
        </li>
          <!-- Quản lí -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-cog"></i>
              <span>Quản lí</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="?mod=product&act=list">
                  <i class="fas fa-book-open"></i>
                  <span>Quản lí sản phẩm</span></a>
                  <a class="collapse-item" href="?mod=customer&act=list">
                    <i class="fas fa-user-circle"></i>
                    <span>Quản lí khách hàng</span></a>
                    <a class="collapse-item" href="?mod=employee&act=list">
                      <i class="fas fa-users"></i>
                      <span>Quản lí nhân viên</span></a>
                    </div>
                  </div>
                </li>


                <!-- Heading -->
                <div class="sidebar-heading">
                  Thống kê
                </div>
                <!-- danh sách hóa đơn -->
                <li class="nav-item">
                  <a class="nav-link" href="?mod=bill&act=list">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Danh sách hóa đơn</span></a>
                  </li>

                  <!-- Báo cáo thông kê -->
                  <li class="nav-item active">
                    <a class="nav-link" href="?mod=bill&act=dashboard">
                      <i class="fas fa-fw fa-chart-area"></i>
                      <span>Báo cáo thông kê</span></a>
                    </li>

                     <div class="sidebar-heading">
                  Sự kiện
                </div>
                <li class="nav-item">
                  <a class="nav-link" href="?mod=employee&act=birthday">
                    <i class="fas fa-birthday-cake"></i>
                    <span>Sinh nhật</span></a>
                  </li>

                  

                    

                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">

                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                      <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>

                  </ul>
                  <!-- End of Sidebar -->

                  <!-- Content Wrapper -->
                  <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content">

                      <!-- Topbar -->
                      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                          <i class="fa fa-bars"></i>
                        </button>

                        

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                          <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                              <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                  <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                      <i class="fas fa-search fa-sm"></i>
                                    </button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </li>
                          <div class="topbar-divider d-none d-sm-block"></div>

                          <!-- Nav Item - User Information -->
                          <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?= $_SESSION['login']['NAME'] ?></span>
                              <img class="img-profile rounded-circle" src="public/images/employees/<?= $_SESSION['login']['PICTURE'] ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                              <a class="dropdown-item" href="?mod=employee&act=profile&CODE=<?= $_SESSION['login']['CODE']?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Thông tin cá nhân
                              </a>
                              <a class="dropdown-item" href="?mod=employee&act=edit&CODE=<?= $_SESSION['login']['CODE'] ?>">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Sửa thông tin
                              </a>
                              <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Hoạt động
                              </a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="?mod=login&act=logout" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Đăng xuất
                              </a>
                            </div>
                          </li>

                        </ul>

                      </nav>
  