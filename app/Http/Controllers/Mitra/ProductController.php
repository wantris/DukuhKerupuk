<?php

namespace App\Http\Controllers\Mitra;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage as Photo;
use App\ProductCategories;
use App\ProductImage;
use Throwable;

class ProductController extends Controller
{
    //
    public function index()
    {
        $ct = ProductCategories::all();
        $pr = Product::with('categories')->where('id_mitra', Auth::guard('mitra')->id())->get();
        return view('mitra.product.index', compact('pr', 'ct'));
    }
    public function habis()
    {
        return view('mitra.product.habis');
    }
    public function arsip()
    {
        $ct = ProductCategories::all();
        $pr = Product::with('categories')->where('id_mitra', Auth::guard('mitra')->id())->where('status', 'arsip')->get();
        return view('mitra.product.arsip', compact('pr', 'ct'));
    }
    public function add()
    {
        return view('mitra.product.add');
    }

    public function edit($slug)
    {
        $ps = Product::where('slug', $slug)->first();
        if ($ps) {
            $img = ProductImage::where('product_id', $ps->id_produk)->where('rule', '1')->first();
            $img2 = ProductImage::where('product_id', $ps->id_produk)->where('rule', '2')->first();
            $img3 = ProductImage::where('product_id', $ps->id_produk)->where('rule', '3')->first();
            $img4 = ProductImage::where('product_id', $ps->id_produk)->where('rule', '4')->first();
            return view('mitra.product.edit', compact('ps', 'img', 'img2', 'img3', 'img4'));
        }
    }

    public function update(Request $request, $id)
    {
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
            $pd = Product::find($id);
            $pd->nama_produk = $request->product_name;
            $pd->slug = str_slug($request->product_name, '-');
            $pd->product_category_id = $request->product_category;
            $pd->deskripsi_produk = $request->product_description;
            $pd->product_expired_id = $request->product_expired;
            $pd->penjualan = 0;
            $pd->status = "publik";
            $pd->harga = $request->product_price;
            $pd->stok = $request->product_stock;
            $pd->id_mitra = Auth::guard('mitra')->id();
            $pd->save();

            if ($files = $request->file('product_image')) {
                // Define upload path

                $destinationPath = public_path('/mitra/product_image/'); // upload path
                foreach ($files as $key => $img) {
                    // Upload Orginal Image           
                    $product_image = $img->getClientOriginalName();
                    $img->move($destinationPath, $product_image);
                    // Save In Database

                    $imagemodel = Photo::where('product_id', $id)->first();
                    if ($imagemodel) {
                        $imagemodel->product_id = $pd->id_produk;
                        $imagemodel->mitra_id = Auth::guard('mitra')->id();
                        $imagemodel->image = (string)$product_image;
                        $imagemodel->rule = $key + 1;
                        $imagemodel->save();
                    } else {
                        $imagemodel2 = new Photo();
                        $imagemodel2->product_id = $pd->id_produk;
                        $imagemodel2->mitra_id = Auth::guard('mitra')->id();
                        $imagemodel2->image = (string)$product_image;
                        $imagemodel2->rule = $key + 1;
                        $imagemodel2->save();
                    }
                }
            }

            return redirect()->route('portal.mitra.product.list')->with('successUpdate', 'Edit produk berhasil');
        } catch (Throwable $e) {
            return $e;
            // return redirect()->back()->with('failed', 'Tambah produk gagal');
        }
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
            $pd->slug = str_slug($request->product_name, '-');
            $pd->product_category_id = $request->product_category;
            $pd->deskripsi_produk = $request->product_description;
            $pd->product_expired_id = $request->product_expired;
            $pd->penjualan = 0;
            $pd->status = "publik";
            $pd->harga = $request->product_price;
            $pd->stok = $request->product_stock;
            $pd->id_mitra = Auth::guard('mitra')->id();
            $pd->save();

            if ($files = $request->file('product_image')) {
                // Define upload path
                $destinationPath = public_path('/mitra/product_image/'); // upload path
                foreach ($files as $key => $img) {
                    // Upload Orginal Image           
                    $product_image = $img->getClientOriginalName();
                    $img->move($destinationPath, $product_image);
                    // Save In Database
                    $imagemodel = new Photo();
                    $imagemodel->product_id = $pd->id_produk;
                    $imagemodel->mitra_id = Auth::guard('mitra')->id();
                    $imagemodel->image = (string)$product_image;
                    $imagemodel->rule = $key + 1;
                    $imagemodel->save();
                }
            }

            return redirect()->back()->with('success', 'Tambah produk berhasil');
        } catch (Throwable $e) {
            return $e;
            // return redirect()->back()->with('failed', 'Tambah produk gagal');
        }
    }

    public function delete($id)
    {
        // echo "hiyaa";
        try {
            Product::where('id_produk', $id)->delete();

            $success['status'] = '1';
            $success['message'] = 'Config save success';
            return response()->json($success, 200);
        } catch (Throwable $e) {
            $success['status'] = 'error';
            $success['message'] = $e;
            return response()->json($success, 500);
        }
    }

    public function changeStatus(Request $request)
    {
        $id =  $request->id;
        $status = $request->status;

        try {
            Product::where('id_produk', $id)->update([
                'status' => $status
            ]);

            if ($status = "arsip") {
                $html =  '<a href="#" onclick="changeStatus("' . $id . '", "publik")" class="btn btn-info" title="Pindah ke Publik"><i class="fas fa-eye"></i></a>';
            } else {
                $html = '<a href="#" onclick="changeStatus("' . $id . '", "arsip")" class="btn btn-info" title="Pindah ke Arsip"><i class="fas fa-folder-open"></i></a>';
            }


            $success['status'] = '1';
            $success['html'] = $html;
            $success['message'] = 'Change status success';
            return response()->json($success, 200);
        } catch (Throwable $e) {
            $success['status'] = 'error';
            $success['message'] = $e;
            return response()->json($success, 500);
        }
    }
}
