
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
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="topnav shadow-sm">
                        <a href="{{route('purchase.konsumen', 1)}}">Semua</a>
                        <a class="active" href="{{route('purchase.konsumen', 2)}}">Belum Bayar</a>
                        <a href="{{route('purchase.konsumen', 3)}}">Cek Bukti</a>
                        <a href="{{route('purchase.konsumen', 4)}}">Dikemas</a>
                        <a href="{{route('purchase.konsumen', 5)}}">Dikirim</a>
                        <a href="{{route('purchase.konsumen', 6)}}">Selesai</a>
                        <a href="{{route('purchase.konsumen', 7)}}">COD</a>
                      </div>
                    <div class="card shadow-sm mt-3">
                        <div class="card-body px-4 py-4" style="height: 500px">
                            @if ($ts->count() > 0)
                                <div class="row">
                                    <div class="col-12">
                                        <table id="table-ts" class="table table-striped table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nota</th>
                                                    <th>Mitra</th>
                                                    <th>Total Harga</th>
                                                    <th>Diskon</th>
                                                    <th>Pengiriman</th>
                                                    <th>Status Bayar</th>
                                                    <th>Tanggal Transaksi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ts as $item)
                                                    <tr>
                                                        <td>{{$item->id}}</td>
                                                        <td>{{$item->kd_transaksi}}</td>
                                                        <td>{{$item->mitraRef->nama_mitra}}</td>
                                                        <td>{{$item->total_harga}}</td>
                                                        <td>{{$item->diskon}}</td>
                                                        <td>{{$item->pengiriman}}</td>
                                                        <td>{{$item->status}}</td>
                                                        <td>{{$item->created_at->isoFormat('D MMMM Y')}}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="#" class="site-btn mr-3" style="padding:12px 12px; font-size:12px">Detail</a>
                                                                @if ($item->status === "pending")
                                                                    <a href="#" class="site-btn mr-3" style="padding:12px 12px; font-size:12px;background-color:#f56954">Bayar</a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                            
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else 
                            <div class="row" style="margin-top:150px">
                                <div class="mx-auto">
                                    <img src="{{url('icon/note2.svg')}}" style="max-width: 130px;height:auto;" alt="">
                                    <div class="text-secondary">Belum Ada Pesanan</div>
                                </div>
                            </div>
                            @endif

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

     <script>
         $(document).ready( function () {
            $('#table-ts').DataTable();
        } );
     </script>

</body>

</html>