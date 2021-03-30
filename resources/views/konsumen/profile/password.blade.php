
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    @include('layouts.header')

    <style>
        .star-rating {
        line-height:32px;
        font-size:1.25em;
        }

        .star-rating .fa-star{color: #7fad39;}
    </style>

</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}


    {{-- Navigation --}}
    @include('layouts.navigation')
    {{-- End navigation --}}

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            @include('layouts.searchbar')
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{url("ogani/img/breadcrumb.jpg")}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Akun Saya</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <a href="./index.html">Profil</a>
                            <span>Password</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{url('/konsumen/avatar/'.$user->gambar_profil)}}" alt="" style="width: 60px; height:60px; border-radius:40px">
                                </div>
                                <div class="col-8 pl-0" >
                                    <div class="account-name font-weight-bold">{{$user->nama_user}}</div>
                                    <div class="text-secondary number-phone">{{$user->no_tlp}}</div>
                                </div>
                            </div>
                            <hr style="width: 50%">
                        </div>
                        
                        <div class="sidebar__item">
                            <a class="link-account-profile" style="text-decoration: none" data-toggle="collapse" href="#profile" role="button" aria-expanded="false" aria-controls="profile">
                                <i class="icofont-user-alt-7 circle-icon text-white mr-3"></i>
                                Akun Saya
                            </a>
                            <div class="collapse mt-2" id="profile">
                                <div class="child-link">
                                    <a href="{{route('profile.konsumen')}}" class="link-account-child text-secondary" >
                                        Profile
                                    </a>
                                </div>
                                <div class="child-link mt-2">
                                    <a href="{{route('address.konsumen')}}" class="link-account-child text-secondary" >
                                        Alamat
                                    </a>
                                </div>
                                <div class="child-link mt-2">
                                    <a href="#" class="link-account-child text-secondary" >
                                        Ganti Password
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <a href="{{route('purchase.konsumen', 1)}}" class="link-account-profile" style="text-decoration: none" >
                                <i class="icofont-notepad circle-icon text-white mr-3"></i>
                                Pesanan Saya
                            </a>
                        </div>
                        <div class="sidebar__item">
                            <a href="#" class="link-account-profile" style="text-decoration: none" >
                                <i class="icofont-sale-discount circle-icon text-white mr-3"></i>
                                Coupon Saya
                            </a>
                        </div>
                        <div class="sidebar__item">
                            <a href="#" class="link-account-profile" style="text-decoration: none" >
                                <i class="icofont-ui-love circle-icon text-white mr-3"></i>
                                Produk Favorit
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="card shadow-sm">
                        <div class="card-body px-4 py-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="float-left mb-3">
                                        <div class="profile-header font-weight-bold mb-2">
                                            Ganti Password
                                        </div>
                                        <div class="profile-title">
                                            Untuk keamanan akun Anda, mohon untuk mengganti password berkala
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-lg-9 mb-5 pr-5">
                                    <div class="row mt-3">
                                        <div class="col-4 text-right">
                                            <label for="exampleInputEmail1" class="mt-1 text-secondary">Password Yang Baru</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="phone" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-4 text-right">
                                            <label for="exampleInputEmail1" class="mt-1 text-secondary">Konfirmasi Password</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-4 text-right">
                                            <label for="exampleInputEmail1" class="mt-1 text-secondary">Verifikasi</label>
                                        </div>
                                        <div class="col-4">
                                            <input type="email" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Email">
                                        </div>
                                        <div class="col-4">
                                            <button type="button" class="site-btn" style="padding:12px 12px; font-size:9px">Kirim Kode Verifikasi</button>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-4 text-right">
                                        </div>
                                        <div class="col-8">
                                            <input type="submit" class="site-btn" value="Simpan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

     <!-- Footer Section Begin -->
     @include('layouts.footer_sec')
     <!-- Footer Section End -->
 
     <!-- Js Plugins -->
     @include('layouts.js_lib')

</body>

</html>