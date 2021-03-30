
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$pr->nama_produk}}</title>

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
                        <h2>{{$pr->nama_produk}}</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <a href="./index.html">Detail produk</a>
                            <span>{{$pr->nama_produk}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            @php
                                $img = App\ProductImage::where('product_id', $pr->id_produk)->where('rule', 1)->first();
                            @endphp
                            <img class="product__details__pic__item--large"
                                src="{{url("/mitra/product_image/".$img->image)}}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            @php
                                $rowImg = App\ProductImage::where('product_id', $pr->id_produk)->get();
                            @endphp
                            @if ($img->count() > 0)
                                @foreach ($rowImg as $item)
                                    <img data-imgbigurl="{{url("/mitra/product_image/".$item->image)}}"
                                    src="{{url("/mitra/product_image/".$item->image)}}" alt="">
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$pr->nama_produk}}</h3>
                        {{-- <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div> --}}
                        @php
                            $promo = App\Promo::where('product_id', $pr->id_produk)->orderBy('created_at','DESC')->first();
                            if($promo){
                                if($promo->tipe_diskon === "presentase"){
                                    $diskon = $pr->harga - ($pr->harga * $promo->jumlah_diskon);
                                }else{
                                    $diskon = $pr->harga - $promo->jumlah_diskon;
                                }
                            }
                        @endphp
                        <div class="product__details__price d-flex mt-5">
                            @if($promo)
                                <span class="mr-2" style="text-decoration: line-through">Rp {{number_format($pr->harga,'0','.','.')}}</span>
                                <span>Rp {{number_format($diskon,'0','.','.')}}</span> 
                            @else 
                                <span class="mr-2">Rp {{number_format($pr->harga,'0','.','.')}}</span>
                            @endif
                        </div>
                        <p>{{$pr->deskripsi_produk}}</p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" id="qty_inp" value="1">
                                </div>
                            </div>
                        </div>
                        <a href="#" onclick="addKeranjang('{{$pr}}')" class="primary-btn">ADD TO CARD</a>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Stok</b> <span>{{$pr->stok}}</span></li>
                            <li><b>Terjual</b> <span>{{$pr->penjualan}}</span></li>
                            <li><b>Kadaluwarsa Produk</b> <span>{{$pr->expireds->name}}</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Tentang Mitra</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Informasi Produk</h6>
                                    <p>{{$pr->deskripsi_produk}}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Mitra</h6>
                                    <div class="col-md-12">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-5 col-12">
                                                        <div class="row">
                                                            @php
                                                                $mitra = App\Mitra::where('id_mitra', $pr->id_mitra)->first();
                                                                $produk = App\Product::where('id_mitra', $pr->id_mitra)->get();
                                                            @endphp
                                                            <div class="col-4 ">
                                                                <img src="{{url("ogani/img/product/product-1.jpg")}}" class="mitra-img-product" alt="">   
                                                            </div>
                                                            <div class="col-8 border-right">
                                                                <div class="mitra-title">{{$mitra->nama_mitra}}</div>
                                                                <div class="mitra-time text-secondary mb-3"><i class="icofont-wall-clock mr-2"></i>Aktif 5 jam lalu</div>
                                                                <div class="mitra-shop-detail-btn">
                                                                    <a href="" class="chat-mitra-btn float-left mb-2"><i class="fa fa-comments" aria-hidden="true"></i> Chat Mitra</a>
                                                                    <a href="" class="shop-mitra-btn float-left" style=""><i class="fa fa-shopping-bag" aria-hidden="true"></i> Kunjungi Mitra</a>
                                                                  </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <div class="row mt-3">
                                                            <div class="col-4 ">
                                                                <div class="d-flex view-mitra">
                                                                    <label for="" class="mr-3">Penilaian</label>
                                                                    <span style="color: #05386b">8rb</span>
                                                                </div>
                                                                <div class="d-flex view-mitra">
                                                                    <label for="" class="mr-3">Produk</label>
                                                                    <span style="color: #05386b">{{$produk->count()}}</span>
                                                                  </div>
                                                            </div>
                                                            <div class="col-7 ">
                                                                <div class="d-flex view-mitra">
                                                                    <label for="" class="mr-3">Bergabung</label>
                                                                    <span style="color: #05386b">{{$mitra->created_at->diffForHumans()}}</span>
                                                                </div>
                                                                <div class="d-flex view-mitra">
                                                                    <label for="" class="mr-3">Pengikut</label>
                                                                    <span style="color: #05386b">2rb</span>
                                                                  </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">
                                    <div class="container">
                                    <div class="col-md-12">
                                        <div class="offer-dedicated-body-left">
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade active show" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                                                    <div id="ratings-and-reviews" class="bg-white rounded shadow p-4 mb-4 clearfix restaurant-detailed-star-rating">
                                                        <div class="star-rating float-right">
                                                            <span class="fa fa-star-o" data-rating="1"></span>
                                                            <span class="fa fa-star-o" data-rating="2"></span>
                                                            <span class="fa fa-star-o" data-rating="3"></span>
                                                            <span class="fa fa-star-o" data-rating="4"></span>
                                                            <span class="fa fa-star-o" data-rating="5"></span>
                                                            <input type="hidden" name="whatever1" class="rating-value" value="2.56">
                                                          </div>
                                                        <h5 class="mb-0 pt-1">Rate this Place</h5>
                                                    </div>
                                                    <div class="bg-white rounded shadow p-4 mb-4 clearfix graph-star-rating">
                                                        <h5 class="mb-0 mb-4">Ratings and Reviews</h5>
                                                        <div class="graph-star-rating-header">
                                                            <div class="star-rating">
                                                                <a><i class="icofont-ui-rating text-green"></i></a>
                                                                <a><i class="icofont-ui-rating text-green"></i></a>
                                                                <a><i class="icofont-ui-rating text-green"></i></a>
                                                                <a><i class="icofont-ui-rating"></i></a>
                                                                <a><i class="icofont-ui-rating"></i></a> <b class="text-black ml-2">334</b>
                                                            </div>
                                                            <p class="text-black mb-4 mt-2">Rated 3.5 out of 5</p>
                                                        </div>
                                                        <div class="graph-star-rating-body">
                                                            <div class="rating-list">
                                                                <div class="rating-list-left text-black">
                                                                    5 Star
                                                                </div>
                                                                <div class="rating-list-center">
                                                                    <div class="progress">
                                                                        <div style="width: 56%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-green">
                                                                            <span class="sr-only">80% Complete (danger)</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="rating-list-right text-black">56%</div>
                                                            </div>
                                                            <div class="rating-list">
                                                                <div class="rating-list-left text-black">
                                                                    4 Star
                                                                </div>
                                                                <div class="rating-list-center">
                                                                    <div class="progress">
                                                                        <div style="width: 23%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-green">
                                                                            <span class="sr-only">80% Complete (danger)</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="rating-list-right text-black">23%</div>
                                                            </div>
                                                            <div class="rating-list">
                                                                <div class="rating-list-left text-black">
                                                                    3 Star
                                                                </div>
                                                                <div class="rating-list-center">
                                                                    <div class="progress">
                                                                        <div style="width: 11%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-green">
                                                                            <span class="sr-only">80% Complete (danger)</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="rating-list-right text-black">11%</div>
                                                            </div>
                                                            <div class="rating-list">
                                                                <div class="rating-list-left text-black">
                                                                    2 Star
                                                                </div>
                                                                <div class="rating-list-center">
                                                                    <div class="progress">
                                                                        <div style="width: 2%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-green">
                                                                            <span class="sr-only">80% Complete (danger)</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="rating-list-right text-black">02%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bg-white rounded shadow p-4 mb-4 restaurant-detailed-ratings-and-reviews">
                                                        <h5 class="mb-1">All Ratings and Reviews</h5>
                                                        <div class="reviews-members pt-4 pb-4">
                                                            <div class="media">
                                                                <a href="#"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar1.png" class="mr-3 rounded-pill"></a>
                                                                <div class="media-body">
                                                                    <div class="reviews-members-header">
                                                                        <span class="star-rating float-right">
                                                                            <a><i class="icofont-ui-rating text-green"></i></a>
                                                                            <a><i class="icofont-ui-rating text-green"></i></a>
                                                                            <a><i class="icofont-ui-rating text-green"></i></a>
                                                                            <a><i class="icofont-ui-rating text-green"></i></a>
                                                                            <a><i class="icofont-ui-rating"></i></a>
                                                                            </span>
                                                                        <h6 class="mb-1"><a class="text-black" href="#">Singh Osahan</a></h6>
                                                                        <p class="text-gray">Tue, 20 Mar 2020</p>
                                                                    </div>
                                                                    <div class="reviews-members-body">
                                                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections </p>
                                                                    </div>
                                                                    <div class="reviews-members-footer">
                                                                        <i class="icofont-like mr-3" onclick="likeReview(this)"></i>
                                                                        <span class="total-like-user-main ml-2" dir="rtl">
                                                                            <a data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Gurdeep Osahan"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar5.png" class="total-like-user rounded-pill"></a>
                                                                            <a data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Gurdeep Singh"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar2.png" class="total-like-user rounded-pill"></a>
                                                                            <a data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Askbootstrap"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar3.png" class="total-like-user rounded-pill"></a>
                                                                            <a data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Osahan"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar4.png" class="total-like-user rounded-pill"></a>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="reviews-members pt-4 pb-4">
                                                            <div class="media">
                                                                <a href="#"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar6.png" class="mr-3 rounded-pill"></a>
                                                                <div class="media-body">
                                                                    <div class="reviews-members-header">
                                                                        <span class="star-rating float-right">
                                                                            <a><i class="icofont-ui-rating text-green"></i></a>
                                                                            <a><i class="icofont-ui-rating text-green"></i></a>
                                                                            <a><i class="icofont-ui-rating text-green"></i></a>
                                                                            <a><i class="icofont-ui-rating text-green"></i></a>
                                                                            <a><i class="icofont-ui-rating"></i></a>
                                                                            </span>
                                                                        <h6 class="mb-1"><a class="text-black" href="#">Gurdeep Singh</a></h6>
                                                                        <p class="text-gray">Tue, 20 Mar 2020</p>
                                                                    </div>
                                                                    <div class="reviews-members-body">
                                                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                                                                    </div>
                                                                    <div class="reviews-members-footer">
                                                                        <i class="icofont-like mr-3" onclick="likeReview(this)"></i>
                                                                        <span class="total-like-user-main ml-2" dir="rtl">
                                                                            <a data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Gurdeep Osahan"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar5.png" class="total-like-user rounded-pill"></a>
                                                                            <a data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Gurdeep Singh"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar2.png" class="total-like-user rounded-pill"></a>
                                                                            <a data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Askbootstrap"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar3.png" class="total-like-user rounded-pill"></a>
                                                                            <a data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Osahan"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar4.png" class="total-like-user rounded-pill"></a>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <a class="text-center w-100 d-block mt-4 font-weight-bold text-green" href="#">Lihat semua review</a>
                                                    </div>
                                                    <div class="bg-white rounded shadow-sm p-4 mb-5 rating-review-select-page">
                                                        <h5 class="mb-4">Review Produk Ini</h5>
                                                        <div class="mb-4">
                                                            <div class="star-rating float-right">
                                                                <span class="fa fa-star-o" data-rating="1"></span>
                                                                <span class="fa fa-star-o" data-rating="2"></span>
                                                                <span class="fa fa-star-o" data-rating="3"></span>
                                                                <span class="fa fa-star-o" data-rating="4"></span>
                                                                <span class="fa fa-star-o" data-rating="5"></span>
                                                                <input type="hidden" name="whatever1" class="rating-value" value="2.56">
                                                            </div>
                                                        </div>
                                                        <form>
                                                            <div class="form-group">
                                                                <label>Review Kamu</label>
                                                                <textarea class="form-control"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <button class="btn btn-success btn-sm" type="button"> Submit review </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Produk Lain Dari Toko ini</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @php
                   $product = App\Product::where('id_mitra', $pr->id_mitra)->inRandomOrder()->limit(4)->get(); 
                @endphp
                
                @foreach ($product as $item)
                    @php
                        $img = App\ProductImage::where('product_id', $item->id_produk)->where('rule',1)->first();
                    @endphp
                    @php
                        $promo = App\Promo::where('product_id', $item->id_produk)->orderBy('created_at','DESC')->first();
                        if($promo){
                            if($promo->tipe_diskon === "presentase"){
                                $diskon = $pr->harga - ($pr->harga * $promo->jumlah_diskon);
                            }else{
                                $diskon = $pr->harga - $promo->jumlah_diskon;
                            }
                        }
                    @endphp
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{url("/mitra/product_image/".$img->image)}}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">{{$item->nama_produk}}</a></h6>
                                <div class="d-flex text-center">
                                    @if ($promo)
                                        <h5 class="mr-2 ml-5" style="text-decoration: line-through">Rp {{number_format($item->harga,'0','.','.')}}</h5>
                                        <h5>Rp {{number_format($diskon,'0','.','.')}}</h5>
                                    @else
                                        <h5>Rp {{number_format($item->harga,'0','.','.')}}</h5>
                                    @endif
                                        
                                </div>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

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

         var $star_rating = $('.star-rating .fa');

        var SetRatingStar = function() {
        return $star_rating.each(function() {
            if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
            return $(this).removeClass('fa-star-o').addClass('fa-star');
            } else {
            return $(this).removeClass('fa-star').addClass('fa-star-o');
            }
        });
        };

        $star_rating.on('click', function() {
        $star_rating.siblings('input.rating-value').val($(this).data('rating'));
        return SetRatingStar();
        });

        SetRatingStar();

        function likeReview(x) {
            if(x.classList.contains('text-green') != true){
                x.classList.add("text-green");
            }else{
                x.classList.remove("text-green");
            }
        }

        function addKeranjang(item){
            event.preventDefault();
            item = JSON.parse(item);
            var product_id = item.id_produk;
            var qty = $('#qty_inp').val();
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
                            alert("Error occured !");
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
     </script>

</body>

</html>