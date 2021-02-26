
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
    <title>Keranjang | Jual Beli Kerupuk Online</title>
    @include('layouts.head')
  </head>
  <!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->
  <body>

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
      <div class="ps-content pt-80 pb-80">
        <div class="ps-container">
          <div class="ps-cart-listing">
            <table class="table ps-cart__table">
              <thead>
                <tr>
                    <th style="width: 10px"><input type="checkbox" class="custom-control" id="customCheck1"></th>
                    <th>Semua Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="checkbox" class="custom-control" id="customCheck1"></td>
                  <td><a class="ps-product__preview" href="product-detail.html"><img class="mr-15" src="{{url('user/images/product/cart-preview/1.jpg')}}" alt="">Kerupuk Kulit Pak Mahmud</a></td>
                  <td>Rp.150.000</td>
                  <td>
                        <div class="quantity-cart d-flex">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus-btn"><i class="fa fa-minus" aria-hidden="true"></i></button>
                            <input class="quantity" min="0" name="quantity" value="1" type="number">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="minus-btn"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                  </td>
                  <td>Rp.150.000</td>
                  <td>
                    <div class="ps-remove"></div>
                  </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="custom-control" id="customCheck1"></td>
                    <td><a class="ps-product__preview" href="product-detail.html"><img class="mr-15" src="{{url('user/images/product/cart-preview/1.jpg')}}" alt="">Kerupuk Kulit Pak Mahmud</a></td>
                    <td>Rp.150.000</td>
                    <td>
                          <div class="quantity-cart d-flex">
                              <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                              class="minus-btn"><i class="fa fa-minus" aria-hidden="true"></i></button>
                              <input class="quantity" min="0" name="quantity" value="1" type="number">
                              <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                              class="minus-btn"><i class="fa fa-plus" aria-hidden="true"></i></button>
                          </div>
                    </td>
                    <td>Rp.150.000</td>
                    <td>
                      <div class="ps-remove"></div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="custom-control" id="customCheck1"></td>
                    <td><a class="ps-product__preview" href="product-detail.html"><img class="mr-15" src="{{url('user/images/product/cart-preview/1.jpg')}}" alt="">Kerupuk Kulit Pak Mahmud</a></td>
                    <td>Rp.150.000</td>
                    <td>
                          <div class="quantity-cart d-flex">
                              <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                              class="minus-btn"><i class="fa fa-minus" aria-hidden="true"></i></button>
                              <input class="quantity" min="0" name="quantity" value="1" type="number">
                              <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                              class="minus-btn"><i class="fa fa-plus" aria-hidden="true"></i></button>
                          </div>
                    </td>
                    <td>Rp.150.000</td>
                    <td>
                      <div class="ps-remove"></div>
                    </td>
                </tr>
              </tbody>
            </table>
            <div class="ps-cart__actions">
              <div class="ps-cart__promotion">
                <div class="form-group">
                  <div class="ps-form--icon"><i class="fa fa-angle-right"></i>
                    <input class="form-control" type="text" placeholder="Promo Code">
                  </div>
                </div>
                <div class="form-group">
                  <button class="ps-btn ps-btn--gray">Continue Shopping</button>
                </div>
              </div>
              <div class="ps-cart__total">
                <h3>Total Price: <span> 2599.00 $</span></h3><a class="ps-btn" href="checkout.html">Process to checkout<i class="ps-icon-next"></i></a>
              </div>
            </div>
          </div>
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
    <script>
      AOS.init({
        duration: 1200,
      })
    </script>

  </body>
</html>