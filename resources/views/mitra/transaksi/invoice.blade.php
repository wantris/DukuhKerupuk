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
        <div class="section-body">
            <div class="invoice">
              <div class="invoice-print">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="invoice-title">
                      <h2>Detail Transaksi</h2>
                      <div class="invoice-number">Kode Transaksi #{{$kd}}</div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Pembeli:</strong><br>
                            {{$ts->userRef->nama_user}}<br>
                            {{$ts->userRef->no_tlp}}<br>
                            {{$ts->kode_pos}}<br>
                            {{$ts->alamat}}
                        </address>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Proses Pemesanan:</strong><br>
                          {{$ts->pengiriman}}<br>
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Tanggal Pembelian:</strong><br>
                          {{$ts->created_at->isoFormat('D MMMM Y')}}<br><br>
                        </address>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title">Ringkasan Pesanan</div>
                    <p class="section-lead">Semua item tidak bisa dihapus.</p>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-md">
                        <tr>
                          <th data-width="40">#</th>
                          <th>Produk</th>
                          <th class="text-center">Harga</th>
                          <th class="text-center">Jumlah</th>
                          <th class="text-right">Totals</th>
                        </tr>
                        @php
                            $subtotal = 0;
                        @endphp
                        @foreach ($detail as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->productRef->nama_produk}}</td>
                                <td class="text-center">Rp {{number_format($item->harga,'0','.','.')}}</td>
                                <td class="text-center">{{$item->qty}}</td>
                                <td class="text-right">Rp {{number_format($item->subtotal,'0','.','.')}}</td>
                            </tr>
                            @php
                                $subtotal += (int)$item->subtotal;
                            @endphp
                        @endforeach
                      </table>
                    </div>
                    <div class="row mt-4">
                      <div class="col-lg-8">
                        {{-- <div class="section-title">Payment Method</div>
                        <p class="section-lead">The payment method that we provide is to make it easier for you to pay invoices.</p>
                        <div class="d-flex">
                          <div class="mr-2 bg-visa" data-width="61" data-height="38"></div>
                          <div class="mr-2 bg-jcb" data-width="61" data-height="38"></div>
                          <div class="mr-2 bg-mastercard" data-width="61" data-height="38"></div>
                          <div class="bg-paypal" data-width="61" data-height="38"></div>
                        </div> --}}
                      </div>
                      <div class="col-lg-4 text-right">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Subtotal </div>
                          <div class="invoice-detail-value">Rp {{number_format($subtotal,'0','.','.')}}</div>
                        </div>
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Diskon</div>
                          <div class="invoice-detail-value">Rp {{number_format($ts->diskon,'0','.','.')}}</div>
                        </div>
                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Total</div>
                          <div class="invoice-detail-value invoice-detail-value-lg">Rp {{number_format($ts->total_harga,'0','.','.')}}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                  <a href="https://www.google.com/maps/search/?api=1&query={{$ts->latitude}},{{$ts->longitude}}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i>Lihat Map</a>
                  <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button>
                </div>
                <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
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
      
