
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produk</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    @include('layouts.header')
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
                            <span>Produk</span>
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
                    <form action="{{route('produk.search')}}" method="post">
                    @csrf
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Nama Produk</h4>
                            <div class="form-group">
                                <input type="text" class="text-input-field" name="keyword" placeholder="Nama Produk">
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <h4>Kategori</h4>
                            @php
                                $categories = App\ProductCategories::limit('4')->get();
                            @endphp
                            <ul>
                                @foreach ($categories as $ct)
                                    <li>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" name="category" type="checkbox" value="{{$ct->id}}" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                            {{$ct->name}}
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Harga</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content border"
                                    data-min="1000" data-max="100000">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default border"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" name="min" id="minamount">
                                        <input type="text" name="max" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <h4>Merk</h4>
                            @php
                                $mitra = App\Mitra::limit('4')->get();
                            @endphp
                            @foreach ($mitra as $mitra)
                            <div class="sidebar__item__size">
                                <label onclick="mitra('{{$mitra->id_mitra}}')" class="label-mitra_{{$mitra->id_mitra}}" for="large_{{$mitra->id_mitra}}" data-id="{{$mitra->id_mitra}}">
                                    {{$mitra->nama_mitra}}
                                    <input type="radio" name="mitra" class="mitra_radio" id="large_{{$mitra->id_mitra}}" data-id="{{$mitra->id_mitra}}" value="{{$mitra->id_mitra}}">
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <input type="submit" class="site-btn mr-3 mb-5" style="box-shadow: 0 4px 4px rgb(0 0 0 / 25%);" value="Cari">
                        </form>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Produk Terbaru</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        @php
                                            $latest = App\Product::limit('3')->get();
                                        @endphp
                                        @foreach ($latest as $lt)
                                            @php
                                                $img = App\ProductImage::where('product_id', $lt->id_produk)->where('rule',1)->first();
                                            @endphp
                                            <a href="{{route('detail.produk', $lt->slug)}}" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{url("/mitra/product_image/".$img->image)}}" style="width:120px" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{$lt->nama_produk}}</h6>
                                                    <span>Rp {{$lt->harga}}</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Produk Diskon</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @foreach ($promo as $promo)
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        @php
                                            $img = App\ProductImage::where('product_id', $promo->productRef->id_produk)->where('rule',1)->first();
                                        @endphp
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{url("/mitra/product_image/".$img->image)}}">
                                            <div class="product__discount__percent">{{$promo->jumlah_diskon*100 }}%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#" onclick="addKeranjang('{{$promo->productRef}}')"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>{{$promo->productRef->nama_produk}}</span>
                                            <h5><a href="#">{{$promo->productRef->categories->name}}</a></h5>
                                            @php
                                                $diskon = $promo->productRef->harga - ($promo->jumlah_diskon * $promo->productRef->harga);
                                            @endphp
                                            <div class="product__item__price">Rp {{number_format($diskon,'0','.','.')}} <span>Rp {{number_format($promo->productRef->harga,'0','.','.')}}</span></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select id="sort_product">
                                        <option value="0">Semua</option>
                                        <option value="1">Terbaru</option>
                                        <option value="2">Harga Tertinggi</option>
                                        <option value="3">Harga Terendah</option>
                                        <option value="4">Terlaris</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{$pr->count()}}</span> Produk ditemukan</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="list_product_id">
                        @foreach ($pr as $item)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    @php
                                        $img = App\ProductImage::where('product_id', $item->id_produk)->where('rule', 1)->first();
                                    @endphp
                                    <div class="product__item__pic set-bg" @if($img) data-setbg="{{url("/mitra/product_image/".$img->image)}} @endif">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#" onclick="addKeranjang('{{$item}}')"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="{{route('detail.produk', $item->slug)}}">{{$item->nama_produk}}</a></h6>
                                        <h5>Rp {{number_format($item->harga,'0','.','.')}}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-12 text-center">
                        {{ $pr->links('vendor.pagination.custom') }}
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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        function addKeranjang(item){
            event.preventDefault();
            item = JSON.parse(item);
            var product_id = item.id_produk;
            var qty = 1;
            var user_id = "{{Auth::guard('users')->id()}}";
            var url = "{{route('cart.save')}}";
            if(user_id != null){
                $.ajax({
                    url: url, //harus sesuai url di buat di route
                    type: "POST",
                    data: {
                        id_produk: product_id,
                        qty: qty,
                    },
                    cache: false,
                    success: function (dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            Swal.fire({
                                title: "Produk telah di tambahkan ke keranjang",
                                icon: "success",
                            });
                        } else if (dataResult.statusCode == 201) {
                            Swal.fire({
                                title: "Opps!",
                                text: dataResult.message,
                                icon: "error",
                            });
                        }
                    },
                    error: function (error) {
                        console.log(error);
                        Swal.fire({
                            title: "Opps!",
                            text: "Anda Harus login Terlebih Dahulu!",
                            icon: "error",
                        });
                    },
                });
            }else{
                Swal.fire({
                    title: "Opps!",
                    text: "Anda Harus login Terlebih Dahulu!",
                    icon: "error",
                });
            }
        }

        $('#sort_product').on('change', function (){
            var value = $(this).val(); 
            if(value != null){
                $.ajax({
                    url: "{{url('/product/sort-by/')}}/"+value, //harus sesuai url di buat di route
                    type: "GET",
                    cache: false,
                    success: function (dataResult) {
                        document.getElementById('list_product_id').innerHTML = dataResult;
                    },
                    error: function (error) {
                        console.log(error);
                        Swal.fire({
                            title: "Opps!",
                            text: "Anda Harus login Terlebih Dahulu!",
                            icon: "error",
                        });
                    },
                });
            }
        });

        function mitra(id){
            $('.label-mitra_'+id).addClass('selected');

            $('.mitra_radio').each(function(){
                var idm = $(this).data("id");
                console.log(idm);
                if(!$('#large_'+idm).is(":checked")){
                    $(this).removeClass('selected');
                }
            });

        }

        // $('.label-mitra').each(function(){
        //     $(this).on('click', function(){
        //         var id = $(this).data("id");
        //         console.log(id);
        //         if( ! $('.mitra_'+id).is('checked')){
        //             $(this).addClass('selected');
        //         }else{
        //             $(this).removeClass('selected');
        //         }
        //     });
        // });

    </script>

</body>

</html>