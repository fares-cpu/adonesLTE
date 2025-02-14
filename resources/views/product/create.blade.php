<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | create product</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href={{ asset('plugins/fontawesome-free/css/all.min.css') }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset('dist/css/adminlte.min.css') }}>
</head>
<x-layout title="Create Product">
    <div class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create a new Product</h3>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ env('APP_URL') . '/product' }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="productnameinput">Name</label>
                        <input type="text" class="form-control" name="name" id="productnameinput"
                            value="{{ old('name') }}" placeholder="Enter Category Name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="description">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="productpriceinput">Price</label>
                        <input type="number" class="form-control" name="price" id="productpriceinput"
                            value="{{ old('price') }}" placeholder="Enter the price">
                    </div>
                    <div class="form-group">
                        <label for="productoffinput">Off</label>
                        <input type="number" class="form-control" name="off" id="productoffinput"
                            value="{{ old('off') }}" placeholder="Enter the off percentage">
                    </div>
                    <div class="form-group">
                        <label for="selectcategory">Category</label>
                        <select class="custom-select form-control-border" name="category" id="selectcategory">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image1id">Main Product Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image1id" name="image1"
                                    accept="image/*">
                                <label class="custom-file-label" for="image1id">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image2id">Second Product Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image2id" name="image2"
                                    accept="image/*">
                                <label class="custom-file-label" for="image2id">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image3id">Third Product Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image3id" name="image3"
                                    accept="image/*">
                                <label class="custom-file-label" for="image3id">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image4id">Fourth Product Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image4id" name="image4"
                                    accept="image/*">
                                <label class="custom-file-label" for="image4id">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.card -->
</x-layout>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src={{ asset('plugins/jquery/jquery.min.js') }}></script>
<!-- Bootstrap 4 -->
<script src={{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
<!-- AdminLTE App -->
<script src={{ asset('dist/js/adminlte.min.js') }}></script>
</body>

</html>
