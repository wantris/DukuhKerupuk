
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout Pesanan</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    @include('layouts.header')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />

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
            <div class="row">
                <div class="col-12">
                    @if ($message = Session::get('failed'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong class="text-white">{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block" style="background-color: #7fad39">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong class="text-white">{{ $message }}</strong>
                    </div>
                @endif
                </div>
            </div>
            <div class="checkout__form">
                <h4>Detail Pesanan</h4>
                <form action="{{route('checkout.save')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-4 col-md-6">
                            <div class="checkout__order">
                                <h4 style="color: #7fad39">Konfirmasi Alamat</h4>
                                <div class="row">
                                    @php
                                        $alm = App\Alamat::where('user_id', Auth::guard('users')->id())->where('is_featured','1')->first();
                                        $getAlm = App\Alamat::where('user_id', Auth::guard('users')->id())->get();
                                    @endphp
                                    @if ($alm)
                                        @php
                                             $alm2 = App\Alamat::where('user_id', Auth::guard('users')->id())->where('id','!=',$alm->id)->get();
                                        @endphp
                                        <div class="col-1">
                                            <label class="custom-control fill-checkbox mr-4">
                                                <input type="radio" checked name="alm_utama" onchange="changeStatus('{{$alm->id}}', '1')" value="{{$alm->id}}" class="fill-control-input">
                                                <span class="fill-control-indicator"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-3">
                                            
                                            <span class="font-weight-bold">{{$alm->nama_lengkap}} ({{$alm->nomor_telp}})</span>
                                        </div>
                                        <div class="col-5">
                                            <span class="">{{$alm->alamat_detail}}</span>
                                        </div>
                                        <div class="col-3">
                                            <div class="d-flex">
                                                <a href="#" class="site-btn" style="padding:12px 12px; font-size:12px" onclick="addAddress()">Tambah Alamat</a>
                                                @if ($alm2->count() === 0)
                                                    <a class="site-btn bg-secondary ml-3 text-white" style="padding:12px 12px; font-size:12px; " disabled>Pilih Alamat</a>
                                                @else
                                                    <a class="site-btn ml-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding:12px 12px; font-size:12px; background-color:#f56954" >Pilih Alamat</a>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        @php
                                            $alamat = App\Alamat::where('user_id', Auth::guard('users')->id())->first();
                                        @endphp
                                        @if($alamat)
                                            @php
                                                $alm2 = App\Alamat::where('user_id', Auth::guard('users')->id())->where('id','!=',$alm->id)->get();
                                            @endphp
                                            <div class="col-1">
                                                <label class="custom-control fill-checkbox mr-4">
                                                    <input type="radio" name="id_alamat" onchange="changeStatus('{{$alamat->id}}', '1')"  value="{{$alamat->id}}" class="fill-control-input">
                                                    <span class="fill-control-indicator"></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="font-weight-bold">{{$alamat->nama_lengkap}} ({{$alamat->nomor_telp}})</span>
                                            </div>
                                            <div class="col-5">
                                                <span class="">{{$alamat->alamat_detail}}</span>
                                            </div>
                                            <div class="col-3">
                                                <div class="d-flex">
                                                    <a href="#" class="site-btn" style="padding:12px 12px; font-size:12px" onclick="addAddress()">Tambah Alamat</a>
                                                    @if ($alm2->count() === 0)
                                                        <a class="site-btn bg-secondary ml-3 text-white" style="padding:12px 12px; font-size:12px; " disabled>Pilih Alamat</a>
                                                    @else
                                                        <a class="site-btn ml-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="padding:12px 12px; font-size:12px; background-color:#f56954" >Pilih Alamat</a>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                    @if ($getAlm->count() === 0)
                                        <div class="col-lg-12 col-12 text-center" style="height: 220px">
                                            <img src="{{url('icon/map.svg')}}" class="icon-address mt-4" alt="">
                                            <p class="text-secondary text-center mt-2">Anda belum menambahkan alamat</p>
                                            <p class="mb-3"><a href="#" class="site-btn" style="padding:12px 12px; font-size:12px" onclick="addAddress()"><i class="icofont-plus mr-2"></i>Tambah Alamat</a></p>
                                        </div>
                                    @endif
                                </div>
                                <div class="collapse row mt-4" id="collapseExample">
                                    <hr>
                                    @if ($alm2->count() > 0)
                                        @foreach ($alm2 as $alm2)
                                                <div class="col-1 mb-3">
                                                    <label class="custom-control fill-checkbox mr-4">
                                                        <input type="radio" name="id_alamat" onchange="changeStatus('{{$alm2->id}}', '1')"  value="{{$alm2->id}}" class="fill-control-input">
                                                        <span class="fill-control-indicator"></span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-3 mb-3">
                                                    <span class="font-weight-bold">{{$alm2->nama_lengkap}} ({{$alm2->nomor_telp}})</span>
                                                </div>
                                                <div class="col-5">
                                                    <span class="">{{$alm2->alamat_detail}}</span>
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <div class="d-flex">
                                                        <a href="#" class="site-btn" onclick="changeStatus('{{$alm2->id}}', '1')"  style="padding:12px 12px; font-size:12px" onclick="addAddress()">Pilih</a>
                                                    </div>
                                                </div>
                                        @endforeach
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

    {{-- modal add address --}}
    <div class="modal fade" id="add-address" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body px-4 py-4">
                <form action="{{route('address.konsumen.save')}}" id="address-form" method="POST" >
                @csrf
                    <div class="container-fluid">
                        <div class="address-header mt-4 mb-4">Tambah Alamat Baru</div>
                        <div class="row mb-3">
                        <div class="col-6">
                            <input type="hidden" name="id" id="id_alamat">
                            <input type="hidden" name="is_featured" id="is_featured">
                            <input type="text" id="input_name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Nama Lengkap">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input type="text" id="input_phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" id="exampleInputEmail1" name="phone" aria-describedby="emailHelp" placeholder="Nomor Telepon">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <select name="province" class="@error('province') is-invalid @enderror" id="province-select" value="{{ old('province') }}" size="5">
                                    <option selected>Pilih Provinsi</option>
                                    @foreach ($province as $province)
                                    <option value="{{$province->province_id}}">{{$province->name}}</option>
                                    @endforeach
                                </select>
                                @error('province')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <select name="city_destination" class="@error('city_destination') is-invalid @enderror" value="{{ old('city_destination') }}" id="city-select">
                                    <option>Pilih Kota</option>
                                </select>
                                @error('city_destination')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <input type="text" id="input_pos" class="form-control @error('pos_code') is-invalid @enderror" value="{{ old('pos_code') }}" id="exampleInputEmail1" name="pos_code" aria-describedby="emailHelp" placeholder="Kode Pos">
                                @error('pos_code')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div id="map" style='width: 400px; height: 300px;'></div>
                                @error('latitude')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="hidden" name="latitude" id="latitude">
                                <input type="hidden" name="longitude" id="longitude">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <textarea name="street_address" id="input_address" class="form-control @error('street_address') is-invalid @enderror">Nama jalan, Gedung atau No.rumah</textarea>
                                @error('street_address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="site-btn float-right" style="padding:12px 12px; font-size:12px; background-color:#05386b" data-dismiss="modal">Close</button>
                <button type="submit" class="site-btn float-right" style="padding:12px 12px; font-size:12px">Simpan</button>
            </div>
        </form>
        </div>
        </div>
    </div>

   <!-- Footer Section Begin -->
   @include('layouts.footer_sec')
   <!-- Footer Section End -->

   <!-- Js Plugins -->
   @include('layouts.js_lib')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js'></script>
   

   <script>
         
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var globalLatitude;
    var globalLongitude;

    function addAddress(){
        $('#add-address').modal('show');
        event.preventDefault();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert('tidak mendukung');
        }
        function showPosition(position) {
            globalLatitude = position.coords.latitude;
            globalLongitude = position.coords.longitude;
            console.log(position.coords.longitude);
            mapboxgl.accessToken = 'pk.eyJ1Ijoid2FjaWswMDQiLCJhIjoiY2ttZG1tM3l0MmE4cjJ3czlhbXJsemthaSJ9.fKb3K0qrX3jv9PVR85C10A';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [position.coords.longitude, position.coords.latitude],
            });
            var geolocate = new mapboxgl.GeolocateControl({
                positionOptions: {
                    enableHighAccuracy: true
                },
                trackUserLocation: true
            });

            map.addControl(geolocate);
            geolocate.on('geolocate', function(e) {
                var lon = e.coords.longitude;
                var lat = e.coords.latitude
                var position = [lon, lat];
                console.log(position);
                $('#latitude').val(lat);
                $('#longitude').val(lon);
            });
        }
    }



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
});

