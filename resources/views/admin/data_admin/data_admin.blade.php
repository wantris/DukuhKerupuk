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
              <li class="breadcrumb-item active">Data Admin</li>
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
                <div class="card-tools">
                    <a href="{{ route('create_admin') }}" class="btn btn-success">Tambah Data
                      <i class="fa fa-plus-square"></i>
                    </a>
                </div>
                <br />
            </div>
  
            <div class="card-body">
                <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($dtAdmin as $item)
                <tr>
                    <td>{{  $item->id_admin  }}</td>
                    <td>{{  $item->nama_admin  }}</td>
                    <td>{{  $item->username  }}</td>
                    <td>{{  $item->password }}</td>
                    <td>{{  $item->alamat_admin }}</td>
                    <td>
                      <a href="{{ route('edit_admin',$item->id_admin) }}"><i class="fa fa-edit"></i></a>
                       | 
                      <a href="{{ route('delete_admin',$item->id_admin) }}"><i class="fa fa-trash" style="color: red"></i></a>
                    </td>
                </tr>
                @endforeach
                </table>
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