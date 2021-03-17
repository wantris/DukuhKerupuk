@extends('mitra.layouts.master')

@section('title', 'Mitra | Daftar Produk')


    @section('content')
        <div class="section-header">
            <h1>Tambah Promo</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
            <div class="breadcrumb-item">Breadcrumb</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-stats-title mt-3">
                            <p class="h3 font-weight-bold">Tambah Promo Baru</p>
                            <p class="">Buat promo untuk meningkatkan penjualan Anda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{route('portal.mitra.promo.save')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>	
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                      
                            @if ($message = Session::get('failed'))
                                <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>	
                                <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <div class="card-stats-title mt-3">
                                <p class="h5 font-weight-bold">Informasi Promo</p>
                            </div>
                            <hr class="mb-2">
                            <div class="form-group row mt-5">
                                <p class="mt-1 col-sm-2 col-form-label">Tipe Promo : </p>
                                <div class="col-lg-9 col-12">
                                    <div class="d-flex ml-2">
                                        <a href="#" class="mr-5" onclick="promoType('promo-toko')" style="text-decoration: none">
                                            <div class="card shadow-sm border" id="promo-toko" style="width: 200px;height:60px;position:relative">
                                                <div class="border shadow-sm bg-white" style="position:absolute; width:40px; height:40px; border-radius:50%; right:-20px; top:8px;"><i class="icon-promo-card fas fa-check-circle" id="promo-toko-fas"></i></div>
                                                <div class="card-body py-2">
                                                    <div class="row">
                                                        <div class="col-4" style="height: 40px">
                                                            <img src="{{url('icon/store.svg')}}" style="width:30px; height:30px" alt="">
                                                        </div>
                                                        <div class="col-8" style="height: 40px">
                                                            <p class="text-left text-promo">Promo Toko</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" onclick="promoType('promo-produk')" style="text-decoration: none">
                                            <div class="card shadow-sm border" id="promo-produk" style="width: 200px;height:60px;position:relative">
                                                <div class="border shadow-sm bg-white" style="position:absolute; width:40px; height:40px; border-radius:50%; right:-20px; top:8px;"><i class="icon-promo-card fas fa-check-circle" id="promo-produk-fas"></i></div>
                                                <div class="card-body py-2">
                                                    <div class="row">
                                                        <div class="col-4" style="height: 40px">
                                                            <img src="{{url('icon/voucher-icon.svg')}}" style="width:30px; height:40px" alt="">
                                                        </div>
                                                        <div class="col-8" style="height: 40px">
                                                            <p class="text-left text-promo">Promo Produk</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="tipe_promo" id="tipe_promo">
                            <div class="form-group row d-none" id="field_produk">
                                <p class="mt-1 col-sm-2 col-form-label">Daftar Produk : </p>
                                <div class="col-lg-9 col-12">
                                    <select name="product_id[]" class=" @error('product_id') is-invalid @enderror ml-4" id="product_select" multiple="multiple">
                                        <option >Pilih Produk</option>
                                        @foreach ($product as $product)
                                            <option value="{{$product->id_produk}}">{{$product->nama_produk}}</option>
                                        @endforeach
                                    </select>
                                    @error('product_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="mt-1 col-sm-2 col-form-label">Nama Promo : </p>
                                <div class="col-lg-9 col-12">
                                    <input type="text" name="nama_promo" class="@error('nama_promo') is-invalid @enderror form-control" id="inputEmail3" placeholder="Nama Promo">
                                    @error('nama_promo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="mt-1 col-sm-2 col-form-label">Kode Promo : </p>
                                <div class="col-lg-9 col-12">
                                    <input type="text" name="kode_promo" class="@error('kode_promo') is-invalid @enderror form-control" id="inputEmail3" placeholder="Kode Promo">
                                    @error('kode_promo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="mt-1 col-sm-2 col-form-label">Periode Promo : </p>
                                <div class="col-lg-9 col-12">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" id="inputEmail3" name="start_date" placeholder="Input">
                                        </div>
                                        <label for="inputEmail3" class="col-form-label">-</label>
                                        <div class="col-sm-4">
                                              <input type="date" class="form-control" name="end_date" id="inputEmail3" placeholder="Input">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="mt-1 col-sm-2 col-form-label">Jumlah Diskon : </p>
                                <div class="col-lg-9 col-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 20%">
                                            <select name="discount_type" onchange="discountType()" class="form-control" id="select-diskon">
                                                <option selected value="langsung">Diskon langsung</option>
                                                <option value="presentase">Presentase</option>
                                            </select>
                                        </div>
                                        <div class="input-group-prepend" id="diskon_langsung">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input type="text" name="jumlah_diskon"  placeholder="Jumlah Diskon" class="form-control phone-number @error('jumlah_diskon') is-invalid @enderror">
                                        <div class="input-group-prepend d-none" id="diskon_presentase">
                                            <div class="input-group-text">
                                                %DISKON
                                            </div>
                                        </div>
                                    </div>
                                    @error('jumlah_diskon')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="mt-1 col-sm-2 col-form-label">Kuota : </p>
                                <div class="col-lg-9 col-12">
                                    <input type="text" name="kuota" class="@error('kuota') is-invalid @enderror form-control" id="inputEmail3" placeholder="Kuota">
                                    @error('kuota')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="mt-1 col-sm-2 col-form-label">Status Promo : </p>
                                <div class="col-lg-9 col-12">
                                    <select name="status_promo" class=" @error('status_promo') is-invalid @enderror ml-4" id="status_select">
                                        <option selected>Pilih Status Promo</option>
                                        <option value="0">Ditutup</option>
                                        <option value="1">Dibuka</option>
                                    </select>
                                    @error('status_promo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    <a type="submit" class="btn btn-light mr-3">Batalkan</a>
                    <input type="submit" value="Simpan & Tampilkan" class="btn btn-primary mr-3">
                </div>
            </div>
    </form>
        
    @endsection

    @push('scripts')
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
        <script>
            var latestType = null;
            $(document).ready(function() {
                $('#status_select, #product_select').select2();
            });

            function promoType(type){
                event.preventDefault();
                if(type === "promo-produk"){
                    $('#field_produk').removeClass('d-none');
                }else{
                    $('#field_produk').addClass('d-none');
                }
                $('#'+type).removeClass('shadow-sm');
                $('#'+type).addClass('shadow');
                $('#'+type+"-fas").addClass('check-icon');
                if(latestType === null){
                    latestType = type;
                }else{
                    $('#'+latestType).removeClass('shadow');
                    $('#'+latestType).addClass('shadow-sm');
                    $('#'+latestType+"-fas").removeClass('check-icon');
                    latestType = type;
                };

                $('#tipe_promo').val(type);
            };

            var lastDiscount = $('#select-diskon').val();
            
            function discountType(){
                var currentDiscount = $('#select-diskon').val();
                $('#diskon_'+lastDiscount).addClass('d-none');
                $('#diskon_'+currentDiscount).removeClass('d-none');
                lastDiscount = currentDiscount;
            }
        </script>
    @endpush
      
