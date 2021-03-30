<?php

namespace App\Http\Controllers;

use App\Product;
use App\Promo;
use App\ProductImage;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    public function listProduk($categories)
    {
        if ($categories === 'all') {
            $promo = Promo::where('product_id', '!=', null)->where('tipe_diskon', 'presentase')->get();
            $pr = Product::paginate(20);
        } else {
            $promo = Promo::where('product_id', '!=', null)->where('tipe_diskon', 'presentase')->get();
            $pr = Product::where('product_category_id', $categories)->paginate(20);
        }
        return view('landing.product_list', compact('pr', 'promo'));
    }

    public function detailProduk($slug)
    {
        $pr = Product::where('slug', $slug)->first();
        return view('landing.product_detail', compact('pr'));
    }

    public function sortBy(int $value)
    {

        if ($value === 0) {
            $pr = Product::paginate(20);
        } elseif ($value === 1) {
            $pr = Product::orderBy('created_at', 'DESC')->paginate(20);
        } elseif ($value === 2) {
            $pr = Product::orderBy('harga', 'DESC')->paginate(20);
        } elseif ($value === 3) {
            $pr = Product::orderBy('harga', 'ASC')->paginate(20);
        } elseif ($value === 4) {
            $pr = Product::orderBy('harga', 'DESC')->paginate(20);
        } elseif ($value === 5) {
            $pr = Product::orderBy('penjualan', 'DESC')->paginate(20);
        }

        if ($pr->count() > 0) {
            foreach ($pr as $pr) {
                echo "<div class=\"col-lg-4 col-md-6 col-sm-6\">";
                echo "<div class=\"product__item\">";
                $img = ProductImage::where('product_id', $pr->id_produk)->where('rule', 1)->first();
                $url = url("/mitra/product_image/" . $img->image);
                echo '<div class="product__item__pic set-bg" data-setbg="' . $url . '" style="background-image:url(' . $url . ')">';
                echo '<ul class="product__item__pic__hover">';
                echo '<li><a href="#"><i class="fa fa-heart"></i></a></li>';
                echo '<li><a href="#"><i class="fa fa-retweet"></i></a></li>';
                echo '<li><a href="#" onclick="addKeranjang("' . $pr . '")"><i class="fa fa-shopping-cart"></i></a></li>';
                echo '</ul>';
                echo '</div>';
                echo '<div class="product__item__text">';
                echo '<h6><a href=" ' . route('detail.produk', $pr->slug) . '">' . $pr->nama_produk . '</a></h6>';
                echo '</div>';
                echo '<h5>Rp ' . number_format($pr->harga, '0', '.', '.') . '</h5>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    }

    public function search(Request $request)
    {
        // dd($request->all());
        $keyword = $request->keyword;
        $min = (int)str_replace("Rp.", "", $request->min);
        $max = (int)str_replace("Rp.", "", $request->max);
        $mitra = $request->mitra;
        $category = $request->category;

        $pr = Product::when($keyword, function ($q) use ($keyword) {
            return $q->where('nama_produk', 'like', '%' . $keyword . '%');
        })
            ->when($mitra, function ($q) use ($mitra) {
                if ($mitra != "null") {
                    return $q->where('id_mitra', $mitra);
                }
            })
            // ->when($min, function ($q) use ($min, $max) {
            //     return $q->whereBetween('harga', [$min, $max]);
            // })
            ->when($category, function ($q) use ($category) {
                if ($category != "null") {
                    return $q->where('product_category_id', $category);
                }
            })
            ->paginate(15);

        $promo = Promo::where('product_id', '!=', null)->where('tipe_diskon', 'presentase')->get();
        return view('landing.product_list', compact('pr', 'promo'));
    }
}
