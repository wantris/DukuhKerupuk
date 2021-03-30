<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{route('portal.mitra')}}"><img src="{{url("ogani/img/logo2.png")}}" style="width:80px; height:26px" alt=""></a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
          <li class=" {{ Request::routeIs('portal.mitra') ? 'active' : '' }}"><a class="nav-link" href="{{route('portal.mitra')}}"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cookie-bite"></i> <span>Produk</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link {{ Request::routeIs('portal.mitra.product.list') ? 'text-primary' : '' }}"  href="{{route('portal.mitra.product.list')}}">Produk Saya </a></li>
              <li><a class="nav-link {{ Request::routeIs('portal.mitra.product.add') ? 'text-primary' : '' }}" href="{{route('portal.mitra.product.add')}}">Tambah Produk</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tags"></i> <span>Promosi Saya</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link {{ Request::routeIs('portal.mitra.promo.list') ? 'text-primary' : '' }}" href="{{route('portal.mitra.promo.list', 'promo-toko')}}">Daftar Promosi</a></li>
              <li><a class="nav-link" href="layout-transparent.html">Tambah Promosi</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-clipboard"></i> <span>Pesanan</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('portal.mitra.trans.list','all')}}">Pesanan Saya</a></li>
              <li><a class="nav-link" href="{{route('portal.mitra.trans.cod','all')}}">Pesanan COD</a></li>
              <li><a class="nav-link" href="layout-transparent.html">Pembatalan</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-truck"></i> <span>Pengiriman</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="layout-default.html">Pengiriman Saya</a></li>
              <li><a class="nav-link" href="layout-transparent.html">Pengaturan Pengiriman</a></li>
            </ul>
          </li>
        </ul>
    </aside>
  </div>