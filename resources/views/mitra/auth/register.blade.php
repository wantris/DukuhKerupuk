<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Akun dukuhkerupuk | Dukuhkerupuk.com</title>
    @include('layouts.head')
</head>
<body>

    <section class="register-mitra">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <a class="ps-logo" href="index.html" style="font-size: 25px;"><span style="color: #002e5b;font-family: 'B612', sans-serif; "><b>Dukuh</b></span><span style="color: #25c666;font-family: 'B612', sans-serif; "> <b>Kerupuk</b></span></a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card shadow register-card mx-auto">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-center"><h3 class="register-mitra-title">Daftar Mitra, yuk</h3></div>
                            </div>
                            <div class="row">
                                <div class="col-12 " style="padding: 0 35px; margin:40px 0px">
                                    <div class="input-wrapper">
                                        <input type="text" id="input" class="form-control-register" placeholder="Nomor Telepon ">
                                        <label for="input" class="control-label">Nomor Telepon</label>
                                    </div>
                                    <small id="register-small" class="form-text text-muted">Misal: 081234567890.</small>
                                </div>
                                <div class="col-12" style="padding: 0 35px; margin-bottom:20px">
                                    <div class="input-wrapper">
                                        <input type="text" id="input" class="form-control-register" placeholder="Password">
                                        <label for="input" class="control-label">Password</label>
                                    </div>
                                </div>
                                <div class="col-12 text-center" style="padding: 0 35px">
                                    <input type="submit" value="Daftar" class="register-btn-mitra">
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12 mt-4">
                                    <hr/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <span style="color: #7fad39; font-size:15px">Sudah punya akun? <a href="{{route('login.mitra')}}" style="text-decoration: none; color:#05386b">Login</a> </span>
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