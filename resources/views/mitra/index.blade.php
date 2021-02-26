@extends('mitra.layouts.master')

@section('title', 'Mitra | Portal')


    @section('content')
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
                            <div class="card-stats-item-count">24</div>
                            <div class="card-stats-item-label">Belum Bayar</div>
                        </a>
                        <a href="" class="card-stats-item border-right">
                            <div class="card-stats-item-count">12</div>
                            <div class="card-stats-item-label">Perlu Diroses</div>
                        </a>
                        <a href="" class="card-stats-item">
                            <div class="card-stats-item-count">23</div>
                            <div class="card-stats-item-label">Telah Diproses</div>
                        </a>
                    </div>
                    <div class="card-stats-items mt-5">
                        <a href="" class="card-stats-item border-right">
                            <div class="card-stats-item-count">23</div>
                            <div class="card-stats-item-label">Proses Pembatalan</div>
                        </a>
                        <a href="" class="card-stats-item border-right">
                            <div class="card-stats-item-count">23</div>
                            <div class="card-stats-item-label">Produk Habis</div>
                        </a>
                        <a href="" class="card-stats-item">
                            <div class="card-stats-item-count">23</div>
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
                            <div class="mx-4" id='calendar'></div>
                        </div>
                    </div>
                    <div class="row tabcontent" id="produk" style="display: none;">
                        <div class="col-lg-12 text-center mt-4 mb-4">
                            <img src="{{url('icon/voucher-adm.svg')}}" style="max-width: 120px; height:auto" alt="">
                            <p class="text-secondary">Tidak ada data</p>
                        </div>
                        <div class="col-12 pl-5 mt-3">
                            <a href="#" class="text-primary">Lihat semua promo produk <i class="fas fa-chevron-right mr-2"></i></a>
                        </div>
                    </div>
                    <div class="row tabcontent" id="voucher" style="display: none;">
                        <div class="col-lg-12 text-center mt-4 mb-4">
                            <img src="{{url('icon/voucher-adm.svg')}}" style="max-width: 120px; height:auto" alt="">
                            <p class="text-secondary">Tidak ada data</p>
                        </div>
                        <div class="col-12 pl-5 mt-3">
                            <a href="#" class="text-primary">Lihat semua promo voucher <i class="fas fa-chevron-right mr-2"></i></a>
                        </div>
                    </div>
                    <div class="card-wrap">
                      <div class="card-body">
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-lg-4">
              <div class="card gradient-bottom">
                <div class="card-header">
                  <h4>Top 5 Produk</h4>
                  <div class="card-header-action dropdown">
                    <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Bulan ini</a>
                    <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                      <li class="dropdown-title">Pilih Periode</li>
                      <li><a href="#" class="dropdown-item">Hari ini</a></li>
                      <li><a href="#" class="dropdown-item">Minggu ini</a></li>
                      <li><a href="#" class="dropdown-item active">Bulan ini</a></li>
                      <li><a href="#" class="dropdown-item">Tahun ini</a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body" id="top-5-scroll">
                  <ul class="list-unstyled list-unstyled-border">
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="{{url('assets-user/upload-produk/kerupuk.jpeg')}}" alt="product">
                      <div class="media-body">
                        <div class="float-right"><div class="font-weight-600 text-muted text-small">86 Terjual</div></div>
                        <div class="media-title">kerupuk Kulit</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="64%"></div>
                            <div class="budget-price-label">Rp. 200.000</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="43%"></div>
                            <div class="budget-price-label">Rp.50.000</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="{{url('assets-user/upload-produk/kerupuk2.jpeg')}}" alt="product">
                      <div class="media-body">
                        <div class="float-right"><div class="font-weight-600 text-muted text-small">67 Terjual</div></div>
                        <div class="media-title">Kerupuk Udang</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="84%"></div>
                            <div class="budget-price-label">Rp.300.000</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="60%"></div>
                            <div class="budget-price-label">Rp.100.000</div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="card-footer pt-3 d-flex justify-content-center">
                  <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-primary" data-width="20"></div>
                    <div class="budget-price-label">Selling Price</div>
                  </div>
                  <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-danger" data-width="20"></div>
                    <div class="budget-price-label">Budget Price</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4>Best Products</h4>
                </div>
                <div class="card-body">
                  <div class="owl-carousel owl-theme" id="products-carousel">
                    <div>
                      <div class="product-item pb-3">
                        <div class="product-image">
                          <img alt="image" src="{{url('stisla/img/products/product-4-50.png')}}" class="img-fluid">
                        </div>
                        <div class="product-details">
                          <div class="product-name">iBook Pro 2018</div>
                          <div class="product-review">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                          </div>
                          <div class="text-muted text-small">67 Sales</div>
                          <div class="product-cta">
                            <a href="#" class="btn btn-primary">Detail</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="product-item">
                        <div class="product-image">
                          <img alt="image" src="{{url('stisla/img/products/product-3-50.png')}}" class="img-fluid">
                        </div>
                        <div class="product-details">
                          <div class="product-name">oPhone S9 Limited</div>
                          <div class="product-review">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half"></i>
                          </div>
                          <div class="text-muted text-small">86 Sales</div>
                          <div class="product-cta">
                            <a href="#" class="btn btn-primary">Detail</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="product-item">
                        <div class="product-image">
                          <img alt="image" src="{{url('stisla/img/products/product-1-50.png')}}" class="img-fluid">
                        </div>
                        <div class="product-details">
                          <div class="product-name">Headphone Blitz</div>
                          <div class="product-review">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                          </div>
                          <div class="text-muted text-small">63 Sales</div>
                          <div class="product-cta">
                            <a href="#" class="btn btn-primary">Detail</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4>Top Countries</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="text-title mb-2">July</div>
                      <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="../node_modules/flag-icon-css/flags/4x3/id.svg" alt="image" width="40">
                          <div class="media-body ml-3">
                            <div class="media-title">Indonesia</div>
                            <div class="text-small text-muted">3,282 <i class="fas fa-caret-down text-danger"></i></div>
                          </div>
                        </li>
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="../node_modules/flag-icon-css/flags/4x3/my.svg" alt="image" width="40">
                          <div class="media-body ml-3">
                            <div class="media-title">Malaysia</div>
                            <div class="text-small text-muted">2,976 <i class="fas fa-caret-down text-danger"></i></div>
                          </div>
                        </li>
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="../node_modules/flag-icon-css/flags/4x3/us.svg" alt="image" width="40">
                          <div class="media-body ml-3">
                            <div class="media-title">United States</div>
                            <div class="text-small text-muted">1,576 <i class="fas fa-caret-up text-success"></i></div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <div class="col-sm-6 mt-sm-0 mt-4">
                      <div class="text-title mb-2">August</div>
                      <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="../node_modules/flag-icon-css/flags/4x3/id.svg" alt="image" width="40">
                          <div class="media-body ml-3">
                            <div class="media-title">Indonesia</div>
                            <div class="text-small text-muted">3,486 <i class="fas fa-caret-up text-success"></i></div>
                          </div>
                        </li>
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="../node_modules/flag-icon-css/flags/4x3/ps.svg" alt="image" width="40">
                          <div class="media-body ml-3">
                            <div class="media-title">Palestine</div>
                            <div class="text-small text-muted">3,182 <i class="fas fa-caret-up text-success"></i></div>
                          </div>
                        </li>
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="../node_modules/flag-icon-css/flags/4x3/de.svg" alt="image" width="40">
                          <div class="media-body ml-3">
                            <div class="media-title">Germany</div>
                            <div class="text-small text-muted">2,317 <i class="fas fa-caret-down text-danger"></i></div>
                          </div>
                        </li>
                      </ul>
                    </div>
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
                    <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>Invoice ID</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Action</th>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87239</a></td>
                        <td class="font-weight-600">Kusnadi</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td>July 19, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-48574</a></td>
                        <td class="font-weight-600">Hasan Basri</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>July 21, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-76824</a></td>
                        <td class="font-weight-600">Muhamad Nuruzzaki</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td>July 22, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-84990</a></td>
                        <td class="font-weight-600">Agung Ardiansyah</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td>July 22, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87320</a></td>
                        <td class="font-weight-600">Ardian Rahardiansyah</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>July 28, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
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
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
        <script>
            $(document).ready(function() {
                // page is now ready, initialize the calendar...
                $('#calendar').fullCalendar();
            });

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
            }
        </script>
    @endpush
      
