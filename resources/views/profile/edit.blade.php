<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdonesLTE | Profile</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{ asset('plugins/fontawesome-free/css/all.min.css') }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset('dist/css/adminlte.min.css') }}>
</head>

<x-layout title="edit profile">
    <div class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit your Profile</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action= "{{env('APP_URL') . "/profile/edit"}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="profilenameinput">Name</label>
                        <input type="text" class="form-control" name="name" id="profilenameinput"
                            placeholder="Enter Your Name" value="{{Auth::user()->name}}">
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="profileemailinput">Email</label>
                        <input type="text" class="form-control" name="name" id="profileemailinput"
                            placeholder="Enter Your Email" value="{{Auth::user()->email}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="imageid">Profile Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imageid" name="image"
                                accept="image/*">
                            <label class="custom-file-label" for="imageid">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
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
