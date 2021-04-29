@extends('dashboard.base')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cars</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Cars</li>
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

                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg" id="add-car">
                                Add Car
                            </button>
                      </div>
                </div>
                <div class="card-body">
                  <table id="car-table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ; ?>
                        @foreach($result as $key => $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data['name'] }}</td>
                                <td>{{ $data['category_name'] }}</td>
                                <td>{{ $data['price'] }}</td>
                                <td>{{ $data['stock'] }}</td>
                                <td>{{ $data['image'] }}</td>
                                <td align="center">
                                    <button class="btn btn-sm btn-warning">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
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
                    <h4 class="modal-title">Add Car</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="car-form">
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="email" class="form-control" id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" name="category" id="category">
                                  <option value="">-- Choose Category --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input name="price" type="text" class="form-control" id="price" placeholder="Price">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input name="image" type="file" class="form-control" id="image">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="save-btn" type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
            var table = $("#car-table").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        $("#add-car").click(function(event){
          $.ajax({
                url: "{{ route('category-box') }}",
                type:"GET",
                success:function(response){
                    console.log(response);
                    if(response) {
                      var data = response.result;
                      for (var i in data) {
                        $('#category').append('<option value='+data[i].id+'>'+data[i].name+'</option>')
                      }
                    }
                },
            });
        });

        $("#save-btn").click(function(event){
            event.preventDefault();

            let name = $("input[name=name]").val();
            let category = $("#category").val();
            let price = $("input[name=price]").val();
            let image = $("input[name=image]").val();
            let _token   = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('add-car') }}",
                type:"POST",
                data:{
                    name:name,
                    category_id:category,
                    price:price,
                    image:image,
                    _token: _token
                },
                success:function(response){
                    console.log(response);
                    if(response) {
                        // $('.success').text(response.success);
                        $("#car-form")[0].reset();
                        $('#modal-lg').modal('hide');
                        table.ajax.reload();
                    }
                },
            });
        });
    </script>
@endsection
