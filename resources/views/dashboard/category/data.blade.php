@extends('dashboard.base')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Categories</li>
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
                                Add Category
                            </button>
                      </div>
                </div>
                <div class="card-body">
                  <table id="category-table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ; ?>
                        @foreach($result as $key => $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->description }}</td>
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
                    <h4 class="modal-title">Add Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="category-form">
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="email" class="form-control" id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input name="description" type="text" class="form-control" id="description" placeholder="Description">
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
            var table = $("#category-table").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        $("#save-btn").click(function(event){
            event.preventDefault();

            let name = $("input[name=name]").val();
            let description = $("input[name=description]").val();
            let _token   = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('add-category') }}",
                type:"POST",
                data:{
                    name:name,
                    description:description,
                    _token: _token
                },
                success:function(response){
                    console.log(response);
                    if(response) {
                        // $('.success').text(response.success);
                        $("#category-form")[0].reset();
                        $('#modal-lg').modal('hide');
                        table.ajax.reload();
                    }
                },
            });
        });
    </script>
@endsection
