<?php

namespace App\Http\Controllers\Mitra;

use App\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage as Photo;
use App\ProductCategories;
use App\ProductImage;
use App\Transaksi;
use Throwable;

class TransaksiController extends Controller
{
    public function index($status)
    {
        if ($status === 'all') {
            $ts = Transaksi::with('userRef')->where('mitra_id', Auth::guard('mitra')->id())->get();
            return view('mitra.transaksi.index', compact('ts'));
        } elseif ($status === 'pending') {
            $ts = Transaksi::with('userRef')->where('mitra_id', Auth::guard('mitra')->id())->where('status', $status)->get();
            return view('mitra.transaksi.pending', compact('ts'));
        } elseif ($status === 'cek') {
            $ts = Transaksi::with('userRef')->where('mitra_id', Auth::guard('mitra')->id())->where('status', $status)->get();
            return view('mitra.transaksi.cek', compact('ts'));
        } elseif ($status === 'dikemas') {
            $ts = Transaksi::with('userRef')->where('mitra_id', Auth::guard('mitra')->id())->where('status', $status)->get();
            return view('mitra.transaksi.dikemas', compact('ts'));
        } elseif ($status === 'dikirim') {
            $ts = Transaksi::with('userRef')->where('mitra_id', Auth::guard('mitra')->id())->where('status', $status)->get();
            return view('mitra.transaksi.dikirim', compact('ts'));
        } elseif ($status === 'selesai') {
            $ts = Transaksi::with('userRef')->where('mitra_id', Auth::guard('mitra')->id())->where('status', $status)->get();
            return view('mitra.transaksi.selesai', compact('ts'));
        }
    }

    public function changeStatus(Request $request, $kd)
    {
        $status = $request->status;

        try {
            Transaksi::where('kd_transaksi', $kd)->update([
                'status' => $status
            ]);

            $success['status'] = '1';
            $success['message'] = $kd;
            return response()->json($success, 200);
        } catch (Throwable $e) {
            $success['status'] = 'error';
            $success['message'] = $e;
            return response()->json($success, 500);
        }
    }

    public function detail($kd)
    {
        $ts = Transaksi::with('userRef')->where('kd_transaksi', $kd)->first();
        $detail = DetailTransaksi::where('transaksi_kd', $kd)->get();
        return view('mitra.transaksi.invoice', compact('ts', 'detail', 'kd'));
    }
}
