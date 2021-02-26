<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Dukuh Kerupuk</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('lte/plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('lte/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('admin/header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 @include('admin/sidebar')
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
               <h3>Create Data User</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('simpan_user') }}" method="post">
                      {{ csrf_field() }}
                      <div class="form-group mt-3">
                          <input type="text" id="nama" name="nama_user" class="form-control" placeholder="Nama User" >
                      </div>
                      <div class="form-group mt-3">
                          <input type="text" id="username" name="username" class="form-control" placeholder="Username" >
                      </div>
                      <div class="formm-group mt-3">
                          <input type="text" id="password" name="password" class="form-control" placeholder="Password" >
                      </div>
                      <div class="form-group mt-3">
                          <textarea name="alamat_user" id="alamat" class="form-control" placeholder=" Alamat User"></textarea>
                      </div>
                      <div class="form-group mt-3">
                          <input type="text" id="no_tlp" name="no_tlp" class="form-control" placeholder="No Telepon" >
                      </div>
                      <div class="form-group mt-3">
                          <input type="text" id="role" name="role" class="form-control" placeholder="Role" >
                      </div>
                      <div class="form-group mt-3">
                          <button type="submit" class="btn btn-success">Simpan Data</button>
                      </div>
                </form>
            </div>

       <!-- @yield('content') -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
 @include('admin/footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ url('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('lte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>