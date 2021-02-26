<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Akun dukuhkerupuk | Dukuhkerupuk.com</title>
    @include('layouts.head')
</head>
<body>
    

    <section class="login-mitra">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <a class="ps-logo" href="index.html" style="font-size: 25px;"><span style="color: #002e5b;font-family: 'B612', sans-serif; "><b>Dukuh</b></span><span style="color: #25c666;font-family: 'B612', sans-serif; "> <b>Kerupuk</b></span></a>
                </div>
                <div class="col-12 mt-5 text-center">
                    <p class="login-mitra-title">Silahkan masuk ke dalam akun kamu</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card shadow register-card mx-auto" style="max-width: 500px">
                        <div class="card-body">
                            <div class="row mt-3 mb-5">
                                <div class="col-12 text-center">
                                    <h3 class="login-mitra-banner"> Mitra </h3>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12 text-left mt-4" style="padding: 0 35px">
                                    <span style="color:  #05386b; font-size:14px" >Belum punya akun? <a href="{{route('register.mitra')}}" class="universal-link"> Daftar Sekarang</a> </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 " style="padding: 0 35px; margin-bottom:40px; margin-top:40px">
                                    <div class="input-wrapper">
                                        <input type="text" id="input" class="form-control-register" placeholder="Nomor Telepon ">
                                        <label for="input" class="control-label">Nomor Telepon</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 " style="padding: 0 35px;">
                                    <div class="input-wrapper">
                                        <input type="text" id="input" class="form-control-register" placeholder="Password ">
                                        <label for="input" class="control-label">Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5"  style="padding: 0 20px;">
                                <div class="col-6" >
                                    <label for=""  style="font-size: 13px">
                                        <input type="checkbox" name="" id=""> Ingat Saya
                                    </label>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="" class="universal-link">Lupa Password?</a>
                                </div>
                            </div>
                            <div class="row mt-5 mb-5">
                                <div class="col-12 text-center" style="padding: 0 35px">
                                    <input type="submit" value="Login" class="register-btn-mitra">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.js_library')
</body>
</html>