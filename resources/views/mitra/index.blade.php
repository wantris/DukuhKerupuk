@extends('mitra.layouts.master')

@section('title', 'Mitra | Portal')


    @section('content')
        <div class="section-header">
          <h1>Dashboard {{$mitra->nama_mitra}}</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          </div>
        </div>
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats mb-5">
                    <div class="card-stats-title">
                        <p class="h3 font-weight-bold">Statistik Penjualan Anda</p>
                        <p class="">Hal-hal yang perlu Anda tangani</p>
                    </div>
                    <div class="card-stats-items mt-4">
                        <a href="" class="card-stats-item border-right">
                            @php
                                $pending = App\Transaksi::where('mitra_id', Auth::guard('mitra')->id())->where('status','pending')->get();
                            @endphp
                            <div class="card-stats-item-count">{{$pending->count()}}</div>
                            <div class="card-stats-item-label">Belum Bayar</div>
                        </a>
                        <a href="" class="card-stats-item border-right">
                          @php
                              $cek = App\Transaksi::where('mitra_id', Auth::guard('mitra')->id())->where('status','cek')->get();
                          @endphp
                            <div class="card-stats-item-count">{{$cek->count()}}</div>
                            <div class="card-stats-item-label">Perlu Diroses</div>
                        </a>
                        <a href="" class="card-stats-item">
                            @php
                                $dikemas = App\Transaksi::where('mitra_id', Auth::guard('mitra')->id())->where('status','dikemas')->get();
                            @endphp
                            <div class="card-stats-item-count">{{$dikemas->count()}}</div>
                            <div class="card-stats-item-label">Telah Diproses</div>
                        </a>
                    </div>
                    <div class="card-stats-items mt-5">
                        <a href="" class="card-stats-item border-right">
                            @php
                                $cod = App\Transaksi::where('mitra_id', Auth::guard('mitra')->id())->where('pengiriman','cod')->get();
                            @endphp
                            <div class="card-stats-item-count">{{$cod->count()}}</div>
                            <div class="card-stats-item-label">Proses COD</div>
                        </a>
                        <a href="" class="card-stats-item border-right">
                            @php
                                $pr_habis = App\Product::where('id_mitra', Auth::guard('mitra')->id())->where('stok',0)->get();
                            @endphp
                            <div class="card-stats-item-count">{{$pr_habis->count()}}</div>
                            <div class="card-stats-item-label">Produk Habis</div>
                        </a>
                        <a href="" class="card-stats-item">
                            @php
                                $pr_jual = App\Product::where('id_mitra', Auth::guard('mitra')->id())->where('penjualan', '>',0)->get();
                            @endphp
                            <div class="card-stats-item-count">{{$pr_jual->count()}}</div>
                            <div class="card-stats-item-label">Produk Terjual</div>
                        </a>
                    </div>
                </div>
                <div class="card-wrap">
                  <div class="card-body">
                  </div>
                </div>
              </div>
            </div>
            {{-- <div class="row">
              <div class="col-12">
                <form action="" method="POST">
                  <div class="form-group">
                      <input type="text" class="form-control" name="message" placeholder="Message" id="">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="imageUrl" placeholder="url image" id="">
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Submit" name="imageUrl">
                  </div>
                </form>
              </div>
            </div> --}}
            <div class="col-lg-4 col-md-4 col-12">
                <div class="card card-statistic-2">
                    <div class="card-stats mb-3">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-eye"></i>
                          </div>
                        <div class="card-stats-title">
                            <p class="h4 font-weight-bold">Jumlah <br> Kunjungan</p>
                        </div>
                        
                    </div>
                    <div class="card-stats-title mb-5">
                        <p class="h1 font-weight-bold text-center">0</p>
                    </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8">
                <div class="card card-statistic-2">
                    <div class="card-stats mb-5">
                        <div class="card-stats-title">
                            <p class="h3 font-weight-bold">Promosi Mitra</p>
                            <p class="">Anda bisa membuat voucher promosi</p>
                        </div>
                        <div class="topnav mx-4">
                            <a class="tablinks active" href="#" onclick="openCity(event, 'kalender')">Kalender</a>
                            <a href="#" class="tablinks"  onclick="openCity(event, 'produk')">Promo Produk</a>
                            <a href="#" class="tablinks" onclick="openCity(event, 'voucher')">Promo Voucher</a>
                        </div>
                    </div>
                    <div class="row tabcontent" id="kalender">
                        <div class="col-lg-12">
                            <div class="mx-4" id='calendar'>
                              {!! $calendar->calendar() !!}
                              
                            </div>
                        </div>
                    </div>
                    <div class="row tabcontent" id="produk" style="display: none;">
                        @if ($promo_produk->count() > 0)
                          <div class="col-lg-12 " style="padding: 0px 40px">
                            <div class="table-responsive border pb-3" style="min-height: 300px">
                              <table class="table table-striped" id="product-table">
                                <thead>
                                  <tr>
                                      <th>Nama Promo</th>
                                      <th>Produk</th>
                                      <th>Jumlah Diskon</th>
                                      <th>Batas Akhir</th>
                                      <th>Kuota</th>
                                      <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($promo_produk as $pp)
                                        <tr id="tr_{{$pp->id}}">
                                            <td>{{$pp->nama_promo}}</td>
                                            <td>{{$pp->productRef->nama_produk}}</td>
                                            <td>{{$pp->jumlah_diskon}}</td>
                                            <td>{{$pp->end_date}}</td>
                                            <td>{{$pp->kuota}}</td>
                                            <td>
                                              @if ((bool)$pp->tipe_promo === true)
                                                Tersedia
                                              @else
                                                Tidak tersedia
                                              @endif
                                          </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="col-12 pl-5 mt-3">
                            <a href="#" class="text-primary">Lihat semua promo voucher <i class="fas fa-chevron-right mr-2"></i></a>
                          </div>
                        @else
                          <div class="col-lg-12 text-center mt-4 mb-4">
                            <img src="{{url('icon/voucher-adm.svg')}}" style="max-width: 120px; height:auto" alt="">
                            <p class="text-secondary">Tidak ada data</p>
                          </div>
                        @endif
                    </div>
                    <div class="row tabcontent" id="voucher" style="display: none;">
                        < @if ($promo_toko->count() > 0)
                        <div class="col-lg-12 " style="padding: 0px 40px">
                          <div class="table-responsive border pb-3" style="min-height: 300px">
                            <table class="table table-striped" id="product-table">
                              <thead>
                                <tr>
                                    <th>Nama Promo</th>
                                    <th>Tipe Diskon</th>
                                    <th>Jumlah Diskon</th>
                                    <th>Batas Akhir</th>
                                    <th>Kuota</th>
                                    <th>Status</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($promo_toko as $pt)
                                      <tr id="tr_{{$pt->id}}">
                                          <td>{{$pt->nama_promo}}</td>
                                          <td>{{$pt->tipe_promo}}</td>
                                          <td>{{$pt->jumlah_diskon}}</td>
                                          <td>{{$pt->end_date}}</td>
                                          <td>{{$pt->kuota}}</td>
                                          <td>
                                            @if ((bool)$pt->tipe_promo === true)
                                              Tersedia
                                            @else
                                              Tidak tersedia
                                            @endif
                                        </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="col-12 pl-5 mt-3">
                          <a href="#" class="text-primary">Lihat semua promo voucher <i class="fas fa-chevron-right mr-2"></i></a>
                        </div>
                      @else
                        <div class="col-lg-12 text-center mt-4 mb-4">
                          <img src="{{url('icon/voucher-adm.svg')}}" style="max-width: 120px; height:auto" alt="">
                          <p class="text-secondary">Tidak ada data</p>
                        </div>
                      @endif
                    </div>
                    <div class="card-wrap">
                      <div class="card-body">
                      </div>
                    </div>
                  </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Invoices</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-danger mr-3">Lihat Lebih Banyak  <i class="fas fa-chevron-right ml-3"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>Kode Transaksi</th>
                        <th>Pembeli</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                      </tr>
                      @foreach ($ts as $ts)
                        <tr>
                          <td><a href="#">{{$ts->kd_transaksi}}</a></td>
                          <td class="font-weight-600">{{$ts->userRef->nama_user}}</td>
                          <td>
                            @if ($ts->status === "pending")
                              <div class="badge badge-warning">{{$ts->status}}</div> 
                            @elseif($ts->status === "cek")
                              <div class="badge badge-primary">{{$ts->status}}</div>
                            @elseif($ts->status === "dikirim")
                              <div class="badge badge-info">{{$ts->status}}</div>
                            @elseif($ts->status === "expired")
                              <div class="badge badge-danger">{{$ts->status}}</div>
                            @endif
                            </td>
                          <td>{{$ts->created_at->isoFormat('D MMM Y')}}</td>
                          <td>
                            <a href="#" class="btn btn-primary">Detail</a>
                          </td>
                        </tr> 
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-hero">
                <div class="card-header">
                  <div class="card-icon">
                    <i class="far fa-question-circle"></i>
                  </div>
                  <h4>14</h4>
                  <div class="card-description">Customers need help</div>
                </div>
                <div class="card-body p-0">
                  <div class="tickets-list">
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>My order hasn't arrived yet</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Laila Tazkiah</div>
                        <div class="bullet"></div>
                        <div class="text-primary">1 min ago</div>
                      </div>
                    </a>
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>Please cancel my order</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Rizal Fakhri</div>
                        <div class="bullet"></div>
                        <div>2 hours ago</div>
                      </div>
                    </a>
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>Do you see my mother?</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Syahdan Ubaidillah</div>
                        <div class="bullet"></div>
                        <div>6 hours ago</div>
                      </div>
                    </a>
                    <a href="features-tickets.html" class="ticket-item ticket-more">
                      View All <i class="fas fa-chevron-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
    @endsection

    @push('scripts')
    <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script>
    <script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>
    <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/lang-all.js"></script>
        {!! $calendar->script() !!}
        <script>
            function openCity(evt, cityName) {
                event.preventDefault();
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            };
        </script>
    @endpush
      
