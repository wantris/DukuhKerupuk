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
    <title>Mitra</title>
    @include('layouts.head')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    
</head>
<body>

    {{-- Call Navbar & Sidebar --}}
    @include('layouts.navbar_sidebar')


    <div class="container">
        <div class="row banner-mitra">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <p class="h1" style="font-size:52px; font-family:'Source Sans Pro', sans-serif;color:#05386b">Mitra Dukuh Kerupuk</p>
                <p class="h3" style="font-size:28px; font-family:'Source Sans Pro', sans-serif;color:#05386b">Menjual Kerupuk Kini Menjadi Lebih Mudah dan Hemat</p>
                <p class="mt-5">
                    <a href="/free-trial/" class="float-left mr-4 btn blue cta-btn u-margin-right-0">Daftar Sekarang</a>
                    <a href="/free-trial/" style="text-decoration: none" class="float-left btn hijau cta-btn u-margin-right-0">Kontak Kami</a>
                </p>
            </div>
        </div>
    </div>
    <div class="container-fluid  mitra-description">
        <div class="row">
            <div class="col-lg-6 col-12 mitra-description-column" data-aos="fade-right">
                <p class="h3 mitra-description-title">Mitra Dukuh Kerupuk</p>
                <p class="h4 mitra-description-content">Mitra Dukuh Kerupuk adalah Produsen atau Pemasok kerupuk yang ingin menjual produknya di dalam portal dukuhkerupuk</p>
            </div>
            <div class="col-lg-6 col-12 text-center" data-aos="fade-left">
                <img src="{{url('assets-user/landing/mitra.png')}}"  alt="" class="img-fluid mitra-img">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mitra-benefit">
            <div class="col-12">
                <h2 class="benefit-mitra-title">Apa Saja Manfaat Ketika Menjadi Mitra?</h2>
            </div>
            <div class="col-12 col-lg-4 benefit-points__benefit-items--mb-30" >
                <div class="benefit-points__benefit-items" data-aos="fade-top">
                    <div class="benefit-points__benefit-items-image benefit-points__benefit-items-image--kupon">
                        <img class="img-fluid" src="{{url('icon/manajement.png')}}" alt="kupon diskon niagahoster">
                    </div>
                    <div class="benefit-points__benefit-items-title">Kelola Pernjualan dengan Mudah</div>
                </div>
            </div>
            <div class="col-12 col-lg-4 benefit-points__benefit-items--mb-30" >
                <div class="benefit-points__benefit-items" data-aos="fade-top">
                    <div class="benefit-points__benefit-items-image benefit-points__benefit-items-image--kupon">
                        <img class="img-fluid" src="{{url('icon/money.png')}}" alt="kupon diskon niagahoster">
                    </div>
                        <div class="benefit-points__benefit-items-title">Meningkatkan Keuntungan penjualan</div>
                </div>
            </div>
            <div class="col-12 col-lg-4 benefit-points__benefit-items--mb-30">
                <div class="benefit-points__benefit-items" data-aos="fade-top">
                    <div class="benefit-points__benefit-items-image benefit-points__benefit-items-image--kupon">
                        <img class="img-fluid" src="{{url('icon/route.png')}}" alt="kupon diskon niagahoster">
                    </div>
                        <div class="benefit-points__benefit-items-title">Jangkuan Penjualan Meluas</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container container-50">
        <div id="accordion" >
          <div class="card-header guide collapsed" data-toggle="collapse" href="#guide1">
            <div class="card-title">
              <a style="flex-basis: 90%;">Bagaimana cara menjadi Mitra di Dukuh Kerupuk?</a>
              <div class="arrow"></div>
            </div>
            <div id="guide1" class="card-body collapse" data-parent="#accordion">
              <p class="text-muted"></p><p><strong>&gt; Informasi apa saja yang harus disiapkan saat akan mendaftar sebagai seller?</strong></p><p>Siapkan Nama, email aktif, password, nomor handphone aktif dan nama toko yang akan didaftarkan</p><p><br></p><p><strong>&gt; No HP yang digunakan adalah Nomor Pribadi atau Perusahaan?</strong></p><p>Gunakan nomor handphone pribadi untuk seller perorangan dan nomor handphone penanggung jawab untuk seller perusahaan</p><p>Pastikan nomor handphone aktif dan sesuai, agar bisa mendapatkan kode verifikasi pendaftaran</p><p><br></p><p><strong>&gt; Jika sudah terdaftar, bagaimana cara melengkapi informasi penjualan?</strong></p><ol><li>Lengkapi informasi Toko/gudang</li><li>Lengkapi informasi pembayaran &amp; legal</li><li>Upload produk yang ingin dijual</li></ol><p><br></p><p><strong>&gt; Apa saja dokumen yang dibutuhkan untuk menjadi seller?</strong></p><ul><li>Nomor rekening valid</li><li>Seller Perorangan: KTP &amp; NPWP</li><li>Seller Perusahaan: KTP Direksi, NPWP Perusahaan, Akta Pendirian + SK Menkeh, Akta Perubahan, SIUP, TDP, Surat Domisili</li></ul><p><br></p><p><strong>&gt; Bagaimana jika seller perorangan belum memiliki NPWP?</strong></p><p>Saat upload dokumen legal, kolom NPWP diisi dengan nomor dan foto KTP terlebih dahulu</p><p></p>
            </div>
          </div>
  
          <div class="card-header guide collapsed" data-toggle="collapse" href="#guide2">
            <div class="card-title">
              <a style="flex-basis: 90%;">Apakah menjadi Mitra di Dukuh Kerupuk dipungut biaya?</a>
              <div class="arrow"></div>
            </div>
            <div id="guide2" class="card-body collapse" data-parent="#accordion">
              <p class="text-muted"></p><p>Blibli tidak memungut biaya deposit dan memberikan margin penjualan 0% untuk seller baru di semua kategori yang bergabung pada 1 November - 31 Desember 2020.</p><p></p>
            </div>
          </div>
          <div class="card-header guide collapsed" data-toggle="collapse" href="#guide3">
            <div class="card-title">
              <a style="flex-basis: 90%;">Fasilitas apa saja yang diberikan Dukuh Kerupuk ke Mitra?</a>
              <div class="arrow"></div>
            </div>
            <div id="guide3" class="card-body collapse" data-parent="#accordion">
              <p class="text-muted"></p><ul><li>Blibli Seller Apps</li><li>Gratis foto produk</li><li>Asuransi produk 100%*</li><li>Gratis biaya pengiriman*</li><li>Gratis kemasan produk pesanan</li><li>Promosi seller</li></ul><p>&nbsp; &nbsp; &nbsp; *Syarat dan ketentuan berlaku</p><p></p>
            </div>
          </div>
          <div class="card-header guide collapsed" data-toggle="collapse" href="#guide4">
            <div class="card-title">
              <a style="flex-basis: 90%;">Apakah setelah mendaftar bisa langsung berjualan?</a>
              <div class="arrow"></div>
            </div>
            <div id="guide4" class="card-body collapse" data-parent="#accordion">
              <p class="text-muted"></p><p>Ya, kamu bisa langsung mengakses akun Blibli Seller Centermu. Lengkapi informasi tokomu dan kamu bisa langsung berjualan di Blibli.</p><p></p>
            </div>
          </div>
        </div>
      </div>


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