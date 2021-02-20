
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alamat</title>

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
                                    <a href="#" class="link-account-child text-secondary" >
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
                            <a href="#" class="link-account-profile" style="text-decoration: none" >
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
                                    <div class="float-left mb-3">
                                        <div class="profile-header font-weight-bold mb-2">
                                            Alamat Saya
                                        </div>
                                        <div class="profile-title">
                                            Kelola alamat Anda untuk melakukan proses pembelian
                                        </div>
                                    </div>
                                    <a href="#" class="site-btn float-right" style="padding:12px 12px; font-size:12px" data-toggle="modal" data-target="#add-address"><i class="icofont-plus mr-2"></i>Tambah Alamat</a>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-4">
                                <div class="col-lg-8 col-12">
                                    <div class="row mb-1">
                                        <div class="col-3 text-right">
                                            <label for="" class="text-secondary">Nama Kamu</label>
                                        </div>
                                        <div class="col-5">
                                            <label for="" class="text-secondary font-weight-bold">Wantrisnadi</label>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-3 text-right">
                                            <label for="" class="text-secondary">Telepon</label>
                                        </div>
                                        <div class="col-5">
                                            <label for="" class="text-secondary">0812954918652</label>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-3 text-right">
                                            <label for="" class="text-secondary">Alamat</label>
                                        </div>
                                        <div class="col-8">
                                            <label for="" class="text-secondary">Ujung Harapan, Gang H Mahbub No.121, RT.5/RW.14, Babelan Kota, Babelan
                                                KAB. BEKASI - BABELAN
                                                JAWA BARAT
                                                ID 17612</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 text-center">
                                    <div class="flex">
                                        <a href="#" class="site-btn mr-3" style="padding:12px 12px; font-size:12px" data-toggle="modal" data-target="#add-address">Ubah</a>
                                        <a href="#" class="site-btn" style="padding:12px 12px; font-size:12px; background-color:#f56954" >Hapus</a>
                                    </div>
                                    <div class="mt-3">
                                        <a href="#" class="site-btn" style="padding:12px 12px; font-size:12px; background-color:#3c8dbc" >Jadikan Utama</a>
                                    </div>
                                </div>
                            </div>
                            <hr style="width: 50%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    {{-- modal add address --}}
    <div class="modal fade" id="add-address" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body px-4 py-4">
                <div class="container-fluid">
                    <div class="address-header mt-4 mb-4">Tambah Alamat Baru</div>
                    <div class="row mb-3">
                    <div class="col-6">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Nama Lengkap">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="phone" aria-describedby="emailHelp" placeholder="Nomor Telepon">
                    </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <select name="province" id="province-select" size="5">
                                <option selected>Pilih Provinsi</option>
                                @foreach ($province as $province)
                                <option value="{{$province->province_id}}">{{$province->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <select name="city_destination" id="city-select">
                                <option>Pilih Kota</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <input type="text" class="form-control" id="exampleInputEmail1" name="pos_code" aria-describedby="emailHelp" placeholder="Kode Pos">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <input type="text" class="form-control" id="exampleInputEmail1" name="pos_code" aria-describedby="emailHelp" placeholder="Kode Pos">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <textarea name="street_address" id="" class="form-control">Nama jalan, Gedung atau No.rumah</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="site-btn float-right" style="padding:12px 12px; font-size:12px; background-color:#05386b" data-dismiss="modal">Close</button>
                <button type="button" class="site-btn float-right" style="padding:12px 12px; font-size:12px">Simpan</button>
            </div>
        </div>
        </div>
    </div>

     <!-- Footer Section Begin -->
     @include('layouts.footer_sec')
     <!-- Footer Section End -->
 
     <!-- Js Plugins -->
     @include('layouts.js_lib')


     <script>
         $('#province-select').on('change', function(){
            let provindeId = $(this).val();
            console.log(provindeId);
            // if (provindeId != "") {
                jQuery.ajax({
                    url: 'cities/'+provindeId,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                       
                        $('#city-select').empty();
                        $('#city-select').append('<option value="">Pilih Kota</option>');
                        $.each(response, function (key, value) {
                            $('#city-select').append('<option value="' + key + '">' + value + '</option>');
                        });
                        $('#city-select').niceSelect('update');
                    },
                    error:function(error){
                        console.log(error);
                    }
                });
            // }
        })
     </script>
</body>

</html>