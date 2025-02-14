<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdonesLTE 3 | Cart</title>

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

<x-layout title="Cart">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Cart</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <form method="POST" action="{{env('APP_URL') . '/cart/order'}}">
            <table id="cart_items" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($cart->cart_items as $cart_item)
                            <tr>
                                <td>
                                    <a href="{{ env('APP_URL') . '/product/' . $cart_item->product->slug }}">
                                        {{ $cart_item->product->name }}
                                    </a>
                                </td>
                                <td>
                                    <input type="range" min="1" max="{{$cart_item->product->instock}}" name="quantity" value="{{$cart_item->quantity}}">
                                </td>
                    <td>
                        <form method="POST" action="{{ env('APP_URL') . '/cart/delItem' }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="product_name" value="{{$cart_item->product->name}}">
                            <button type="submit" class = "btn btn-danger">delete </button>
                        </form>
                    </td>

                    </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
            <button type="submit" class="btn btn-primary">Order</button>
        </form>
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
