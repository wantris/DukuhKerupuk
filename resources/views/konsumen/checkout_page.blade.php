
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#" data-toggle="coupon" href="#couponExample" role="button" aria-expanded="false" aria-controls="couponExample">Click here</a> to enter your code
                    </h6>
                </div>
            </div> --}}
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="{{route('checkout.save')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-4 col-md-6">
                            <div class="checkout__order">
                                <h4 style="color: #7fad39">Konfirmasi Alamat</h4>
                                <div class="row">
                                    @php
                                        $alm = App\Alamat::where('user_id', Auth::guard('users')->id())->where('is_featured', 1)->first();
                                    @endphp
                                    @if ($alm)
                                        <div class="col-lg-4">
                                            <input type="hidden" name="alm_utama" value="{{$alm->id}}">
                                            <span class="font-weight-bold">{{$alm->nama_lengkap}} ({{$alm->nomor_telp}})</span>
                                        </div>
                                        <div class="col-5">
                                            <span class="">{{$alm->alamat_detail}}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <hr>
                                        <div class="d-flex">
                                            <label class="custom-control fill-checkbox mr-4">
                                                <input type="radio" name="pengiriman" value="cod" class="fill-control-input">
                                                <span class="fill-control-indicator"></span>
                                                COD
                                            </label>
                                            <label class="custom-control fill-checkbox mr-4">
                                                <input type="radio" name="pengiriman" value="antar" class="fill-control-input">
                                                <span class="fill-control-indicator"></span>
                                                Antar
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="checkout__order">
                                <h4 style="color: #7fad39">Produk Dipesan</h4>
                                <div class="row">
                                    <div class="col-3">
                                        <span class="font-weight-bold" style="font-size: 19px">produk</span>
                                    </div>
                                    <div class="col-3 txt-center">
                                        <span class="font-weight-bold" style="font-size: 19px">Harga Produk</span>
                                    </div>
                                    <div class="col-3 text-center">
                                        <span class="font-weight-bold" style="font-size: 19px">Jumlah Produk</span>
                                    </div>
                                    <div class="col-3 text-right">
                                        <span class="font-weight-bold" style="font-size: 19px">Subtotal Produk</span>
                                    </div>
                                </div>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($json->product_id as $key => $produk)
                                    @php
                                        $pr = App\Product::find($produk);
                                        $promo = App\Promo::where('product_id', $produk)->first();
                                        
                                        if($promo){
                                            if($promo->tipe_diskon === 'presentase'){
                                                $diskon = (int)$pr->harga - ((int)$pr->harga * $promo->jumlah_diskon);
                                            }elseif($promo->tipe_diskon === 'langsung'){
                                                $diskon = (int)$pr->harga - (int)$promo->jumlah_diskon;
                                            };
                                        }else{
                                            $diskon = $pr->harga;
                                        }
                                        $qty = (int)$json->qty[$key];
                                        $subtotal = (int)$diskon * $qty;
                                        $harga = number_format($pr->harga,'0','.','.');
                                        $total += $subtotal;
                                        $total_diskon = $total - (int)$json->diskon;
                                    @endphp
                                    <div class="row mt-3">
                                        <div class="col-3">
                                            <input type="hidden" name="id_produk[]" value="{{$produk}}">
                                            <input type="hidden" name="qty[]" value="{{$qty}}">
                                            <input type="hidden" name="subtotal[]" value="{{$subtotal}}">
                                            <input type="hidden" name="harga[]" value="{{$diskon}}">
                                            <input type="hidden" name="mitra_id[]" value="{{$pr->id_mitra}}">
                                            <span class="" style="font-size: 16px">{{$pr->nama_produk}}</span>
                                        </div>
                                        <div class="col-3 txt-center">
                                            @if($promo)
                                                <span class="" style="font-size: 16px">Rp {{number_format($diskon,'0','.','.')}}</span>
                                                <span class="mr-3 " style="text-decoration: line-through;font-size: 16px">Rp {{$harga}}</span>  
                                            @else
                                                <span class="">Rp {{$harga}}</span> 
                                            @endif
                                        </div>
                                        <div class="col-3 text-center">
                                            <span class="" style="font-size: 16px">{{$json->qty[$key]}}</span>
                                        </div>
                                        <div class="col-3 text-right">
                                            <span class="" style="font-size: 16px">Rp {{number_format($subtotal,'0','.','.')}}</span>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="checkout__order__subtotal mt-3">Subtotal <span>Rp {{number_format($total,'0','.','.')}}</span></div>
                                <div class="checkout__order__total">Diskon <span>Rp {{number_format($json->diskon,'0','.','.')}}</span></div>
                                <input type="hidden" name="diskon" value="{{$json->diskon}}">
                                <input type="hidden" name="id_promo" value="{{$json->id_diskon}}">
                                <input type="hidden" name="total" value="{{$total_diskon}}">
                                <input type="hidden" name="token" value="{{$token}}">
                                <div class="checkout__order__total">Total <span>Rp  {{number_format($total_diskon,'0','.','.')}}</span></div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

   <!-- Footer Section Begin -->
   @include('layouts.footer_sec')
   <!-- Footer Section End -->

   <!-- Js Plugins -->
   @include('layouts.js_lib')

   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   

   <script>
        // $(document).ready(function(){
        //     $('#province-select, #city-select').select2();
        // });
        $('#province-select').on('change', function(){
            let provindeId = $(this).val();
            console.log(provindeId);
            // if (provindeId != "") {
                jQuery.ajax({
                    url: 'checkout/cities/'+provindeId,
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