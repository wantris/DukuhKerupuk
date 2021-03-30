
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dukuhkerupuk | Upload Sukses</title>

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
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Bukti Transfer</span>
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
            <div class="row">
                <div class="col-12">
                    <div class="card shadow mx-auto" style="max-width: 450px; border-radius:40px; border-bottom:6px solid #7fad39">
                        <div class="card-body">
                            <form action="{{route('checkout.bukti.post')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <p class="h4 text-center font-weight-bold mb-2 mt-2" style="color: #7fad39">Upload Berhasil</p>
                                        <p class="text-center font-weight-bold mb-2 mt-2" style="color: #7fad39">Silahkan ke halaman transaksi</p>
                                    </div>
                                    <div class="col-12">
                                        <img class="text-center" src="{{url('ogani/img/confirmed.svg')}}" alt="">
                                    </div>
                                    <div class="col-12">
                                        <a href="{{route('purchase.konsumen', 3)}}" id="upload-btn" class="site-btn text-center mt-3" style="width:100%;padding:12px 12px; font-size:12px; border-radius:20px">Halaman Transaksi Saya</a>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" id="submit" class="site-btn text-center d-none mt-3" style="width:100%;padding:12px 12px; font-size:12px; border-radius:20px" value="Upload Bukti">
                                    </div>
                                </div>
                            </form>
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
   

   <script>

   </script>

 

</body>

</html>