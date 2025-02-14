<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | DataTables</title>

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
<x-layout title="{{$category->name}} products">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$category->name}} Products</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="category_products" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Off</th>
                        <th>Category</th>
                        <th>Date Modefied</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category->products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>
                                <a href="{{ env('APP_URL') . '/product/' . $product->slug }}">
                                    {{$product->name}}
                                </a>
                            </td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->off}}</td>
                            <td>
                                <a href="{{env('APP_URL') . '/category/' . $product->category->slug }}">
                                {{$product->category}}
                                </a>
                            </td>
                            <td>{{$product->updated_at}}</td>
                            <td>
                                @can('update', $product)
                                <a href="{{ env('APP_URL') . "/product/$product->slug/edit" }}"
                                    class = "btn btn-primary"> edit </a>
                                    <form method="POST" action="{{env('APP_URL') . "/product/$product->slug"}}">
                                        @csrf
                                        @method('DELETE')
                                <button type="submit" class = "btn btn-danger">delete </button>
                                    </form>
                                @endcan
                                @cannot('update', $product)
                                <form  action="{{env('APP_URL'). '/cart/addToCart'}}" method="post">
                                    <input type="hidden" name="product" value="{{$product->id}}">
                                    <input type="hidden" value="1">
                                    <button class="btn btn-primary" type="submit">add to cart</button>
                                </form>
                                @endcannot
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot></tfoot>
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
        $("category_products").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
</body>

</html>
