<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="favicon.png" rel="icon">
    <meta name="author" content="Nghia Minh Luong">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title>Agen</title>
    @include('layouts.head')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@700&display=swap" rel="stylesheet">
</head>
<body>

    {{-- Call Navbar & Sidebar --}}
    <div class="container-fluid" style="background: rgb(42,190,96);
    background: linear-gradient(54deg, rgba(42,190,96,1) 20%, rgba(65,223,136,1) 79%, rgba(52,226,159,1) 95%);">
        @include('layouts.navbar_sidebar')
    </div>

        <section class="banner-agen">
            <div class="container">
                <div class="row" >
                    <div class="col-lg-7 col-12 mb-5"  >
                        <p class="h1 agen-banner-title ">Agen Dukuhkerupuk</p>
                        <p class="agen-banner-desc" style="margin-right:90px">Gabung Sekarang untuk mendapatkan harga Kerupuk yang jauh lebih murah, dan penawaran menarik lainnya serta fitur berlangganan produk tiap bulannya</p>
                        <p><a href="/free-trial/" class="float-left mr-4 btn blue cta-btn u-margin-right-0">Daftar Sekarang</a></p>
                    </div>
                    <div class="agen-image-wrapper col-lg-5 col-12">
                        <img src="{{url('assets-user/landing/agen-banner.png')}}" alt="" class="agen-image img-fluid">
                    </div>
                </div>
            </div>
        </section>
        <section class="management-agen">
            <div class="container">
                <h3 class="management-agen-title">Kenapa Harus Bergabung dengan Agen Dukuhkerupuk?</h3>
                <p class="management-agen-desc">Agen Dukuhkerupuk adalah platform terbaik untuk menjadi reseller kerupuk yang berbeda dari yang lain dengan kemudahan serta fitur automation buy yang ditawarkan.</p>
                <div class="row">
                    <div class="agen__management-image-wrapper col-lg-6 col-12">
                        <img src="{{url('assets-user/landing/agen-management.png')}}" class="agen__management-image img-fluid" alt="">
                    </div>
                    <div class="agen__featured col-lg-6 col-12">
                        <h4 class="agen__featured-title">Reseller Kerupuk Modern dan Mudah</h4>
                        <ul class="agen__featured-items">
                            <li class="agen__featured-item">
                                <h4 class="agen__featured-item-title font-weight-bold">Kelola Pembelian</h4>
                                <p class="agen__featured-item-desc">Dengan menjadi Agen, Anda dapat dengan mudah mengelola pembelian produk dari Mitra tanpa menyita banyak waktu Anda</p>
                            </li>
                            <li class="agen__featured-item">
                                <h4 class="agen__featured-item-title font-weight-bold">Langganan Bulanan</h4>
                                <p class="agen__featured-item-desc">Nikmati langganan produk Mitra secara bulanan tanpa harus melakukan proses pembelian dan hanya dengan konfirmasi berlangganan</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="agen-reason">
            <div class="container">
                <h3 class="management-agen-title ">Bagaimana Dukuhkerupuk Membantu Anda dalam Menjadi Reseller Kerupuk?</h3>
                <p class="management-agen-desc ">Agen Dukuhkerupuk memiliki fitur Berlangganan Bulanan produk Mitra secara otomatis yang dapat mempermudah Anda dalam menjadi reseller kerupuk dari Mitra Kami.</p>
                <div class="agen__featured col-lg-6 col-12">
                    <h4 class="agen__featured-title ">Langganan Produk Bulanan Otomatis</h4>
                    <ul class="agen__featured-items">
                        <li class="agen__reason-item " data-aos="fade-top">
                            <h4 class="agen__featured-item-title font-weight-bold ">Otomatis Order</h4>
                            <p class="agen__featured-item-desc">Fitur ini dapat melakukan order langganan otomatis setiap bulannya dan anda hanya perlu melakukan konfirmasi order tersebut.</p>
                        </li>
                        <li class="agen__reason-item" data-aos="fade-top">
                            <h4 class="agen__featured-item-title font-weight-bold ">Efisiensi</h4>
                            <p class="agen__featured-item-desc">Ketika Anda sudah mengkonfimasi order, maka sistem akan memberitahu Mitra untuk konfirmasi dan bravo produk akan sampai di tempat Anda sesuai riwayat pembelian Anda sebelumnya.</p>
                        </li>
                        <li class="agen__reason-item" data-aos="fade-top">
                            <h4 class="agen__featured-item-title font-weight-bold ">Kemudahan Bertransaksi</h4>
                            <p class="agen__featured-item-desc">Anda tidak perlu datang langsung untuk bertransaksi produk dengan Mitra kami, Anda hanya perlu mengirim bukti transfer dan transaksi pun berhasil..</p>
                        </li>
                    </ul>
                </div>
                <div class="agen__management-image-wrapper col-lg-6 col-12">
                    <img src="{{url('assets-user/landing/agen-reason.png')}}" class="agen__management-image img-fluid" alt="">
                </div>
            </div>
        </section>

    {{-- footer --}}
    <footer>
      @include('layouts.footer')
    </footer>


    <!-- JS Library-->
    @include('layouts.js_library')

    <!-- Custom scripts-->
    <script type="text/javascript" src="{{url("user/js/main.js")}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 1200,
      })
    </script>

</body>
</html>