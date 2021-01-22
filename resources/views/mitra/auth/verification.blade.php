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
                                <div class="col-12 text-center" style="padding: 0 35px; margin:40px 0px">
                                    <div class="image-banner-otp ">
                                        <img src="{{url('icon/text-message.svg')}}" class="img-fluid" alt="">
                                    </div>
                                    <div class="title-banner-otp mt-4">
                                        <h3 class="login-mitra-banner" style="font-size: 25px">Verifikasi</h3>
                                        <p class="desc-otp mt-2" style="#25c666">Kamu akan mendapat OTP via <span class="font-weight-bold" style="color: #05386b">SMS</span></p>
                                    </div>
                                </div>
                                <div class="col-12 mt-5" style="padding: 0 35px; margin-bottom:20px">
                                    <div class="input-wrapper">
                                        <input type="text" id="input" class="form-control-register" placeholder="Kode OTP">
                                        <label for="input" class="control-label">Kode OTP</label>
                                    </div>
                                </div>
                                <div class="col-12 text-center" style="padding: 0 35px">
                                    <input type="submit" value="Verifikasi" class="register-btn-mitra">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-4">
                                    <hr/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <span style="color: #25c666; font-size:15px">Belum menerima OTP? <a href="{{route('login.mitra')}}" style="text-decoration: none; color:#05386b">Kirim lagi</a> </span>
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