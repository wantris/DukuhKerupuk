
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mitra Landing</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    @include('layouts.header')
    <style>
        .accordion .card-header:after {
            font-family: 'FontAwesome';  
            content: "\f068";
            float: right; 
        }
        .accordion .card-header.collapsed:after {
            /* symbol for "collapsed" panels */
            content: "\f067"; 
        }
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
                        <h2>Dukuh Kerupuk</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Mitra Landing</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 " style="padding-right: 60px">
                    <div class="heading-mitra ml-5">
                        <p class="h2" style="font-size: 50px">Gabung Menjadi Mitra</p>
                    </div>
                    <div class="mitra-title ml-5">
                        <p class="" style="font-size: 18px">Gabung Bersama Kami Menjadi Mitra dukuhkerupuk dan tingkatkan Penjualan Anda</p>
                    </div>
                    <div class="mitra-button ml-5 mt-4 d-flex">
                        <button  class="site-btn mr-3" style="box-shadow: 0 4px 4px rgb(0 0 0 / 25%);">Daftar</button>
                        <button  class="site-btn" style="background-color:#004aad;color:#fff;box-shadow: 0 4px 4px rgb(0 0 0 / 25%);">Lihat Ketentuan</button>
                    </div>
                </div>
                <div class="col-6">
                    <img class="img-fluid" src="{{url('mitra/mitra.png')}}" alt="">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 mt-4 mb-4">
                    <p class="h2 text-center font-weight-bold" style="font-family: 'Source Sans Pro', sans-serif;">
                        3 Keuntungan Menjadi Mitra
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="icon-header text-center mt-3">
                        <img src="{{url('icon/document.svg')}}" style="width: 100px; height:100px" alt="">
                    </div>
                    <div class="icon-text text-center px-5">
                        <p class="h3 mt-2" style="font-size: 28px;font-family: 'Source Sans Pro', sans-serif;">Registrasi Mitra</p>
                        <p class="mt-3" style="font-size: 16px; font-family: 'Source Sans Pro', sans-serif;">Registrasi akun untuk menningkatkan penjualan anda dan akses kemnudahan</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="icon-header text-center mt-3">
                        <img src="{{url('icon/brand.svg')}}" style="width: 100px; height:100px" alt="">
                    </div>
                    <div class="icon-text text-center px-5">
                        <p class="h3 mt-2" style="font-size: 28px;font-family: 'Source Sans Pro', sans-serif;">Manajemen Produk & Diskon</p>
                        <p class="mt-3" style="font-size: 16px; font-family: 'Source Sans Pro', sans-serif;">Anda dapat mengelola produk Anda dan memasarkannya dengan harga yang meanrik serta diskon yang akan menaikkan pendapatan Anda</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="icon-header text-center mt-3">
                        <img src="{{url('icon/wallet.svg')}}" style="width: 100px; height:100px" alt="">
                    </div>
                    <div class="icon-text text-center px-5">
                        <p class="h3 mt-2" style="font-size: 28px;font-family: 'Source Sans Pro', sans-serif;">Transaksi Mudah & Efisien</p>
                        <p class="mt-3" style="font-size: 16px; font-family: 'Source Sans Pro', sans-serif;">Proses Transaksi dapat anda laukan dengan efisien, anda hanya menerima bukti transfer dan keuntungan akan menjadi milik Anda</p>
                    </div>
                </div>
                <div class="col-12 mt-5 mb-4">
                    <p class="h2 text-center font-weight-bold" style="font-family: 'Source Sans Pro', sans-serif;">
                        Pertanyaan yang sering diajukan
                    </p>
                </div>
                <div class="col-12 mt-4">
                        <div id="accordion" style="max-width: 800px;    margin-left: auto;
                        margin-right: auto;" class="accordion">
                            <div class="card mb-0">
                                <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne">
                                    <a class="card-title">Apa itu Mitra dukuhkerupuk?</a>
                                </div>
                                <div id="collapseOne" class="card-body collapse" data-parent="#accordion">
                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>
                                </div>
                                <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    <a class="card-title">Mengapa saya harus menjadi mitra?</a>
                                </div>
                                <div id="collapseTwo" class="card-body collapse" data-parent="#accordion">
                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>
                                </div>
                                <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    <a class="card-title">Apa saja fitur pada Mitra?</a>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                    <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. samus labore sustainable VHS. </div>
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