<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | All Categories</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{ asset('plugins/fontawesome-free/css/all.min.css') }}>
    <!-- DataTables -->
    <link rel="stylesheet" href={{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset('dist/css/adminlte.min.css') }}>
</head>

<x-layout title="category index">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Categories</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="categories" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date Modefied</th>
                        @can('create', App\Models\Category::class)
                        <th>Actions</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>
                                <a href="{{ env('APP_URL') . '/category/' . $category->slug }}">
                                    {{$category->name}}
                                </a>
                            </td>
                            <td>{{$category->updated_at}}</td>
                            @can('update', $category)
                            <td>
                                <a href="{{ env('APP_URL') . "/category/$category->slug/edit" }}"
                                    class = "btn btn-primary"> edit </a>
                                    <form method="POST" action="{{env('APP_URL') . "/category/$category->slug"}}">
                                        @csrf
                                        @method('DELETE')
                                <button type="submit" class = "btn btn-danger">delete </button>
                                    </form>
                            </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
                @can('create', App\Models\Category::class)
                <a href="{{env('APP_URL') . '/category/create'}}" class="btn btn-primary"> Create a new Category</a>
                @endcan
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</x-layout>

<!-- jQuery -->
<script src={{ asset('plugins/jquery/jquery.min.js') }}></script>
<!-- Bootstrap 4 -->
<script src={{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
<!-- DataTables  & Plugins -->
<script src={{ asset('plugins/datatables/jquery.dataTables.min.js') }}></script>
<script src={{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}></script>
<script src={{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}></script>
<script src={{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}></script>
<script src={{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}></script>
<script src={{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}></script>
<script src={{ asset('plugins/jszip/jszip.min.js') }}></script>
<script src={{ asset('plugins/pdfmake/pdfmake.min.js') }}></script>
<script src={{ asset('plugins/pdfmake/vfs_fonts.js') }}></script>
<script src={{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}></script>
<script src={{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}></script>
<script src={{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}></script>
<!-- AdminLTE App -->
<script src={{ asset('dist/js/adminlte.min.js') }}></script>
<!-- AdminLTE for demo purposes -->
<script src={{ asset('dist/js/demo.js') }}></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("categories").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
</body>

</html>
