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
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin/stock') }}" class="brand-link">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('admin/stock') }}" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                จัดการสินค้า
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/category') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                จัดการหมวดหมู่สินค้า
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/order') }}" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                รายงานการสั่งซื้อ
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/payment') }}" class="nav-link">
              <i class="nav-icon fas fa-money-bill-alt"></i>
              <p>
                รายงานการชำระเงิน
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/user') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
              <p>
                 จัดการผู้ใช้
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                รายงานยอดขาย
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/order-product/reportdaily') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ยอดขายรายวัน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/order-product/reportmonthly') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ยอดขายรายเดือน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/order-product/reportyearly') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ยอดขายรายปี</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


    @yield('content')
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
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
      "buttons": [
        { extend: 'print', key: 'p', text: 'พิมพ์' , title: "รายงานสินค้า"}],
      "oLanguage": {
                      "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                      "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                      "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                      "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                      "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                      "sSearch": "ค้นหา :",
                    }
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("#stock").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [
        { extend: 'print', key: 'p', text: 'พิมพ์' , title: "<center>รายงานสินค้า</center>"}],
      "oLanguage": {
                      "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                      "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                      "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                      "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                      "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                      "sSearch": "ค้นหา :",
                      "oPaginate": 
                        {
                          "sNext": "ถัดไป",
                          "sPrevious": "กลับ"
                        }
                    }
                    
    }).buttons().container().appendTo('#stock_wrapper .col-md-6:eq(0)');

  $("#order").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [
        { extend: 'print', key: 'p', text: 'พิมพ์' , title: "<center>รายงานการสั่งสินค้า</center>"}],
      "oLanguage": {
                      "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                      "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                      "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                      "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                      "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                      "sSearch": "ค้นหา :",
                      "oPaginate": 
                        {
                          "sNext": "ถัดไป",
                          "sPrevious": "กลับ"
                        }
                    }
    }).buttons().container().appendTo('#order_wrapper .col-md-6:eq(0)');

    $("#payment").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [
        {   extend: 'print', 
            key: 'p', 
            text: 'พิมพ์' , 
            title: " <center> รายงานการชำระเงิน <center>"
        }],
      "oLanguage": {
                      "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                      "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                      "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                      "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                      "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                      "sSearch": "ค้นหา :",
                      "oPaginate": 
                        {
                          "sNext": "ถัดไป",
                          "sPrevious": "กลับ"
                        }
                    }
    }).buttons().container().appendTo('#payment_wrapper .col-md-6:eq(0)');


    $("#user").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [
        {   extend: 'print', 
            key: 'p', 
            text: 'พิมพ์' , 
            title: " <center> รายงานผู้ใช้ระบบ <center>"
        }],
      "oLanguage": {
                      "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                      "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                      "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                      "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                      "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                      "sSearch": "ค้นหา :",
                      "oPaginate": 
                        {
                          "sNext": "ถัดไป",
                          "sPrevious": "กลับ"
                        }
                    }
    }).buttons().container().appendTo('#user_wrapper .col-md-6:eq(0)');

    $("#report").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [
        {   extend: 'print', 
            key: 'p', 
            text: 'พิมพ์' , 
            title: " <center> รายงานยอดขาย <center>"
        }],
      "oLanguage": {
                      "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                      "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                      "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                      "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                      "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                      "sSearch": "ค้นหา :",
                      "oPaginate": 
                        {
                          "sNext": "ถัดไป",
                          "sPrevious": "กลับ"
                        }
                    }
    }).buttons().container().appendTo('#report_wrapper .col-md-6:eq(0)');

    $("#category1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [
        {   extend: 'print', 
            key: 'p', 
            text: 'พิมพ์' , 
            title: " <center> รายงานหมวดหมู่สินค้า <center>"
        }],
      "oLanguage": {
                      "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                      "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                      "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                      "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                      "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                      "sSearch": "ค้นหา :",
                      "oPaginate": 
                        {
                          "sNext": "ถัดไป",
                          "sPrevious": "กลับ"
                        }
                    }
    }).buttons().container().appendTo('#category1_wrapper .col-md-6:eq(0)');
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
