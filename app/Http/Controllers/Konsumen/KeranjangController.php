<?php

namespace App\Http\Controllers\Konsumen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Keranjang, Promo, Product};
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    //
    public function index()
    {
        $cart = Keranjang::with('productRef')->where('id_user', Auth::guard('users')->id())->get();
        return view('konsumen.cart', compact('cart'));
    }

    public function save(Request $request)
    {
        $cart = Keranjang::where('id_produk', $request->id_produk)->where('id_user', Auth::guard('users')->id())->first();
        $produk = Product::where('id_produk', $request->id_produk)->first();
        $promo = Promo::where('product_id', $request->id_produk)->orderBy('created_at', 'desc')->first();
        if ($produk->stok > 0) {
            if ($promo) {
                if ($promo->tipe_diskon === 'langsung') {
                    $diskon = (int)$produk->harga - (int)$promo->jumlah_diskon;
                } else {
                    $diskon = (int)$produk->harga - ((int)$produk->harga * (int)$promo->jumlah_diskon);
                }
            } else {
                $diskon = (int)$produk->harga;
            }

            if ($cart) {
                $qty = (int)$cart->qty + (int)$request->qty;
                $cart->qty = $qty;
                $cart->subtotal = (int)$cart->subtotal * $qty;
                $cart->save();
                return json_encode(array(
                    "statusCode" => 200,
                    "produk" => $request->qty
                ));
            } else {
                $kj = new Keranjang();
                $kj->id_produk = $request->id_produk;
                $kj->id_user = Auth::guard('users')->id();
                $kj->qty = (int)$request->qty;
                $kj->subtotal = (int)$request->qty * (int)$diskon;
                $kj->save();
                return json_encode(array(
                    "statusCode" => 200,
                    "produk" => $request->qty
                ));
            }
        } else {
            return json_encode(array(
                "statusCode" => 201,
                "message" => "Stok produk kosong"
            ));
        }
    }

    public function delete($id)
    {
        // echo "hiyaa";
        try {
            Keranjang::where('id_keranjang', $id)->delete();

            $success['status'] = '1';
            $success['message'] = 'Config save success';
            return response()->json($success, 200);
        } catch (Throwable $e) {
            $success['status'] = 'error';
            $success['message'] = $e;
            return response()->json($success, 500);
        }
    }

    public function deleteMultiple(Request $request)
    {
        $id = $request->ids;

        Keranjang::whereIn('id_keranjang', explode(",", $id))->delete();

        $success['status'] = '1';
        $success['message'] = $id;
        return response()->json($success, 200);
    }

    public function addPromo(Request $request)
    {
        $pr = Promo::where('kode_voucher', $request->kode)->first();
        if ($pr) {
            return json_encode(array(
                "statusCode" => 200,
                "message" => json_encode($pr)
            ));
        } else {
            return json_encode(array(
                "statusCode" => 201,
                "message" => "Maaf promo tidak tersedia"
            ));
        }
    }
}
