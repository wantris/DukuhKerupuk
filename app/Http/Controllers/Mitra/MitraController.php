<?php

namespace App\Http\Controllers\Mitra;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mitra;
use Redirect, Response;
use Calendar;
use App\Promo;
use App\Transaksi;
use Illuminate\Support\Facades\Auth;

class MitraController extends Controller
{
    //
    public function index()
    {
        // if (\Illuminate\Support\Facades\Request::ajax()) {
        $events = [];
        $data = Promo::where('mitra_id', Auth::guard('mitra')->id())->get();
        if ($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->nama_promo,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date . ' +1 day')
                );
            }
        }
        $calendar = Calendar::addEvents($events, [ //set custom color fo this event
            'color' => '#7fad39',
            'textColor' => '#fff'
        ])->setOptions(
            ['lang' => 'id']
        );

        $mitra = Mitra::where('id_mitra', Auth::guard('mitra')->id())->first();
        $ts = Transaksi::where('mitra_id', Auth::guard('mitra')->id())->get();
        $promo_toko = Promo::where('mitra_id', Auth::guard('mitra')->id())->where('tipe_promo', 'promo-toko')->limit(4)->get();
        $promo_produk = Promo::where('mitra_id', Auth::guard('mitra')->id())->where('tipe_promo', 'promo-produk')->limit(4)->get();

        return view('mitra.index', compact('calendar', 'mitra', 'ts', 'promo_toko', 'promo_produk'));
    }
}