function changeStatus(id, status){
        event.preventDefault();
        var status_desc;
        if(status === "1"){
            status_desc = "utama";
        }
        console.log(id, status, status_desc);
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Anda akan memilih alamat ini !",
            showCancelButton: true,
            confirmButtonColor: '#7fad39',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, pilih!'
        })
        .then(function (success) {
            if (success.value) {
                var url = '{{ url("konsumen/account/alamat/change-status") }}';
                console.log(url);
                $.ajax({
                    url: url,
                    type: "POST",
                    data:{
                        id:id,
                        status:status
                    },
                    success: function (data) {
                        console.log(data.html);
                        if (data.status == 1) {
                            Swal.fire({
                                title: "Success!",
                                type: "success",
                                text: "Alamat telah menjadi "+status_desc+" \n Click OK",
                                icon: "success",
                                confirmButtonClass: "btn btn-outline-info",
                            }).then(function(){
                                location.reload();
                            });
                            // document.getElementById('ket_status_'+id).text() = status;
                            // document.getElementById('status_'+id).innerHTML = data.html;
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
    };

    function confirmDelete(id) {
        event.preventDefault();
        console.log(id);
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Anda tidak akan bisa mengembalikan data yang dihapus!",
            showCancelButton: true,
            confirmButtonColor: '#7fad39',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, hapus alamat!'
        })
        .then(function (success) {
            if (success.value) {
                var url = '{{ url("konsumen/account/alamat/delete/") }}/'+id;
                console.log(url);
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (data) {
                        console.log(data);
                        if (data.status == 1) {
                            Swal.fire({
                                title: "Success!",
                                type: "success",
                                text: "Produk telah di hapus \n Click OK",
                                icon: "success",
                                confirmButtonClass: "btn btn-outline-info",
                            })
                            .then(function(){
                                $('#div_'+id).remove();
                            });
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
    };

    function editData(item){
        event.preventDefault();
        $('#add-address').modal('show');
        $('#address-form').attr('action', "{{route('address.konsumen.update')}}");
        item = JSON.parse(item);
        $('#id_alamat').val(item.id);
        $('#is_featured').val(item.is_featured);
        $('#input_name').val(item.nama_lengkap);
        $('#input_phone').val(item.nomor_telp);
        $('#province-select').val(item.province_id);
        $('#province-select').append('<option selected value="' + item.province_id  + '">' + item.province_ref.name + '</option>');
        $('#city-select').append('<option selected value="' + item.city_id  + '">' + item.city_ref.name + '</option>');
        $('#city-select, #province-select').niceSelect('update');
        $('#latitude').val(item.latitude);
        $('#longitude').val(item.longitude);
        $('#input_pos').val(item.kode_pos);
        $('#street_address').val(item.alamat_detail);

        mapboxgl.accessToken = 'pk.eyJ1Ijoid2FjaWswMDQiLCJhIjoiY2ttZG1tM3l0MmE4cjJ3czlhbXJsemthaSJ9.fKb3K0qrX3jv9PVR85C10A';
            var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [item.longitude, item.latitude],
            zoom: 8
            });
            
            // Create a default Marker and add it to the map.
            var marker1 = new mapboxgl.Marker()
            .setLngLat([item.longitude, item.latitude])
            .addTo(map);

            var geolocate = new mapboxgl.GeolocateControl({
                positionOptions: {
                    enableHighAccuracy: true
                },
                trackUserLocation: true
            });

            map.addControl(geolocate);
            geolocate.on('geolocate', function(e) {
                var lon = e.coords.longitude;
                var lat = e.coords.latitude
                var position = [lon, lat];
                $('#latitude').val(lat);
                $('#longitude').val(lon);
            });
    }


</script>

 

</body>

</html>