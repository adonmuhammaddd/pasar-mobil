@extends('dashboard.base')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Stock In</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Stock In</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                      <div class="card-tools">

                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg">
                                Add Stock
                            </button>
                      </div>
                </div>
                <div class="card-body">
                  <table id="customer-table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Car</th>
                        <th>Phone</th>
                        <th>Address</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ; ?>
                        @foreach($result as $key => $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->address }}</td>
                            </tr>
                        @endforeach()
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="customer-form">
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="email" class="form-control" id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input name="phone" type="text" class="form-control" id="phone" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input name="address" type="text" class="form-control" id="address" placeholder="Address">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="save-btn" type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

@endsection

@section('javascript')

    <!-- jQuery -->
    <script src={{ asset("admin-lte/plugins/jquery/jquery.min.js") }}></script>
    <!-- Bootstrap 4 -->
    <script src={{ asset("admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    <script src={{ asset("admin-lte/plugins/datatables/jquery.dataTables.min.js") }}></script>
    <script src={{ asset("admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}></script>
    <script src={{ asset("admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js") }}></script>
    <script src={{ asset("admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}></script>
    <script src={{ asset("admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js") }}></script>
    <script src={{ asset("admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js") }}></script>
    <script src={{ asset("admin-lte/plugins/jszip/jszip.min.js") }}></script>
    <script src={{ asset("admin-lte/plugins/pdfmake/pdfmake.min.js") }}></script>
    <script src={{ asset("admin-lte/plugins/pdfmake/vfs_fonts.js") }}></script>
    <script src={{ asset("admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js") }}></script>
    <script src={{ asset("admin-lte/plugins/datatables-buttons/js/buttons.print.min.js") }}></script>
    <script src={{ asset("admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js") }}></script>

    <script src={{ asset("admin-lte/dist/js/adminlte.js") }}></script>

    <script>
        $(function () {
            var table = $("#customer-table").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        $("#save-btn").click(function(event){
            event.preventDefault();

            let name = $("input[name=name]").val();
            let phone = $("input[name=phone]").val();
            let address = $("input[name=address]").val();
            let _token   = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('add-customer') }}",
                type:"POST",
                data:{
                    name:name,
                    phone:phone,
                    address:address,
                    _token: _token
                },
                success:function(response){
                    console.log(response);
                    if(response) {
                        // $('.success').text(response.success);
                        $("#customer-form")[0].reset();
                        $('#modal-lg').modal('hide');
                        table.ajax.reload();
                    }
                },
            });
        });
    </script>
@endsection
