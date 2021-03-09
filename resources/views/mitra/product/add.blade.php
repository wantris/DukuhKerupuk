@extends('mitra.layouts.master')

@section('title', 'Mitra | Daftar Produk')


    @section('content')
        <div class="section-header">
            <h1>Tambah Produk</h1>
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
                            <p class="h3 font-weight-bold">Tambah Produk Baru</p>
                            <p class="">Pilih kategori yang tepat untuk produkmu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{route('portal.mitra.product.save')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-stats-title mt-3">
                                <p class="h5 font-weight-bold">Informasi Produk</p>
                            </div>
                            <hr class="mb-2">
                            <div class="form-group row mt-5">
                                <p class="mt-1 col-sm-2 col-form-label">Nama Produk : </p>
                                <div class="col-lg-9 col-12">
                                    <input type="text" name="product_name" class="@error('product_name') is-invalid @enderror form-control" id="inputEmail3" placeholder="Nama Produk">
                                    @error('product_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="mt-1 col-sm-2 col-form-label">Kategori Produk : </p>
                                <div class="col-lg-9 col-12">
                                    @php
                                        $pc = App\ProductCategories::all();
                                    @endphp
                                    <select name="product_category" class=" @error('product_category') is-invalid @enderror ml-4" id="category_select">
                                        <option selected>Pilih Kategori Produk</option>
                                        @foreach ($pc as $pc)
                                            <option value="{{$pc->id}}">{{$pc->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('product_category')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="mt-1 col-sm-2 col-form-label">Deskripsi Produk : </p>
                                <div class="col-lg-9 col-12">
                                    <textarea class="form-control @error('product_description') is-invalid @enderror" name="product_description" style="min-height: 150px">Deskripsi Produk</textarea>
                                    @error('product_description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="mt-1 col-sm-2 col-form-label">Kadaluwarsa Produk : </p>
                                <div class="col-lg-9 col-12">
                                    @php
                                        $pe = App\ProductExpired::all();
                                    @endphp
                                    <select name="product_expired" class="ml-4 @error('product_expired') is-invalid @enderror" id="kadaluwarsa_select">
                                        <option selected>Pilih Kadaluwarsa Produk</option>
                                        @foreach ($pe as $pe)
                                            <option value="{{$pe->id}}">{{$pe->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('product_expired')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-stats-title mt-3">
                                <p class="h5 font-weight-bold">Informasi Penjualan</p>
                            </div>
                            <hr class="mb-2">
                            <div class="form-group row mt-5">
                                <p class="mt-1 col-sm-2 col-form-label">Harga Produk : </p>
                                <div class="col-lg-9 col-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Rp
                                        </div>
                                        </div>
                                        <input type="number" name="product_price" class="form-control phone-number @error('product_price') is-invalid @enderror">
                                    </div>
                                    @error('product_price')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="mt-1 col-sm-2 col-form-label">Stok Produk : </p>
                                <div class="col-lg-9 col-12">
                                    <input type="number" name="product_stock" class="form-control phone-number @error('product_stock') is-invalid @enderror" placeholder="0">
                                    @error('product_stock')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-stats-title mt-3">
                                <p class="h5 font-weight-bold">Media Produk</p>
                            </div>
                            <hr class="mb-2">
                            <div class="form-group row mt-5">
                                <p class="mt-1 col-sm-2 col-form-label">Foto Produk : </p>
                                <div class="col-lg-2 col-6">
                                    <a href="#" id="link_file1" onclick="uploadImage(1)">
                                        <div class="text-center product-photo" >
                                            <i class="fas fa-plus-circle text-primary"></i>
                                        </div>
                                    </a>
                                    <div class="text-center text-photo">
                                        <p class="text-secondary">*Foto Utama</p>
                                    </div>
                                    <input type="file" id="file1" name="product_image[]" onchange="previewImage(1);" name="file1" class="d-none" />
                                </div>
                                <div class="col-lg-2 col-6">
                                    <a href="#" onclick="uploadImage(2)">
                                        <div class="text-center product-photo" >
                                            <i class="fas fa-plus-circle text-primary"></i>
                                        </div>
                                    </a>
                                    <div class="text-center text-photo">
                                        <p class="text-secondary">Foto 1</p>
                                    </div>
                                    <input type="file" id="file2" name="product_image[]" onchange="previewImage(2);" name="file1" class="d-none" />
                                </div>
                                <div class="col-lg-2 col-6">
                                    <a href="#" onclick="uploadImage(3)">
                                        <div class="text-center product-photo" >
                                            <i class="fas fa-plus-circle text-primary"></i>
                                        </div>
                                    </a>
                                    <div class="text-center text-photo">
                                        <p class="text-secondary">Foto 2</p>
                                    </div>
                                    <input type="file" id="file3" name="product_image[]" onchange="previewImage(3);" name="file1" class="d-none" />
                                </div>
                                <div class="col-lg-2 col-6">
                                    <a href="#" onclick="uploadImage(4)">
                                        <div class="text-center product-photo" >
                                            <i class="fas fa-plus-circle text-primary"></i>
                                        </div>
                                    </a>
                                    <div class="text-center text-photo">
                                        <p class="text-secondary">Foto 3</p>
                                    </div>
                                    <input type="file" id="file4" name="product_image[]" onchange="previewImage(4);" name="file1" class="d-none" />
                                </div>
                                {{-- <div class="col-12">
                                    <img id="previewImg" src="/examples/images/transparent.png" alt="Placeholder">
                                </div> --}}
                            </div>
                            <div class="form-group row " style="margin-top: -8%">
                                <p class="mt-1 col-sm-2 col-form-label"></p>
                                <div class="col-lg-2 col-6">
                                        <div class="text-center product-photo" id="image_div_1">
                                        </div>
                                    <div class="text-center text-photo">
                                        <p class="text-secondary">*Foto Utama</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-6">
                                    <div class="text-center product-photo" id="image_div_2">
                                        
                                    </div>
                                    <div class="text-center text-photo">
                                        <p class="text-secondary">Foto 1</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-6">
                                    <div class="text-center product-photo" id="image_div_3">
                                            
                                    </div>
                                    <div class="text-center text-photo">
                                        <p class="text-secondary">Foto 2</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-6">
                                    <div class="text-center product-photo" id="image_div_4">
                                            
                                    </div>
                                    <div class="text-center text-photo">
                                        <p class="text-secondary">Foto 3</p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-12">
                                    <div id="drag-drop-area"></div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    <a type="submit" class="btn btn-light mr-3">Batalkan</a>
                    <a type="submit" class="btn btn-light mr-3">Arsipkan</a>
                    <input type="submit" value="Simpan & Tampilkan" class="btn btn-primary mr-3">
                </div>
            </div>
    </form>
        
    @endsection

    @push('scripts')
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
        <script>
            
            $(document).ready(function() {
                $('#category_select, #kadaluwarsa_select').select2();
            });
            function uploadImage(value){
                event.preventDefault();
                $("#file"+value).trigger('click');
                return false;
            }

            function previewImage(value) {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("file"+value).files[0]);
            
                oFReader.onload = function(oFREvent) {
                    var html = `
                        <span class="pip">
                            <img src="" alt="" class="image-product-upload" id="image_product_${value}"><br/>
                            <a href="#" id="remove_image_${value}" onclick="removeImage(${value})">Remove image</a>
                        </span>
                    `;
                    document.getElementById("image_div_"+value).innerHTML = html;
                    document.getElementById("image_product_"+value).style.display = "block";
                    document.getElementById("image_product_"+value).src = oFREvent.target.result;
                };
            };

            function removeImage(value){
                event.preventDefault();
                $('#remove_image_'+value).parent(".pip").remove();
            }

            // var uppy = Uppy.Core()
            //     .use(Uppy.Dashboard, {
            //     inline: true,
            //     target: '#drag-drop-area'
            //     })
            //     .use(Uppy.Tus, {endpoint: 'https://master.tusasdads/'}) //you can put upload URL here, where you want to upload images
        
            // uppy.on('complete', (result) => {
            //     console.log('Upload complete! We’ve uploaded these files:', result.successful)
            // });
        </script>
    @endpush
      
