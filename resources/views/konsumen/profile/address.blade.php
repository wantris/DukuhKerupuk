
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
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css" rel="stylesheet">
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css' type='text/css' />

    <style>
        .star-rating {
        line-height:32px;
        font-size:1.25em;
        }

        .star-rating .fa-star{color: #7fad39;}
        /* #map { position: absolute; top: 0; bottom: 0; width: 100%; } */
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
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block" style="background-color: #7fad39">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong class="text-white">{{ $message }}</strong>
                        </div>
                    @endif
          
                    @if ($message = Session::get('failed'))
                        <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                        </div>
                    @endif
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
                                    <a href="#" class="site-btn float-right" style="padding:12px 12px; font-size:12px" onclick="addAddress()"><i class="icofont-plus mr-2"></i>Tambah Alamat</a>
                                </div>
                            </div>
                            <hr>
                            @if ($add->count() === 0)
                            <div class="row mt-4">
                                <div class="col-lg-12 col-12 text-center" style="height: 200px">
                                    <img src="{{url('icon/map.svg')}}" class="icon-address mt-4" alt="">
                                    <p class="text-secondary text-center mt-2">Anda belum menambahkan alamat</p>
                                </div>
                            </div>
                            @endif
                            @foreach ($add as $item)
                                <div class="row mt-4" id="div_{{$item->id}}">
                                    <div class="col-lg-8 col-12">
                                        <div class="row mb-1">
                                            <div class="col-3 text-right">
                                                <label for="" class="text-secondary">Nama Lengkap</label>
                                            </div>
                                            <div class="col-5">
                                                <label for="" class="text-secondary font-weight-bold">{{$item->nama_lengkap}} @if($item->is_featured === 1) <span class="site-btn" style="padding:4px 5px; font-size:10px; font-weight:normal !important">Utama</span> @endif</label>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-3 text-right">
                                                <label for="" class="text-secondary">Telepon</label>
                                            </div>
                                            <div class="col-5">
                                                <label for="" class="text-secondary">{{$item->nomor_telp}}</label>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-3 text-right">
                                                <label for="" class="text-secondary">Alamat</label>
                                            </div>
                                            <div class="col-8">
                                                <label for="" class="text-secondary">{{$item->alamat_detail}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12 text-center">
                                        <div class="flex">
                                            <a href="#" onclick="editData('{{$item}}')" class="site-btn mr-3" style="padding:12px 12px; font-size:12px">Ubah</a>
                                            <a href="#" onclick="confirmDelete('{{$item->id}}')" class="site-btn" style="padding:12px 12px; font-size:12px; background-color:#f56954" >Hapus</a>
                                        </div>
                                        <div class="mt-3">
                                            @if ($item->is_featured === 0)
                                                <button class="site-btn" onclick="changeStatus('{{$item->id}}', '1')" style="padding:12px 12px; font-size:12px; ">Jadikan Utama</button>
                                            @else
                                                <button class="site-btn bg-secondary" style="padding:12px 12px; font-size:12px; " disabled>Jadikan Utama</button>
                                            @endif
                                        </div>
                                    </div>
                                    <hr style="width: 50%">
                                    </div>
                                
                            @endforeach
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

     <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>
     <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js'></script>
     @if (count($errors) > 0)
     <script type="text/javascript">
         $( document ).ready(function() {
              $('#add-address').modal('show');
         });
     </script>
    @endif
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
                    text: "Alamat akan menjadi "+status_desc+" !",
                    showCancelButton: true,
                    confirmButtonColor: '#7fad39',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, '+status_desc+'kan!'
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
                                        location.replace("{{ route('address.konsumen') }}");
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