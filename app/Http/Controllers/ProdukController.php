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
            $promo = Promo::where('product_id', '!=', null)->where('tipe_diskon', 'presentase')->paginate(20);
            $pr = Product::paginate(1);
        } else {
            $promo = Promo::where('product_id', '!=', null)->where('tipe_diskon', 'presentase')->paginate(20);
            $pr = Product::where('product_category_id', $categories)->paginate(1);
        }
        return view('landing.product_list', compact('pr', 'promo'));
    }

    public function detailProduk($slug)
    {
        $pr = Product::where('slug', $slug)->first();
        return view('landing.product_detail', compact('pr'));
    }
}
