
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <title>@yield('title')</title>

  @include('mitra.layouts.head')

</head>

<body>
    <div id="app">
        <section class="section">
          <div class="container mt-5">
            <div class="row">
              <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                  <img src="{{url("ogani/img/logo2.png")}}" alt="logo" width="100" class="shadow-light rounded-circle">
                </div>
                @if (session()->has('verifySuccess'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{Session::get('verifySuccess')}}.
                        </div>
                    </div>
                @endif
                <div class="card card-success">
                  <div class="card-header"><h4 class="text-success">Login Mitra</h4></div>
                  <div class="card-body">
                    <form method="POST" action="{{route('login.mitra.post')}}" class="needs-validation" novalidate="">
                      @csrf
                      <div class="form-group">
                        <label for="email">Username</label>
                        <input id="email" type="text"  class="form-control" name="username" tabindex="1" required autofocus>
                        <div class="invalid-feedback">
                          Tolong input username kamu
                        </div>
                      </div>
    
                      <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">Password</label>
                          <div class="float-right">
                            <a href="auth-forgot-password.html" class="text-small" style="color: #7fad39">
                              Forgot Password?
                            </a>
                          </div>
                        </div>
                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                        <div class="invalid-feedback">
                          Tolong input password kamu
                        </div>
                      </div>
    
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input" tabindex="3" id="remember-me">
                          <label class="custom-control-label" for="remember-me">Remember Me</label>
                        </div>
                      </div>
    
                      <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                          Login
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="mt-5 text-muted text-center">
                  Belum punya akun Mitra? <a href="{{route('register.mitra')}}" style="color: #7fad39">Daftar Sekarang</a>
                </div>
                <div class="simple-footer">
                  Copyright &copy; DukuhKerupuk 2021
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
