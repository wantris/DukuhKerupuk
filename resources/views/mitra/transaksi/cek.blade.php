@extends('mitra.layouts.master')

@section('title', 'Mitra | Daftar Produk')


    @section('content')
        <div class="section-header">
            <h1>Produk Saya</h1>
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
                        <div class="topnav mx-4">
                            <a class="tablinks" href="{{route('portal.mitra.trans.list','all')}}">Semua</a>
                            <a href="{{route('portal.mitra.trans.list','pending')}}" class="tablinks"  >Belum Bayar</a>
                            <a href="{{route('portal.mitra.trans.list','cek')}}" class="tablinks active" >Cek</a>
                            <a href="{{route('portal.mitra.trans.list','dikemas')}}" class="tablinks" >Dikemas</a>
                            <a href="{{route('portal.mitra.trans.list','dikirim')}}" class="tablinks" >Dikirim</a>
                            <a href="{{route('portal.mitra.trans.list','selesai')}}" class="tablinks" >Selesai</a>
                        </div>
                    </div>
                    <div class="row tabcontent" id="kalender">
                        <div class="col-lg-12">
                            <div class="row ml-4 mr-4">
                                <div class="col-lg-4 col-12 d-flex mb-3">
                                    <p class="h5 mr-3 mt-1">{{$ts->count()}} Transaksi</p>
                                    <div class="btn btn-primary" style="border-radius: 20px; padding:5px 20px">
                                        {{$ts->count()}}/100
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-2 ">
                                <div class="col-12">
                                    <div class="table-responsive border pb-3" style="min-height: 300px">
                                        <table class="table table-striped" id="product-table">
                                          <thead>
                                            <tr>
                                                <th>Nota</th>
                                                <th>Pembeli</th>
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
                                                    <td>
                                                        {{$item->userRef->nama_user}}
                                                    </td>
                                                    <td>Rp.{{$item->total_harga}}</td>
                                                    <td>{{$item->diskon}}</td>
                                                    <td>{{$item->pengiriman}}</td>
                                                    <td><div id="ket_status_{{$item->nota}}">
                                                        {{$item->status}}
                                                        </div></td>
                                                    <td>{{$item->created_at->isoFormat('D MMMM Y')}}</td>
                                                    <td><div class="d-flex">
                                                            <a href="#" class="btn btn-info mr-2" id="lihat-bukti" onclick="lookTf('{{$item}}')" title="Lihat Bukti Transfer"><i class="fas fa-images"></i></a>
                                                            <a href="#" class="btn btn-primary mr-2" title="Detail"><i class="fas fa-eye"></i></a>
                                                            @if ($item->status === "pending")
                                                                <a href="#" onclick="changeStatus('{{$item->kd_transaksi}}','cek')" class="btn btn-success mr-2" title="Buat Cek"><i class="fas fa-check"></i></a>
                                                            @elseif($item->status === "cek")
                                                                <a href="#" onclick="changeStatus('{{$item->kd_transaksi}}','dikemas')" class="btn btn-success mr-2" title="Buat dikemas"><i class="fas fa-check"></i></a>
                                                            @elseif($item->status === "dikemas")
                                                                <a href="#" onclick="changeStatus('{{$item->kd_transaksi}}','dikirim')" class="btn btn-success mr-2" title="Buat dikirim"><i class="fas fa-check"></i></a>
                                                            @elseif($item->status === "dikirim")
                                                                <a href="#" onclick="changeStatus('{{$item->kd_transaksi}}','selesai')" class="btn btn-success mr-2" title="Buat selesai"><i class="fas fa-check"></i></a>
                                                            @endif
                                                        </div>

                                                    </td>
                                              </tr>
                                              @endforeach
                                          </tbody>
                                        </table>
                                        @if ($ts->count() === 0)
                                        <div class="col-lg-12 text-center mt-5 mb-4" >
                                            <img src="{{url('icon/shopping-bag.svg')}}" style="max-width: 120px; height:auto" alt="">
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
{{-- 
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div> --}}
          <img src="" alt="">
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

            

            function lookTf(item){
                event.preventDefault();
                var item = JSON.parse(item);
                var url = "{{url('/transfer/bukti-transfer')}}/"+item.bukti_transfer;
                console.log(url);
                $("#lihat-bukti").fireModal({
                    title:"Bukti Transfer",
                    body: '<img src="'+ url +'" alt="Bukti Transfer" class="img-fluid">' , 
                    center: true
                });
            };

            function changeStatus(kd, status) {
                event.preventDefault();
                console.log(kd, status);
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, proses untuk '+status
                })
            
                .then(function (success) {
                    if (success.value) {
                        var url = '{{ url("mitra/portal/transaksi/change-status/") }}/'+kd;
                        console.log(url);
                        $.ajax({
                            url: url,
                            type: "PATCH",
                            data:{
                                status:status
                            },
                            success: function (data) {
                                console.log(data);
                                if (data.status == 1) {
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
    @endpush
      
