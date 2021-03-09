
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <title>@yield('title')</title>

  @include('mitra.layouts.head')

</head>

<body>
    <body>
        <div id="app">
          <section class="section">
            <div class="container mt-5">
              <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                  <div class="login-brand">
                    <img src="../dist/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                  </div>
                  @if (session()->has('registerFailed'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{Session::get('registerFailed')}}.
                        </div>
                    </div>
                  @elseif(session()->has('agreeFailed'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{Session::get('agreeFailed')}}.
                        </div>
                    </div>
                  @endif
                  <div class="card card-success">
                      
                    <div class="card-header"><h4 style="color: #7fad39">Daftar Mitra</h4></div>
                    <div class="card-body">
                      <form method="POST" action="{{route('register.mitra.post')}}">
                        @csrf
                        <div class="row">

                          <div class="form-group col-12">
                            <label for="frist_name">Nama Lengkap</label>
                            <input id="frist_name" type="text" class="form-control" value="{{old('name')}}" name="name" autofocus>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Nomor Telepon</label>
                            <input id="email" type="text" class="form-control" value="{{old('phone_number')}}" name="phone_number">
                            @if ($errors->has('phone_number'))
                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email">Username</label>
                            <input id="email" type="text" class="form-control" value="{{old('username')}}" name="username">
                            @if ($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
      
                        <div class="row">
                          <div class="form-group col-6">
                            <label for="password" class="d-block">Password</label>
                            <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                          </div>
                          <div class="form-group col-6">
                            <label for="password2" class="d-block">Konfirmasi Password</label>
                            <input id="password2" type="password" class="form-control" name="password_confirm">
                            @if ($errors->has('password_confirm'))
                                <span class="text-danger">{{ $errors->first('password_confirm') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                            <label class="custom-control-label" for="agree">Saya setuju dengan syarat dan ketentuan</label>
                          </div>
                        </div>
      
                        <div class="form-group">
                          <button type="submit" class="btn btn-success btn-lg btn-block">
                            Register
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="simple-footer">
                    Copyright &copy; Stisla 2018
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>

  @include('mitra.layouts.js')

  @stack('scripts')


</body>
</html>
