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
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-statistic-2">
                    <div class="card-stats mb-4">
                        <div class="topnav mx-4">
                            <a class="tablinks {{ Request::routeIs('portal.mitra.product.list') ? 'active' : '' }}" href="{{route('portal.mitra.product.list')}}">Semua</a>
                            <a href="{{route('portal.mitra.product.list.habis')}}" class="tablinks {{ Request::routeIs('portal.mitra.product.list.habis') ? 'active' : '' }}"  >Habis</a>
                            <a href="{{route('portal.mitra.product.list.arsip')}}" class="tablinks {{ Request::routeIs('portal.mitra.product.list.arsip') ? 'active' : '' }}" >Arsip</a>
                        </div>
                    </div>
                    <div class="row tabcontent" id="kalender">
                        <div class="col-lg-12">
                            <div class="row ml-4 mr-4">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Produk</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="inputEmail3" placeholder="Input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Stok</label>
                                        <div class="col-sm-3">
                                          <input type="text" class="form-control" id="inputEmail3" placeholder="Input">
                                        </div>
                                        <label for="inputEmail3" class="col-form-label">-</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Input">
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-8">
                                          <select name="" id="category_select">
                                              <option selected>Pilih Kategori</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Penjualan</label>
                                        <div class="col-sm-3">
                                          <input type="number" class="form-control" id="inputEmail3" placeholder="Input">
                                        </div>
                                        <label for="inputEmail3" class="col-form-label">-</label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control" id="inputEmail3" placeholder="Input">
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
                                    <p class="h5 mr-3 mt-1">0 Produk</p>
                                    <div class="btn btn-primary" style="border-radius: 20px; padding:5px 20px">
                                        0/100
                                    </div>
                                </div>
                                <div class="col-lg-8 col-12 text-right">
                                    <button type="submit" class="btn btn-primary mr-3"><i class="fas fa-plus mr-2"></i>Tambah Produk</button>
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
                                                <th onclick="sortTable(0)">Nama Produk</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Penjualan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              @foreach ($pr as $item)
                                              <tr id="tr_{{$item->id_produk}}">
                                                    <td><div class="custom-checkbox custom-control">
                                                        <input type="checkbox"  class="custom-control-input" id="checkbox-all">
                                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                    </div></td>
                                                    <td>{{$item->nama_produk}}</td>
                                                    <td>
                                                        {{$item->categories->name}}
                                                    </td>
                                                    <td>Rp.{{$item->harga}}</td>
                                                    <td>{{$item->stok}}</td>
                                                    <td>{{$item->penjualan}}</td>
                                                    <td><div id="ket_status_{{$item->id_Produk}}">
                                                        {{$item->status}}
                                                        </div></td>
                                                    <td><div class="d-flex">
                                                            <a href="{{route('portal.mitra.product.edit', $item->slug)}}" class="btn btn-primary mr-2" title="Edit Produk"><i class="fas fa-edit"></i></a>
                                                            <a href="#" onclick="confirmDelete('{{$item->id_produk}}')" class="btn btn-danger mr-2" title="Hapus Produk"><i class="fas fa-trash"></i></a>
                                                            <div id="status_{{$item->id_produk}}">
                                                                @if($item->status === "publik")
                                                                    <a href="#" onclick="changeStatus('{{$item->id_produk}}', 'arsip')" class="btn btn-info" title="Pindah ke Arsip"><i class="fas fa-folder-open"></i></a>
                                                                @else
                                                                    <a href="#" onclick="changeStatus('{{$item->id_produk}}', 'publik')" class="btn btn-info" title="Pindah ke Publik"><i class="fas fa-eye"></i></a>
                                                                @endif
                                                            </div>
                                                            
                                                        </div>
                                                    </td>
                                              </tr>
                                              @endforeach
                                          </tbody>
                                        </table>
                                        @if ($pr->count() === 0)
                                        <div class="col-lg-12 text-center mt-5 mb-4" >
                                            <img src="{{url('icon/shopping-bag.svg')}}" style="max-width: 120px; height:auto" alt="">
                                            <p class="text-secondary">Tidak ada produk</p>
                                        </div>
                                        @endif
                                        {{-- <div class="text-right mt-3 mr-3">
                                            <nav class="d-inline-block">
                                                <ul class="pagination mb-0">
                                                  <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                                  </li>
                                                  <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                                  <li class="page-item">
                                                    <a class="page-link" href="#">2</a>
                                                  </li>
                                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                  <li class="page-item">
                                                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                                  </li>
                                                </ul>
                                              </nav>
                                        </div> --}}
                                      </div>
                                    </div>
                              </div>
                        </div>
                    </div>
                    {{-- <div class="row tabcontent" id="produk" style="display: none;">
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
                    </div> --}}
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
                confirmButtonText: 'Yes, hapus produk!'
            })
            .then(function (success) {
                if (success.value) {
                    var url = '{{ url("mitra/portal/produk/delete/") }}/'+id;
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
            console.log(id, status);
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Produk akan di "+status+" !",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, '+status+'kan!'
            })
            .then(function (success) {
                if (success.value) {
                    var url = '{{ url("mitra/portal/produk/change-status") }}';
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
                                    text: "Produk telah di "+status+"kan \n Click OK",
                                    icon: "success",
                                    confirmButtonClass: "btn btn-outline-info",
                                });

                                location.replace("{{ route('portal.mitra.product.list.arsip') }}");
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
      
