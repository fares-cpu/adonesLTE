<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | E-commerce</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{ asset('plugins/fontawesome-free/css/all.min.css') }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset('dist/css/adminlte.min.css') }}>
</head>
<x-layout title="E-commerce">
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none"> {{ $product->name }} </h3>
                        <div class="col-12">
                            <img src="{{ Storage::url($product->image1) }}" class="product-image" alt="Product Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <div class="product-image-thumb active"><img src="{{Storage::url($product->image1) }}"
                                    alt="Product Image"></div>
                            <div class="product-image-thumb"><img src="{{ Storage::url($product->image2) }}" alt="Product Image">
                            </div>
                            <div class="product-image-thumb"><img src="{{ Storage::url($product->image3) }}" alt="Product Image">
                            </div>
                            <div class="product-image-thumb"><img src="{{ Storage::url($product->image4) }}" alt="Product Image">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <a href="{{ env('APP_URL') . '/category/' . $product->category->slug }}">
                            <h5 class="my-3"> {{ $product->category->name }} </h5>
                        </a>
                        <h3 class="my-3"> {{ $product->name }} </h3>
                        <p> {{ $product->description }} </p>

                        <hr>
                        {{-- <h4>Available Colors</h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-default text-center active">
                                <input type="radio" name="color_option" id="color_option_a1" autocomplete="off"
                                    checked>
                                Green
                                <br>
                                <i class="fas fa-circle fa-2x text-green"></i>
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                                Blue
                                <br>
                                <i class="fas fa-circle fa-2x text-blue"></i>
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                                Purple
                                <br>
                                <i class="fas fa-circle fa-2x text-purple"></i>
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                                Red
                                <br>
                                <i class="fas fa-circle fa-2x text-red"></i>
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                                Orange
                                <br>
                                <i class="fas fa-circle fa-2x text-orange"></i>
                            </label>
                        </div>

                        <h4 class="mt-3">Size <small>Please select one</small></h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                                <span class="text-xl">S</span>
                                <br>
                                Small
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                                <span class="text-xl">M</span>
                                <br>
                                Medium
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                                <span class="text-xl">L</span>
                                <br>
                                Large
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                                <span class="text-xl">XL</span>
                                <br>
                                Xtra-Large
                            </label>
                        </div> --}}

                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                ${{ $product->price }}
                            </h2>
                            <h4 class="mt-0">
                                <small>Ex Tax: ${{ $product->price }} </small>
                            </h4>
                        </div>

                        <div class="mt-4">
                            @can('update', $product)
                            <a href="{{env('APP_URL') . "/product/$product->slug/edit"}}" class="btn btn-primary btn-lg btn-flat">
                                Edit
                            </a>
                            <form method="POST" action="{{env('APP_URL') . "/product/$product->slug/edit"}}">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-lg btn-flat">
                                Delete
                            </button>
                            </form>
                            @endcan
                            @cannot('update', $product)
                            <form  action="{{env('APP_URL'). '/cart/add-to-cart'}}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="hidden" name="quantity" value="1">
                                <button class="btn btn-primary" type="submit">add to cart</button>
                            </form>
                            @endcannot
                        </div>

                        <div class="mt-4 product-share">
                            <a href="#" class="text-gray">
                                <i class="fab fa-facebook-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fab fa-twitter-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fas fa-envelope-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fas fa-rss-square fa-2x"></i>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</x-layout>


<!-- jQuery -->
<script src={{ asset('plugins/jquery/jquery.min.js') }}></script>
<!-- Bootstrap 4 -->
<script src={{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
<!-- AdminLTE App -->
<script src={{ asset('dist/js/adminlte.min.js') }}></script>
<!-- AdminLTE for demo purposes -->
<script src={{ asset('dist/js/demo.js') }}></script>
<script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>
