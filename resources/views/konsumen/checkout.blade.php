
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="favicon.png" rel="icon">
    <meta name="author" content="Nghia Minh Luong">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title>Checkout Produk | Jual Beli Kerupuk Online</title>
    @include('layouts.head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  </head>
  <!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->
  <body >
    
     {{-- Call Navbar & Sidebar --}}
     <div class="container-fluid" style="background: rgb(42,190,96);
            background: linear-gradient(54deg, rgba(42,190,96,1) 20%, rgba(65,223,136,1) 79%, rgba(52,226,159,1) 95%);">
            @include('layouts.navbar_sidebar')
        </div>

    <div class="header-services">
      <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Sky Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Sky Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Sky Store</p>
      </div>
    </div>
    <main class="ps-main">
      <div class="ps-checkout pt-80 pb-80">
        <div class="ps-container">
          <form class="ps-checkout__form" action="do_action" method="post">
            <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <div class="ps-checkout__billing">
                      <h3>Checkout Pembelian</h3>
                            <div class="form-group d-flex">
                                <div class="ps-checkbox mr-5">
                                    <input class="form-control" name="type" value="hiyaa"  type="checkbox" id="cb01">
                                    <label for="cb01" class="type-checkout">Langsung Bayar</label>
                                </div>
                                <div class="ps-checkbox">
                                    <input class="form-control" name="type" type="checkbox" id="cb02">
                                    <label for="cb02" class="type-checkout">Bayar Di Tempat</label>
                                </div>
                            </div>
                            <div class="form-group form-group--inline">
                              <label>Nama<span>*</span>
                              </label>
                              <input class="form-control" type="text">
                            </div>
                            <div class="form-group form-group--inline">
                              <label>Provinsi<span>*</span>
                              </label>
                              <select name="" id="province-select" class="form-control">
                                  <option value="">Pilih Provinsi</option>
                                  @foreach ($province as $province)
                                    <option value="{{$province->province_id}}">{{$province->name}}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="form-group form-group--inline">
                              <label>Kota<span>*</span>
                              </label>
                              <select name="city_destination" id="city-select" class="form-control">
                                <option value="">Pilih Kota</option>
                            </select>
                            </div>
                            <div class="form-group form-group--inline">
                              <label>Kecamatan<span>*</span>
                              </label>
                              <input class="form-control" type="email">
                            </div>
                            <div class="form-group form-group--inline">
                              <label>Kode Pos<span>*</span>
                              </label>
                              <input class="form-control" type="text">
                            </div>
                            <div class="form-group form-group--inline">
                              <label>Phone<span>*</span>
                              </label>
                              <input class="form-control" type="text">
                            </div>
                            <div class="form-group form-group--inline">
                              <label>Address<span>*</span>
                              </label>
                              <input class="form-control" type="text">
                            </div>
                      <div class="form-group">
                        <div class="ps-checkbox">
                          <input class="form-control" type="checkbox" id="cb01">
                          <label for="cb01">Create an account?</label>
                        </div>
                      </div>
                      <h3 class="mt-40"> Addition information</h3>
                      <div class="form-group form-group--inline textarea">
                        <label>Order Notes</label>
                        <textarea class="form-control" rows="5" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
                    <div class="ps-checkout__order">
                      <header>
                        <h3>Your Order</h3>
                      </header>
                      <div class="content">
                        <table class="table ps-checkout__products">
                          <thead>
                            <tr>
                              <th class="text-uppercase">Product</th>
                              <th class="text-uppercase">Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>HABITANT x1</td>
                              <td>$300.00</td>
                            </tr>
                            <tr>
                              <td>Card Subtitle</td>
                              <td>$300.00</td>
                            </tr>
                            <tr>
                              <td>Order Total</td>
                              <td>$300.00</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <footer>
                        <h3>Payment Method</h3>
                        <div class="form-group cheque">
                          <div class="ps-radio">
                            <input class="form-control" type="radio" id="rdo01" name="payment" checked>
                            <label for="rdo01">Cheque Payment</label>
                            <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                          </div>
                        </div>
                        <div class="form-group paypal">
                          <div class="ps-radio ps-radio--inline">
                            <input class="form-control" type="radio" name="payment" id="rdo02">
                            <label for="rdo02">Paypal</label>
                          </div>
                          <ul class="ps-payment-method">
                            <li><a href="#"><img src="images/payment/1.png" alt=""></a></li>
                            <li><a href="#"><img src="images/payment/2.png" alt=""></a></li>
                            <li><a href="#"><img src="images/payment/3.png" alt=""></a></li>
                          </ul>
                          <button class="ps-btn ps-btn--fullwidth">Place Order<i class="ps-icon-next"></i></button>
                        </div>
                      </footer>
                    </div>
                    <div class="ps-shipping">
                      <h3>FREE SHIPPING</h3>
                      <p>YOUR ORDER QUALIFIES FOR FREE SHIPPING.<br> <a href="#"> Singup </a> for free shipping on every order, every time.</p>
                    </div>
                  </div>
            </div>
          </form>
        </div>
      </div>
      <div class="ps-subscribe">
        <div class="ps-container">
          <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 ">
                  <h3><i class="fa fa-envelope"></i>Sign up to Newsletter</h3>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12 ">
                  <form class="ps-subscribe__form" action="do_action" method="post">
                    <input class="form-control" type="text" placeholder="">
                    <button>Sign up now</button>
                  </form>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 ">
                  <p>...and receive  <span>$20</span>  coupon for first shopping.</p>
                </div>
          </div>
        </div>
      </div>
    </main>

    {{-- footer --}}
        @include('layouts.footer')
    <!-- JS Library-->
        @include('layouts.js_library')

        <!-- Custom scripts-->
    <script type="text/javascript" src="{{url("user/js/main.js")}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      AOS.init({
        duration: 1200,
      });

    //   function payment() {
    //         var checkBoxPay = document.getElementById("cb01");
    //         var checkBoxCod  = document.getElementById("cb02");
    //         if (checkBoxPay.checked == true){
    //             checkBoxCod.disabled = true;
    //         } else {
    //             checkBoxCod.disabled = false;
    //         }
    //     }
      $(document).ready(function(){
        $('#province-select, #city-select').select2();

        $("#cb01").on('change', function(){
            
            if ($(this).is(':checked')) {
                $("#cb02").prop('disabled', true);
            }else{
                $("#cb02").prop('disabled', false);
            }
        });
        $("#cb02").on('change', function(){
            
            if ($(this).is(':checked')) {
                $("#cb01").prop('disabled', true);
            }else{
                $("#cb01").prop('disabled', false);
            }
        });

        $('#province-select').on('change', function(){
            let provindeId = $(this).val();
            if (provindeId) {
                jQuery.ajax({
                    url: 'checkout/cities/'+provindeId,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        $('select[name="city_destination"]').empty();
                        $('select[name="city_destination"]').append('<option value="">Pilih Kota</option>');
                        $.each(response, function (key, value) {
                            $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                    error:function(error){
                        console.log(error);
                    }
                });
            }
        })

      });
    </script>
  </body>
</html>