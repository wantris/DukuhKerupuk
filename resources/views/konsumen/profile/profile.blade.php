
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

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
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                            <a href="./index.html">Vegetables</a>
                            <span>Vegetable’s Package</span>
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
                                    <img src="{{url("ogani/img/latest-product/lp-1.jpg")}}" alt="" style="width: 60px; height:60px; border-radius:40px">
                                </div>
                                <div class="col-8 pl-0" >
                                    <div class="account-name font-weight-bold">Wantris</div>
                                    <div class="text-secondary number-phone">081295491852</div>
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
                                    <a href="#" class="link-account-child text-secondary" >
                                        Profile
                                    </a>
                                </div>
                                <div class="child-link mt-2">
                                    <a href="{{route('address.konsumen')}}" class="link-account-child text-secondary" >
                                        Alamat
                                    </a>
                                </div>
                                <div class="child-link mt-2">
                                    <a href="{{route('password.konsumen')}}" class="link-account-child text-secondary" >
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
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="card shadow-sm">
                        <div class="card-body px-4 py-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="profile-header font-weight-bold mb-2">
                                        Profil Saya
                                    </div>
                                    <div class="profile-title">
                                        Kelola informasi akun Anda agar dapat mengontrol, mengamankan serta melindungi akun Anda
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-lg-8 mb-5 border-right pr-5">
                                    <form action="{{route('profile.konsumen.update')}}" method="post">
                                        @csrf
                                        <div class="row mt-3">
                                            <div class="col-4 text-right">
                                                <label for="exampleInputEmail1" class="mt-1 text-secondary">Nomor Telepon</label>
                                            </div>
                                            <div class="col-8">
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="phone_number" value="{{$user->no_tlp}}" aria-describedby="emailHelp" disabled placeholder="Nomor Telepon">
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-4 text-right">
                                                <label for="exampleInputEmail1" class="mt-1 text-secondary">Nama Lengkap</label>
                                            </div>
                                            <div class="col-8">
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$user->nama_user}}" aria-describedby="emailHelp" placeholder="Nama Lengkap">
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-4 text-right">
                                                <label for="exampleInputEmail1" class="mt-1 text-secondary">Email</label>
                                            </div>
                                            <div class="col-8">
                                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{$user->email}}" aria-describedby="emailHelp" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-4 text-right">
                                                <label for="exampleInputEmail1" class="mt-1 text-secondary">Jenis Kelamin</label>
                                            </div>
                                            <div class="col-8">
                                                <div class="row">
                                                    <div class="col-lg-6 col-12">
                                                        <label class="custom-control fill-checkbox mr-3">
                                                            <input type="radio" class="fill-control-input" value="Laki-laki" name="gender" id="checkAll">
                                                            <span class="fill-control-indicator"></span>
                                                            Laki-laki
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <label class="custom-control fill-checkbox mr-3"> 
                                                            <input type="radio" class="fill-control-input" value="Perempuan" name="gender" id="checkAll">
                                                            <span class="fill-control-indicator"></span>
                                                            Perempuan
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <label class="custom-control fill-checkbox">
                                                            <input type="radio" class="fill-control-input" value="Lainnya" name="gender" id="checkAll">
                                                            <span class="fill-control-indicator"></span>
                                                            Lainnya
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-4 text-right">
                                                <label for="exampleInputEmail1" class="mt-1 text-secondary">Tanggal lahir</label>
                                            </div>
                                            <div class="col-8">
                                            <div class="row">
                                                @php
                                                    if($user->birth_day != null){
                                                        $tanggal = $user->birth_day;
                                                        $Pecah = explode( "-", $tanggal );
                                                    }
                                                @endphp
                                                <div class="col-lg-4 col-12 mb-2">
                                                        <select name="day" id="">
                                                            @if ($user->birth_day != null)
                                                                <option value="{{$Pecah[2]}}" selected>{{$Pecah[2]}}</option>
                                                            @endif
                                                            @for ($i = 1; $i <= 30; $i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                </div>
                                                <div class="col-lg-4 col-12 mb-2">
                                                        <select name="month" id="">
                                                            @php
                                                                $month = Config::get('month.month');
                                                                $parsed = eval("return " . $month . ";");
                                                                $count = count($parsed);
                                                                if($user->birth_day != null){
                                                                    $i = $Pecah[1]*1;
                                                                }
                                                            @endphp
                                                            @if ($user->birth_day != null)
                                                                <option value="{{$i}}">{{$parsed[$i]}}</option>
                                                            @endif
                                                            @for ($i = 0; $i < $count; $i++)
                                                                <option value="{{$i}}">{{$parsed[$i]}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 col-12 mb-2">
                                                        <select name="year" id="">
                                                            @if ($user->birth_day != null)
                                                                <option value="{{$Pecah[0]}}">{{$Pecah[0]}}</option>
                                                            @endif
                                                            @for ($i = 1950; $i <= now()->year; $i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-4 text-right">
                                            </div>
                                            <div class="col-8">
                                                <input type="submit" class="site-btn" value="Simpan">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <img src="https://cf.shopee.co.id/file/29c4428521eeb2b7c6f583f406d1d589_tn" class="change-profile-image " alt="">
                                        </div>
                                        <div class="col-12 text-center mt-3">
                                            <a href="#" class="site-btn" style="padding:12px 12px; font-size:12px">Pilih Gambar</a>
                                        </div>
                                        <div class="col-12 text-center mt-3">
                                            <div class="image-rule text-secondary">Ukuran gambar: maks 1MB</div>
                                            <div class="image-rule text-secondary">Format gambar: JPEG, PNG</div>
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