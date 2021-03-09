
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
                  <img src="../dist/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                </div>
                <div class="card card-success">
                  <div class="card-header"><h4 class="text-success">Konfirmasi Nomor Telepon</h4></div>
                  <div class="card-body">
                    <div class="col-12 text-center">
                        <img src="{{url('assets-user/landing/confirmation.png')}}" alt="">
                        <p class="text-secondary">Kamu akan mendapatkan OTP via SMS</p>
                    </div>
                    <form method="POST" action="{{route('verify.mitra')}}" class="needs-validation" novalidate="">
                      @csrf
                      <div class="form-group">
                        <div class="d-block">
                        </div>
                        <input type="hidden" name="phone_number" value="{{session('phone_number')}}">
                        <input id="password" type="password" class="form-control" name="verification_code" tabindex="2" required>
                        @if ($errors->has('verification_code'))
                                <span class="text-danger">{{ $errors->first('verification_code') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                          Submit
                        </button>
                      </div>
                      <div class="mt-5 text-muted text-center">
                        Tidak mendapatkan SMS OTP? <a href="{{route('register.mitra')}}" style="color: #7fad39">Kirim Lagi</a>
                      </div>
                    </form>
                  </div>
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
