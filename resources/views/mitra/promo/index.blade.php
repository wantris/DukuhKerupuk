@extends('mitra.layouts.master')

@section('title', 'Mitra | Daftar Produk')


    @section('content')
        <div class="section-header">
            <h1>Promo Saya </h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
            <div class="breadcrumb-item">Breadcrumb</div>
            </div>
        </div>
        @if ($message = Session::get('successUpdate'))
            <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('failedUpdate'))
            <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-statistic-2">
                    <div class="card-stats mb-4">
                        <div class="d-flex ml-5 mt-3">
                            <a href="{{route('portal.mitra.promo.list', 'promo-toko')}}" class="mr-5" style="text-decoration: none">
                                <div class="card @if(Request::url() === url('/mitra/portal/promo/list/promo-toko')) shadow @else shadow-sm @endif border" id="promo_toko" style="width: 200px;position:relative">
                                    <div class="border shadow-sm bg-white" style="position:absolute; width:40px; height:40px; border-radius:50%; right:-20px; top:8px;"><i class="icon-promo-card @if(Request::url() === url('/mitra/portal/promo/list/promo-toko')) check-icon @endif fas fa-check-circle"></i></div>
                                    <div class="card-body py-2">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="{{url('icon/store.svg')}}" style="width:30px; height:30px" alt="">
                                            </div>
                                            <div class="col-8">
                                                <p class="text-left text-promo">Promo Toko</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{route('portal.mitra.promo.list', 'promo-produk')}}" style="text-decoration: none">
                                <div class="card @if(Request::url() === url('/mitra/portal/promo/list/promo-produk')) shadow @else shadow-sm @endif border" id="promo_toko" style="width: 200px;position:relative">
                                    <div class="border shadow-sm bg-white" style="position:absolute; width:40px; height:40px; border-radius:50%; right:-20px; top:8px;"><i class="icon-promo-card @if(Request::url() === url('/mitra/portal/promo/list/promo-produk')) check-icon @endif fas fa-check-circle"></i></div>
                                    <div class="card-body py-2">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="{{url('icon/voucher-icon.svg')}}" style="width:30px; height:30px" alt="">
                                            </div>
                                            <div class="col-8">
                                                <p class="text-left text-promo">Promo Produk</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row tabcontent" id="kalender">
                        <div class="col-lg-12">
                            <div class="row ml-4 mr-4">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Promo</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="inputEmail3" placeholder="Input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Periode</label>
                                        <div class="col-sm-4">
                                          <input type="date" class="form-control" id="inputEmail3" placeholder="Input">
                                        </div>
                                        <label for="inputEmail3" class="col-form-label">-</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" id="inputEmail3" placeholder="Input">
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-8">
                                          <select name="" id="category_select">
                                              <option selected>Pilih Status</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Kode Promo</label>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" id="inputEmail3" placeholder="Input">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-4 mr-4 mb-5">
                                <div class="col-lg-6 col-12 d-flex">
                                    <button type="submit" class="btn btn-primary mr-3">Cari</button>
                                    <button type="submit" class="btn btn-light text-primary">Atur Ulang</button>
                                </div>
                            </div>
                            <div class="row ml-4 mr-4 mt-5">
                                <div class="col-lg-4 col-12 d-flex mb-3">
                                    <p class="h5 mr-3 mt-1">{{$promo->count()}} Promo</p>
                                    <div class="btn btn-primary" style="border-radius: 20px; padding:5px 20px">
                                        {{$promo->count()}}/20
                                    </div>
                                </div>
                                <div class="col-lg-8 col-12 text-right">
                                    <a href="{{route('portal.mitra.promo.create')}}" type="submit" class="btn btn-primary mr-3"><i class="fas fa-plus mr-2"></i>Tambah Promo</a>
                                </div>
                            </div>
                            <div class="row mx-2 ">
                                <div class="col-12">
                                    <div class="table-responsive border pb-3" style="min-height: 300px">
                                        <table class="table table-striped" id="product-table">
                                          <thead>
                                            <tr>
                                                <th>
                                                  <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                  </div>
                                                </th>
                                                <th onclick="sortTable(0)">Nama Promo</th>
                                                <th>Tipe Promo</th>
                                                <th>Kode Promo</th>
                                                <th>Periode Promo</th>
                                                <th>Jumlah Diskon</th>
                                                <th>Kuota</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              @foreach ($promo as $item)
                                                  <tr id="tr_{{$item->id}}">
                                                      <td>
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                          </div>
                                                      </td>
                                                      <td>{{$item->nama_promo}}</td>
                                                      <td>
                                                          @if ((bool)$item->tipe_promo === true)
                                                            Tersedia
                                                          @else
                                                            Tidak tersedia
                                                          @endif
                                                      </td>
                                                      <td>{{$item->kode_voucher}}</td>
                                                      <td>{{$item->start_date}} - {{$item->end_date}}</td>
                                                      <td>{{$item->jumlah_diskon}}</td>
                                                      <td>{{$item->kuota}}</td>
                                                      <td>{{$item->status}}</td>
                                                      <td>
                                                        <div class="d-flex">
                                                            <a href="{{route('portal.mitra.promo.edit', $item->id)}}" class="btn btn-primary mr-2" title="Edit Produk"><i class="fas fa-edit"></i></a>
                                                            <a href="#" onclick="confirmDelete('{{$item->id}}')" class="btn btn-danger mr-2" title="Hapus Promo"><i class="fas fa-trash"></i></a>
                                                            <div id="status_{{$item->id_produk}}">
                                                                @if((string)$item->status === "1")
                                                                    <a href="#" onclick="changeStatus('{{$item->id}}', '0')" class="btn btn-info" title="Tutup Promo"><i class="fas fa-power-off"></i></a>
                                                                @else
                                                                    <a href="#" onclick="changeStatus('{{$item->id}}', '1')" class="btn btn-info" title="Buka Promo"><i class="fas fa-eye"></i></a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                      </td>
                                                  </tr>
                                              @endforeach
                                          </tbody>
                                        </table>
                                        @if ($promo->count() === 0)
                                            <div class="col-lg-12 text-center mt-5 mb-4" >
                                                <img src="{{url('icon/voucher.svg')}}" style="max-width: 120px; height:auto" alt="">
                                                <p class="text-secondary">Tidak ada produk</p>
                                            </div>
                                        @endif
                                      </div>
                                    </div>
                              </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
        <script>
            
            $(document).ready(function() {
                $('#category_select').select2();
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function confirmDelete(id) {
                event.preventDefault();
                console.log(id);
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda tidak akan bisa mengembalikan data yang dihapus!",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, hapus promo!'
                })
                .then(function (success) {
                    if (success.value) {
                        var url = '{{ url("mitra/portal/promo/delete/") }}/'+id;
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
                                    });
                                    $('#tr_'+id).remove();
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

            function changeStatus(id, status){
                event.preventDefault();
                var status_desc;
                if(status === "1"){
                    status_desc = "buka";
                }else{
                    status_desc = "tutup";
                }
                console.log(id, status, status_desc);
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Promo akan di "+status_desc+" !",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, '+status_desc+'kan!'
                })
                .then(function (success) {
                    if (success.value) {
                        var url = '{{ url("mitra/portal/promo/change-status") }}';
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
                                        text: "Promo telah di "+status_desc+" \n Click OK",
                                        icon: "success",
                                        confirmButtonClass: "btn btn-outline-info",
                                    });

                                    location.replace("{{ route('portal.mitra.promo.list',$type) }}");
                                    
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
            }

        </script>
    @endpush
      
