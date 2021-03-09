<?php

namespace App\Http\Controllers\Mitra;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage as Photo;
use Throwable;

class ProductController extends Controller
{
    //
    public function index()
    {
        return view('mitra.product.index');
    }
    public function habis()
    {
        return view('mitra.product.habis');
    }
    public function arsip()
    {
        return view('mitra.product.arsip');
    }
    public function add()
    {
        return view('mitra.product.add');
    }

    public function save(Request $request)
    {
        // dd(Auth::guard('mitra')->id());
        // dd($request->all());
        $request->validate([
            'product_name' => 'required|max:100',
            'product_category' => 'required',
            'product_description' => 'min:10',
            'product_expired' => 'required',
            'product_price' => 'required',
            'product_stock' => 'required'
            // 'product_image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        try {
            $pd = new Product();
            $pd->nama_produk = $request->product_name;
            $pd->product_category_id = $request->product_category;
            $pd->deskripsi_produk = $request->product_description;
            $pd->product_expired_id = $request->product_expired;
            $pd->harga = $request->product_price;
            $pd->stok = $request->product_stock;
            $pd->id_mitra = Auth::guard('mitra')->id();
            $pd->save();

            if ($files = $request->file('product_image')) {
                // Define upload path
                $destinationPath = public_path('/mitra/product_image/'); // upload path
                foreach ($files as $img) {
                    // Upload Orginal Image           
                    $product_image = $img->getClientOriginalName();
                    $img->move($destinationPath, $product_image);
                    // Save In Database
                    $imagemodel = new Photo();
                    $imagemodel->product_id = $pd->id_produk;
                    $imagemodel->mitra_id = Auth::guard('mitra')->id();
                    $imagemodel->image = (string)$product_image;
                    $imagemodel->save();
                }
            }

            return "berhasil";
        } catch (Throwable $e) {
            return $e;
        }
    }
}
