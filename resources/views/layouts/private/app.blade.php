<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield("title")</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset("asset/private/css/sb-admin-2.min.css") }}" rel="stylesheet">
    <link href="{{ asset("asset/private/vendor/datatables/dataTables.bootstrap4.min.css") }}" rel="stylesheet">
    <link
      href="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-2.0.5/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.1/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.1/sp-2.3.1/sl-2.0.1/sr-1.4.1/datatables.min.css"
      rel="stylesheet">

    <style>
      .navbar-nav .nav-link {
        color: black;
      }

      .navbar-nav .nav-link:hover {
        color: #343a40;
        /* Warna saat di-hover */
      }

      .navbar-nav .nav-item.active .nav-link {
        background-color: #d3d3d3;
        /* Warna latar belakang saat aktif */
        color: black;
        /* Warna teks saat aktif */
      }

      .navbar-nav .nav-link .fas {
        color: black;
      }

      .navbar-nav .nav-link:hover .fas {
        color: #343a40;
        /* Warna ikon saat di-hover */
      }

      .sidebar-brand {
        color: black;
      }

      .sidebar-brand .sidebar-brand-icon i {
        color: black;
      }

      .sidebar-brand:hover {
        color: #343a40;
        /* Warna saat di-hover */
      }

      .sidebar-brand:hover .sidebar-brand-icon i {
        color: #343a40;
        /* Warna ikon saat di-hover */
      }
    </style>

  </head>

  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav sidebar accordion" style="background-color: #E8D5C4;" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route("home") }}">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Isnaeni Emi Ardiani</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Route::currentRouteName() == "dashboard" ? "active" : "" }}">
          <a class="nav-link" href="{{ route("dashboard") }}">
            <i class="fas fa-fw fa-tachometer-alt text-black"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() == "admin_user" ? "active" : "" }}">
          <a class="nav-link" href="{{ route("admin_user") }}">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span>
          </a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() == "contact_response" ? "active" : "" }}">
          <a class="nav-link" href="{{ route("contact_response") }}">
            <i class="fas fa-fw fa-reply"></i>
            <span>Response</span>
          </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() == "admin_profile" ? "active" : "" }}">
          <a class="nav-link" href="{{ route("admin_profile") }}">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Profie</span>
          </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item {{ Route::currentRouteName() == "admin_setting" ? "active" : "" }}">
          <a class="nav-link" href="{{ route("admin_setting") }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Setting</span>
          </a>
        </li>

      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Nav Item - User Information -->
              <li class="nav-item">
                <a class="nav-link" style="color: black" href="#">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                  Logout
                </a>
              </li>

            </ul>

          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          @if (session("success"))
            <div class="alert alert-success">
              {{ session("success") }}
            </div>
          @endif

          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          @yield("content")
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>
                Copyright &copy;
                @if ($footer == null)
                @else
                  {{ $footer->link_footer }}
                @endif
              </span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Anda ingin keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih logout jika anda ingin mengakhiri sesi ini.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
      src="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-2.0.5/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.1/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.1/sp-2.3.1/sl-2.0.1/sr-1.4.1/datatables.min.js">
    </script>

    <script src="{{ asset("asset/private/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset("asset/private/vendor/jquery-easing/jquery.easing.min.js") }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset("asset/private/js/sb-admin-2.min.js") }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset("asset/private/vendor/chart.js/Chart.min.js") }}"></script>

    <!-- Data Tables -->
    {{-- <script src="{{ asset("asset/private/vendor/datatables/jquery.dataTables.min.js") }}"></script> --}}
    {{-- <script src="{{ asset("asset/private/vendor/datatables/dataTables.bootstrap4.min.js") }}"></script> --}}

    <!-- Page level custom scripts -->
    <script src="{{ asset("asset/private/js/demo/chart-area-demo.js") }}"></script>
    <script src="{{ asset("asset/private/js/demo/chart-pie-demo.js") }}"></script>

    @stack("tablesDashboard")
    @stack("tables")

  </body>

</html>
