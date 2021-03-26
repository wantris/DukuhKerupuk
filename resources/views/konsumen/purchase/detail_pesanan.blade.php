
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pesanan</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    @include('layouts.header')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
                        <h2>Pesanan</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Detail Pesanan</span>
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
                <h4>Detail Pesanan</h4>
                    <div class="row">
                        <div class="col-lg-12 mb-4 col-md-6">
                            <div class="checkout__order">
                                <h4 style="color: #7fad39">Alamat</h4>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <span class="font-weight-bold">{{$ts->userRef->nama_user}} ({{$ts->userRef->no_tlp}})</span>
                                    </div>
                                    <div class="col-5">
                                        <span class="">{{$ts->alamat}}</span>
                                    </div>
                                    <div class="col-3">
                                        <h1><i class="fas fa-check-circle" style="color:#7fad39;  -ms-transform: rotate(20deg); /* IE 9 */
                                            transform: rotate(20deg);"></i></h1>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <hr>
                                        <div class="d-flex">
                                            <label class="custom-control fill-checkbox mr-4">
                                                <input type="radio" name="pengiriman" @if($ts->pengiriman === "cod") checked @endif value="cod" class="fill-control-input">
                                                <span class="fill-control-indicator"></span>
                                                COD
                                            </label>
                                            <label class="custom-control fill-checkbox mr-4">
                                                <input type="radio" @if($ts->pengiriman === "antar") checked @endif name="pengiriman" value="antar" class="fill-control-input">
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
                                    $subtotal = 0;
                                @endphp
                                @foreach ($detail as $key => $dt)
                                    <div class="row mt-3">
                                        <div class="col-3">
                                            <span class="" style="font-size: 16px">{{$dt->productRef->nama_produk}}</span>
                                        </div>
                                        <div class="col-3 txt-center">
                                                <span class="" style="font-size: 16px">Rp {{number_format($dt->harga,'0','.','.')}}</span>
                                        </div>
                                        <div class="col-3 text-center">
                                            <span class="" style="font-size: 16px">{{$dt->qty}}</span>
                                        </div>
                                        <div class="col-3 text-right">
                                            <span class="" style="font-size: 16px">Rp {{number_format($dt->subtotal,'0','.','.')}}</span>
                                        </div>
                                    </div>
                                    @php
                                        $subtotal += (int)$dt->subtotal;
                                    @endphp
                                @endforeach
                                <div class="checkout__order__subtotal mt-3">Subtotal <span>Rp {{number_format($subtotal,'0','.','.')}}</span></div>
                                <div class="checkout__order__total">Diskon <span>Rp {{number_format($ts->diskon,'0','.','.')}}</span></div>
                                <div class="checkout__order__total">Total <span>Rp  {{number_format($ts->total_harga,'0','.','.')}}</span></div>
                                <button type="submit" class="site-btn">Kembali</button>
                            </div>
                        </div>
                    </div>
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
   

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