<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lucky Shop</title>


  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/ekko-lightbox/ekko-lightbox.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link href="{{ asset('') }}" rel="stylesheet">
  <link href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <!-- DataTables -->
  <link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
  <!-- Theme style -->
  <link href="{{ asset('admin/dist/css/adminlte.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    LuckyShop
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/product') }}">หน้าหลัก</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/order') }}">สั่งซื้อ</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/payment') }}">ชำระเงิน</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li>
                        <form class="d-flex">
                        <a href="{{ url('/order-product') }}" type="button" class="btn btn-outline-dark">
                            <i class="fas fa-shopping-cart"></i> ตะกร้า 
                            <!-- <span class="badge bg-dark text-white ms-1 rounded-pill">0</span> -->
                        </a>
                    </form>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> 
                                    <!-- <a class="dropdown-item" href="{{ url('/product') }}">
                                        <i class="fa fa-home text-primary"></i> หน้าหลัก
                                    </a>
                                
                                    <a class="dropdown-item" href="{{ url('/order-product') }}">
                                        <i class="fa fa-shopping-cart text-primary"></i> ตะกร้าของฉัน
                                    </a> 

                                    <a class="dropdown-item" href="{{ url('/order') }}">
                                        <i class="fa fa-box text-primary" ></i> คำสั่งซื้อของฉัน
                                    </a>

                                    <a class="dropdown-item" href="{{ url('/payment') }}">
                                        <i class="fa fa-credit-card text-primary"></i> แจ้งการชำระเงิน
                                    </a>  -->
                                    @if(Auth::check())
                                        @if(Auth::user()->role == "admin")
                                            <!-- <a class="dropdown-item" href="{{ url('/order-product/reportdaily') }}">
                                                <i class="fa fa-file text-primary"></i> รายงานรายวัน
                                            </a>
                                            <a class="dropdown-item" href="{{ url('/order-product/reportmonthly') }}">
                                                <i class="fa fa-file text-primary"></i> รายงานรายเดือน
                                            </a>
                                            <a class="dropdown-item" href="{{ url('/order-product/reportyearly') }}">
                                                <i class="fa fa-file text-primary"></i> รายงานรายปี
                                            </a> -->
                                            <a class="dropdown-item" href="{{ url('/admin/stock') }}">
                                                <i class="fas fa-users-cog text-primary"></i> Admin
                                            </a>
                                        @endif
                                    @endif
                                    <!-- @if (Auth::user()->role  == "admin" )
                                    <a class="dropdown-item" href="{{ url('/admin/user') }}">
                                        Users
                                    </a>
                                    @endif -->

                                    @if (Auth::user()->role  == "guest" )
                                    <a class="dropdown-item" href="{{ url('admin/users/' . Auth::user()->id . '/edit') }}">
                                        Profile
                                    </a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ออกจากระบบ') }}
                                    </a>
                                   
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <br>
    <div class="col-md-12">
        @yield('content')
    </div>
            
      
<!-- ./wrapper -->

<!-- Ekko Lightbox -->
<script src="{{ asset('admin/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<!-- Filterizr-->
<script src="{{ asset('admin/plugins/filterizr/jquery.filterizr.min.js')}}"></script>
<!-- FLOT CHARTS -->
<script src="{{ asset('admin/plugins/flot/jquery.flot.js')}}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{ asset('admin/plugins/flot/plugins/jquery.flot.resize.js')}}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{ asset('admin/plugins/flot/plugins/jquery.flot.pie.js')}}"></script>
<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js')}}"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }
        ]
    } );
} );
  });
</script>
<script>
  function goBack() {
    window.history.back();
  }
</script>
</body>
</html>
