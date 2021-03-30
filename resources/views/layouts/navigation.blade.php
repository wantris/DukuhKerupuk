 <!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{url("ogani/img/logo2.png")}}" style="width:120px; height:66px" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="{{route('cart.index')}}"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
        </div>
        <div class="humberger__menu__widget">
            {{-- <div class="header__top__right__auth mr-2">
                <a href="#"><i class="fa fa-user"></i> Mitra</a>
            </div>
            <div class="header__top__right__auth mr-2">
                <a href="#"><i class="fa fa-user"></i>Konsumen</a>
            </div> --}}
            <div class="header__top__right__language">
                @if (Auth::guard('users')->check())
                    <div>Akun</div>
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <li><a href="{{route('profile.konsumen')}}">Profil</a></li>
                        <li><a href="{{url('konsumen/logout')}}">Logout</a></li>
                    </ul>
                @else 
                    <div>Login</div>
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <li><a href="{{route('login.mitra')}}">Mitra</a></li>
                        <li><a href="{{route('login.konsumen')}}">Konsumen</a></li>
                    </ul>
                 @endif
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="{{ Request::routeIs('index') ? 'active' : '' }}"><a href="{{route('index')}}">Utama</a></li>
                <li class="{{ Request::routeIs('produk') ? 'active' : '' }}"><a href="{{route('produk','all')}}">Produk</a></li>
                <li class="{{ Request::routeIs('mitra') ? 'active' : '' }}"><a href="{{route('mitra.page')}}">Mitra</a></li>
                <li class="{{ Request::routeIs('konsumen.page') ? 'active' : '' }}"><a href="{{route('konsumen.page')}}">Konsumen</a></li>
                <li class="{{ Request::routeIs('contact') ? 'active' : '' }}"><a  href="{{route('contact')}}">Kontak</a></li>
                {{-- <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li> --}}
                {{-- <li><a href="./blog.html">Blog</a></li> --}}
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>dukuhkerupuk@gmail.com</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> dukuhkerupuk@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            {{-- <div class="header__top__right__auth mr-3">
                                <a href="#"><i class="fa fa-user"></i>Mitra</a>
                            </div>
                            <div class="header__top__right__auth mr-3">
                                <a href="#"><i class="fa fa-user"></i>Konsumen</a>
                            </div> --}}
                            <div class="header__top__right__language">
                                @if (Auth::guard('users')->check())
                                    <div>Akun</div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="{{route('profile.konsumen')}}">Profil</a></li>
                                        <li><a href="{{url('konsumen/logout')}}">Logout</a></li>
                                    </ul>
                                @else 
                                    <div>Login</div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="{{route('login.mitra')}}">Mitra</a></li>
                                        <li><a href="{{route('login.konsumen')}}">Konsumen</a></li>
                                    </ul>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{url('/')}}"><img src="{{url("ogani/img/logo2.png")}}" style="width:120px; height:66px" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="{{ Request::routeIs('index') ? 'active' : '' }}"><a href="{{route('index')}}">Utama</a></li>
                            <li class="{{ Request::routeIs('produk') ? 'active' : '' }}"><a href="{{route('produk','all')}}">Produk</a></li>
                            <li class="{{ Request::routeIs('mitra.page') ? 'active' : '' }}"><a href="{{route('mitra.page')}}">Mitra</a></li>
                            <li class="{{ Request::routeIs('konsumen.page') ? 'active' : '' }}"><a href="{{route('konsumen.page')}}">Konsumen</a></li>
                            <li class="{{ Request::routeIs('contact') ? 'active' : '' }}"><a  href="{{route('contact')}}">Kontak</a></li>
                            {{-- <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li> --}}
                            {{-- <li><a href="./blog.html">Blog</a></li> --}}
                            {{-- <li><a href="./contact.html">Kontak</a></li> --}}
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            @php
                                $countCart = App\Keranjang::where('id_user',Auth::guard('users')->id())->get();
                            @endphp
                            <li><a href="{{route('cart.index')}}"><i class="fa fa-shopping-bag"></i> <span>{{$countCart->count()}}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->