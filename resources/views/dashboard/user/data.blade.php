@extends('dashboard.base')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">

          </section>
          <!-- /.Left col -->

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('javascript')

    <!-- jQuery -->
    <script src={{ asset("admin-lte/plugins/jquery/jquery.min.js") }}></script>
    <!-- jQuery UI 1.11.4 -->
    <script src={{ asset("admin-lte/plugins/jquery-ui/jquery-ui.min.js") }}></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src={{ asset("admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    <!-- ChartJS -->
    <script src={{ asset("admin-lte/plugins/chart.js/Chart.min.js") }}></script>
    <!-- Sparkline -->
    <script src={{ asset("admin-lte/plugins/sparklines/sparkline.js") }}></script>
    <!-- JQVMap -->
    <script src={{ asset("admin-lte/plugins/jqvmap/jquery.vmap.min.js") }}></script>
    <script src={{ asset("admin-lte/plugins/jqvmap/maps/jquery.vmap.usa.js") }}></script>
    <!-- jQuery Knob Chart -->
    <script src={{ asset("admin-lte/plugins/jquery-knob/jquery.knob.min.js") }}></script>
    <!-- daterangepicker -->
    <script src={{ asset("admin-lte/plugins/moment/moment.min.js") }}></script>
    <script src={{ asset("admin-lte/plugins/daterangepicker/daterangepicker.js") }}></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src={{ asset("admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }}></script>
    <!-- Summernote -->
    <script src={{ asset("admin-lte/plugins/summernote/summernote-bs4.min.js") }}></script>
    <!-- overlayScrollbars -->
    <script src={{ asset("admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}></script>
    <!-- AdminLTE App -->
    <script src={{ asset("admin-lte/dist/js/adminlte.js") }}></script>
    <!-- AdminLTE for demo purposes -->
    <script src={{ asset("admin-lte/dist/js/demo.js") }}></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src={{ asset("admin-lte/dist/js/pages/dashboard.js") }}></script>
@endsection
