
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    @include('layouts.header')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none !important;
        margin: 0 !important;
        }
    
        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield !important;
        }
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
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{url("ogani/img/breadcrumb.jpg")}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Keranjang</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table" >
                        <table style="width: 100%;" class="table-responsive">
                            <thead>
                                <tr>
                                    <th style="width: 7% !important;"><label class="custom-control fill-checkbox">
                                        <input type="checkbox" class="fill-control-input" id="checkAll">
                                        <span class="fill-control-indicator"></span></th>
                                    <th class="shoping__product">Produk</th>
                                    <th style="width: 20% !important;">Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                    <tr id="div_{{$item->id_keranjang}}" class="penjualan">
                                        <td style="width: 7%  !important;"><label class="custom-control fill-checkbox">
                                            <input type="checkbox" class="fill-control-input" id="checkbox_{{$item->id_keranjang}}" data-subtotal="{{$item->subtotal}}" data-produk="{{$item->id_produk}}" data-id="{{$item->id_keranjang}}">
                                            <span class="fill-control-indicator"></span></td>
                                        <td class="shoping__cart__item">
                                            @php
                                                $img = App\ProductImage::where('product_id', $item->id_produk)->where('rule', 1)->first();
                                            @endphp
                                            <img src="{{url("/mitra/product_image/".$img->image)}}" style="width: 100px; height:100px" alt="">
                                            <h5>{{$item->productRef->nama_produk}}</h5>
                                        </td>
                                        <td class="shoping__cart__price text-center">
                                            @php
                                                $pr = App\Promo::where('product_id', $item->id_produk)->orderBy('created_at','desc')->first();
                                                if($pr){
                                                    if($pr->tipe_diskon === 'langsung'){
                                                        $diskon = (int)$item->productRef->harga - (int)$pr->jumlah_diskon;
                                                    }else{
                                                        $diskon = (int)$item->productRef->harga - ((int)$item->productRef->harga * (int)$pr->jumlah_diskon);
                                                    }
                                                }
                                            @endphp
                                            @if ($pr)
                                                <div class="d-flex">
                                                    <span style="text-decoration:line-through" class="mr-4">Rp {{number_format($diskon,'0','.','.')}}</span>
                                                    <span>Rp {{number_format($item->productRef->harga,'0','.','.')}}</span>
                                                </div>
                                            @else
                                                Rp {{number_format($item->productRef->harga,'0','.','.')}}
                                            @endif
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity" data-id="{{$item->id_keranjang}}">
                                                <input type="hidden" class="harga_inp" id="inp_harga_{{$item->id_keranjang}}" value="@if($pr) {{$diskon}} @else {{$item->productRef->harga}} @endif ">
                                                <input type="hidden" class="subtotal_inp" data-id="{{$item->id_keranjang}}" id="inp_subtotal_{{$item->id_keranjang}}" value="{{$item->subtotal}}">
                                                <input type="hidden" id="">
                                                <div class="pro-qty">
                                                    <input type="number" class="qty" id="qty_{{$item->id_keranjang}}" value="{{$item->qty}}">
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            Rp <span id="subtotal_item_text_{{$item->id_keranjang}}">{{number_format($item->subtotal,'0','.','.')}}</span>
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a href="#" onclick="deleteCart('{{$item->id_keranjang}}')"><span class="icon_close"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn mr-3">Lanjutkan Belanja</a>
                        <a href="#" class="primary-btn cart-btn bg-danger text-white" onclick="deleteAll()">Hapus</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Kode Diskon</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code" id="inp_diskon">
                                <button type="button" onclick="addDiskon()"  class="site-btn">Ambil Diskon</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Total Keranjang</h5>
                        <ul>
                            <li>Subtotal <span id="subtotal_text">0</span><span>  Rp  </span></li>
                            <input type="hidden" id="diskon_inp">
                            <input type="hidden" name="id_diskon" id="id_diskon">
                            <li>Diskon <span id="diskon_text">0</span><span>  Rp  </span></li>
                            <li>Total <span id="total_text">0</span><span>  Rp  </span></li>
                        </ul>
                        <a href="#" onclick="checkout()" class="primary-btn">Proses Ke Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
    @include('layouts.footer_sec')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('layouts.js_lib')

    @include('layouts.cart_sec')


    <script>

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        function checkout(){
            event.preventDefault();
            var id = [];
            var product_id = [];
            var qty = [];
            var harga = [];
            var diskon = $('#diskon_inp').val();
            var url = "{{route('checkout.post')}}";
            var id_promo = $('#id_diskon').val();

            $(".fill-control-input:checked").each(function() {
                var id_keranjang = $(this).data('id');
                var harga_tmp = parseFloat($('#inp_harga_'+id_keranjang).val()) || 0;
                var qty_tmp = parseFloat($('#qty_'+id_keranjang).val()) || 0;
                var id_produk = $(this).data('produk');

                id.push(id_keranjang);
                harga.push(harga_tmp);
                qty.push(qty_tmp);
                product_id.push(id_produk);
            });

            if(id.length === 0){
                Swal.fire({
                    title: "Anda belum memilih produk",
                    type: "error",
                    icon: "error",
                    confirmButtonClass: "btn btn-outline-info",
                })
            } else{
                console.log(id_promo);
                $.ajax({
                url: url, //harus sesuai url di buat di route
                type: "POST",
                data: {
                    harga: harga,
                    id:id,
                    qty:qty,
                    product_id:product_id,
                    diskon : diskon,
                    id_diskon:id_promo
                },
                cache: false,
                    success: function (dataResult) {
                        console.log(dataResult);
                        var dataResult = JSON.parse(dataResult);
                        if(dataResult.statusCode==200){
                            console.log(dataResult.token);
                            Swal.fire({
                                title: "Berhasil",
                                text: "Produk telah di checkout",
                                icon: "success",
                            })
                            .then(function (value) {
                                    if (value) {
                                        window.location.href = "/checkout/"+ dataResult.token;
                                    }
                            });
                        }
                        else if(dataResult.statusCode==201){
                            alert("Error occured !");
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });    
            }
        }

        function deleteCart(id){
            event.preventDefault();
            Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda akan menghapus produk dari keranjang !",
                    showCancelButton: true,
                    confirmButtonColor: '#7fad39',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
            })
            .then(function (success) {
                    if (success.value) {
                        var url = '{{ url("konsumen/cart/delete/") }}/'+id;
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
            }

            function deleteAll(){
                var allVals = [];  

                $(".fill-control-input:checked").each(function() {  
                    allVals.push($(this).attr('data-id'));
                    var json = JSON.stringify(allVals);

                    event.preventDefault();
                    Swal.fire({
                        title: 'Apakah Anda Yakin?',
                        text: "Anda akan menghapus produk dari keranjang !",
                        showCancelButton: true,
                        confirmButtonColor: '#7fad39',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus!'
                     })
                     .then(function (success) {
                        if (success.value) {
                            var url = '{{ route("cart.delete.multiple") }}';
                            var join_selected_values = allVals.join(","); 
                            console.log(url);
                            $.ajax({
                                url: url,
                                type: "POST",
                                data:'ids='+join_selected_values,
                                success: function (data) {
                                    // var data = JSON.parse(data);
                                    if (data.status == 1) {
                                        console.log(data.message);
                                        Swal.fire({
                                            title: "Success!",
                                            type: "success",
                                            text: "Produk telah di hapus \n Click OK",
                                            icon: "success",
                                            confirmButtonClass: "btn btn-outline-info",
                                        })
                                        .then(function(){
                                            $.each(allVals, function( index, value ) {
                                                $('#div_'+value).remove();
                                            });
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
                });  
            }
    </script>


</body>

</html>