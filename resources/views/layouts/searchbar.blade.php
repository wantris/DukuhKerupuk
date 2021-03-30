<div class="row">
    <div class="col-lg-3">
        <div class="hero__categories">
            <div class="hero__categories__all">
                <i class="fa fa-bars"></i>
                <span>Kategori</span>
            </div>
            @php
                $kategori = App\ProductCategories::all();
            @endphp
            <ul>
                @foreach ($kategori as $kategori)
                <li><a href="{{$kategori->id}}">{{$kategori->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="hero__search">
            <div class="hero__search__form">
                <form action="#">
                    <input type="text" placeholder="Cari Produk?">
                    <button type="submit" class="site-btn">CARI</button>
                </form>
            </div>
            <div class="hero__search__phone">
                <div class="hero__search__phone__icon">
                    <i class="fa fa-phone"></i>
                </div>
                <div class="hero__search__phone__text">
                    <h5>+6281295491852</h5>
                    <span>dukuhkerupuk.com</span>
                </div>
            </div>
        </div>
    </div>
</div>