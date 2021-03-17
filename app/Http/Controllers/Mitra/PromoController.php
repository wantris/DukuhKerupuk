<?php

namespace App\Http\Controllers\Mitra;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\Promo;
use Throwable;

class PromoController extends Controller
{
    public function index($type)
    {
        if ($type === 'promo-toko') {
            $promo = Promo::where('mitra_id', Auth::guard('mitra')->id())->where('tipe_promo', $type)->get();
        } else {
            $promo = Promo::where('mitra_id', Auth::guard('mitra')->id())->where('tipe_promo', $type)->get();
        }


        return view('mitra.promo.index', compact('promo', 'type'));
    }

    public function create()
    {
        $product = Product::where('id_mitra', Auth::guard('mitra')->id())->get();
        return view('mitra.promo.create', compact('product'));
    }

    public function save(Request $request)
    {

        $request->validate([
            'tipe_promo' => 'required',
            'nama_promo' => 'required',
            'kode_promo' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'jumlah_diskon' => 'required',
            'kuota' => 'required',
            'status_promo' => 'required'
            // 'product_image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        try {

            if ($request->has('product_id')) {
                foreach ($request->product_id as $key => $product) {
                    $pr = new Promo();
                    $pr->product_id = $product;
                    $pr->mitra_id  = Auth::guard('mitra')->id();
                    $pr->nama_promo = $request->nama_promo;
                    $pr->tipe_promo = $request->tipe_promo;
                    $pr->kode_voucher = $request->kode_promo;
                    $pr->start_date = $request->start_date;
                    $pr->end_date = $request->end_date;
                    $pr->tipe_diskon = $request->discount_type;
                    if ($request->discount_type === "langsung") {
                        $pr->jumlah_diskon = $request->jumlah_diskon;
                    } elseif ($request->discount_type === "presentase") {
                        $pr->jumlah_diskon = (float)$request->jumlah_diskon / 100;
                    }
                    $pr->kuota = $request->kuota;
                    $pr->status = $request->status_promo;
                    $pr->save();
                }
            } else {
                $pr = new Promo();
                $pr->mitra_id  = Auth::guard('mitra')->id();
                $pr->nama_promo = $request->nama_promo;
                $pr->tipe_promo = $request->tipe_promo;
                $pr->kode_voucher = $request->kode_promo;
                $pr->start_date = $request->start_date;
                $pr->end_date = $request->end_date;
                $pr->tipe_diskon = $request->discount_type;
                if ($request->discount_type === "langsung") {
                    $pr->jumlah_diskon = $request->jumlah_diskon;
                } elseif ($request->discount_type === "presentase") {
                    $pr->jumlah_diskon = (float)$request->jumlah_diskon / 100;
                };
                $pr->kuota = $request->kuota;
                $pr->status = $request->status_promo;
                $pr->save();
            }
            return redirect()->back()->with('success', 'Tambah promo berhasil');
        } catch (Throwable $e) {
            return $e;
        }
    }

    public function edit($id)
    {
        $product = Product::where('id_mitra', Auth::guard('mitra')->id())->get();
        $pr = Promo::with('productRef')->where('id', $id)->first();
        if ($pr) {
            return view('mitra.promo.edit', compact('pr', 'product'));
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipe_promo' => 'required',
            'nama_promo' => 'required',
            'kode_promo' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'jumlah_diskon' => 'required',
            'kuota' => 'required',
            'status_promo' => 'required'
        ]);

        try {

            if ($request->has('product_id')) {
                foreach ($request->product_id as $key => $product) {
                    $pr = Promo::find($id);
                    $pr->product_id = $product;
                    $pr->mitra_id  = Auth::guard('mitra')->id();
                    $pr->nama_promo = $request->nama_promo;
                    $pr->tipe_promo = $request->tipe_promo;
                    $pr->kode_voucher = $request->kode_promo;
                    $pr->start_date = $request->start_date;
                    $pr->end_date = $request->end_date;
                    $pr->tipe_diskon = $request->discount_type;
                    if ($request->discount_type === "langsung") {
                        $pr->jumlah_diskon = $request->jumlah_diskon;
                    } elseif ($request->discount_type === "presentase") {
                        $pr->jumlah_diskon = (float)$request->jumlah_diskon / 100;
                    }
                    $pr->kuota = $request->kuota;
                    $pr->status = $request->status_promo;
                    $pr->save();
                }
            } else {
                $pr = Promo::find($id);
                $pr->mitra_id  = Auth::guard('mitra')->id();
                $pr->nama_promo = $request->nama_promo;
                $pr->tipe_promo = $request->tipe_promo;
                $pr->kode_voucher = $request->kode_promo;
                $pr->start_date = $request->start_date;
                $pr->end_date = $request->end_date;
                $pr->tipe_diskon = $request->discount_type;
                if ($request->discount_type === "langsung") {
                    $pr->jumlah_diskon = $request->jumlah_diskon;
                } elseif ($request->discount_type === "presentase") {
                    $pr->jumlah_diskon = (float)$request->jumlah_diskon / 100;
                };
                $pr->kuota = $request->kuota;
                $pr->status = $request->status_promo;
                $pr->save();
            }
            return redirect()->back()->with('success', 'Edit promo berhasil');
        } catch (Throwable $e) {
            return $e;
        }
    }

    public function delete($id)
    {
        // echo "hiyaa";
        try {
            Promo::where('id', $id)->delete();

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
            Promo::where('id', $id)->update([
                'status' => $status
            ]);

            // if ($status = "arsip") {
            //     $html =  '<a href="#" onclick="changeStatus("' . $id . '", "1")" class="btn btn-info" title="Pindah ke Publik"><i class="fas fa-eye"></i></a>';
            // } else {
            //     $html = '<a href="#" onclick="changeStatus("' . $id . '", "0")" class="btn btn-info" title="Pindah ke Arsip"><i class="fas fa-folder-open"></i></a>';
            // }


            $success['status'] = '1';
            // $success['html'] = $html;
            $success['message'] = 'Change status success';
            return response()->json($success, 200);
        } catch (Throwable $e) {
            $success['status'] = 'error';
            $success['message'] = $e;
            return response()->json($success, 500);
        }
    }
}
