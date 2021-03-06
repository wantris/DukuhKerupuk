
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesanan</title>

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
            <@include('layouts.searchbar')
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
                            <a href="./index.html">Pesanan</a>
                            <span>Dikirim</span>
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
                        <a  href="{{route('purchase.konsumen', 2)}}">Belum Bayar</a>
                        <a href="{{route('purchase.konsumen', 3)}}">Cek Bukti</a>
                        <a href="{{route('purchase.konsumen', 4)}}">Dikemas</a>
                        <a class="active" href="{{route('purchase.konsumen', 5)}}">Dikirim</a>
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
                                                    <tr id="tr_{{$item->kd_transaksi}}">
                                                        <td>{{$item->kd_transaksi}}</td>
                                                        <td>{{$item->mitraRef->nama_mitra}}</td>
                                                        <td>{{$item->total_harga}}</td>
                                                        <td>{{$item->diskon}}</td>
                                                        <td>{{$item->pengiriman}}</td>
                                                        <td>{{$item->status}}</td>
                                                        <td>{{$item->created_at->isoFormat('D MMMM Y')}}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{route('purchase.konsumen.detail', $item->kd_transaksi)}}" class="site-btn mr-3" style="padding:12px 12px; font-size:12px; ">Detail</a>
                                                                <a href="#" class="site-btn mr-3" onclick="akhiriPesanan('{{$item->kd_transaksi}}')" style="padding:12px 12px; font-size:12px;background-color:#0981b6">Akhiri</a>
                                                                @if ($item->status === "pending")
                                                                    <a href="{{route('checkout.bukti', $item->kd_transaksi)}}" class="site-btn mr-3" style="padding:12px 12px; font-size:12px;background-color:#f56954">Bayar</a>
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
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

         $(document).ready( function () {
            $('#table-ts').DataTable();
        } );

        function akhiriPesanan(kd){
            event.preventDefault();
            Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, proses untuk '+status
                })
            
                .then(function (success) {
                    if (success.value) {
                        var url = '{{ url("/konsumen/account/purchase/finish") }}/'+kd;
                        console.log(url);
                        $.ajax({
                            url: url,
                            type: "PATCH",
                            data:{
                                status:'selesai'
                            },
                            success: function (data) {
                                console.log(data);
                                if (data.status == 1) {
                                    console.log(data.message);
                                    Swal.fire({
                                        title: "Success!",
                                        type: "success",
                                        text: "Transaksi telah "+ status +" \n Click OK",
                                        icon: "success",
                                        confirmButtonClass: "btn btn-outline-info",
                                    });
                                    $('#tr_'+kd).remove();
                                }
                            },
                            error: function (error) {
                                console.log(error);
                                Swal.fire({
                                    title: 'Opps...',
                                    text: error.message,
                                    type: 'error',
                                    timer: '1500'
                                })
                            }
                        });
                    }
                });
        }
     </script>

</body>

</html>