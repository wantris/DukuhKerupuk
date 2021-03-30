<?php

namespace App\Http\Controllers\Konsumen;

use App\Alamat;
use App\CheckoutTmp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Province;
use Illuminate\Support\Str;
use App\City;
use App\DetailTransaksi;
use Carbon\Carbon;
use App\Product;
use App\Promo;
use Illuminate\Support\Facades\Auth;
use App\Transaksi;
use Dotenv\Regex\Success;
use Throwable;

class CheckoutController extends Controller
{
    public function index($token)
    {
        $province = Province::all();
        $tmp = CheckoutTmp::where('token', $token)->first();
        if ($tmp) {
            $json = json_decode($tmp->response);
            // dd($json->product_id);
            return view('konsumen.checkout_page', compact('province', 'json', 'token'));
        }
    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }

    public function postCheckout(Request $request)
    {
        $harga = $request->harga;
        $id = $request->id;
        $product_id = $request->product_id;
        $qty = $request->qty;
        $id_diskon = $request->id_diskon;
        $diskon = $request->diskon;
        $token = Str::random(50);

        $response = json_encode(array(
            "statusCode" => 200,
            "harga" => $harga,
            "id" => $id,
            "product_id" => $product_id,
            "qty" => $qty,
            "diskon" => $diskon,
            "id_diskon" => $id_diskon
        ));

        $ck = new CheckoutTmp();
        $ck->token = $token;
        $ck->response = $response;
        $ck->save();

        return json_encode(array(
            "statusCode" => 200,
            "token" => $token
        ));
    }

    public function saveCheckout(Request $request)
    {
        if ($request->alm_utama === null) {
            return redirect()->back()->with('failed', 'Tambah alamat dahulu');
        }
        $mitra =  array_count_values($request->mitra_id);
        $alm = Alamat::find($request->alm_utama);
        $prev_kd = "";
        try {
            $promo_diskon = Promo::find($request->id_promo);
            foreach ($request->mitra_id as $key => $mitra) {

                if ($key === 0) {
                    $kd = Str::random(10);
                    $prev_kd = $kd;

                    if ($alm) {
                        $total = 0;
                        $product = Product::where('id_mitra', $mitra)->where('id_produk', $request->id_produk[$key])->first();
                        if ($product) {
                            $promo = Promo::where('tipe_promo', 'promo-produk')->where('product_id', $product->id_produk)->first();
                            if ($promo) {
                                if ($promo->tipe_diskon === 'presentase') {
                                    $subtotal = (int)$request->qty[$key] * ((int)$product->harga - ((int)$product->harga * $promo->jumlah_diskon));
                                } elseif ($promo->tipe_diskon === 'langsung') {
                                    $subtotal = (int)$request->qty[$key] * ((int)$product->harga - (int)$promo->jumlah_diskon);
                                };
                            } else {
                                $subtotal = (int)$request->qty[$key] * (int)$product->harga;
                            }
                        }

                        $total += $subtotal;
                        if ($promo_diskon) {
                            if ($promo_diskon->tipe_diskon === 'presentase') {
                                $jumlah_diskon = ($total * $promo_diskon->jumlah_diskon);

                                $total = $total - $jumlah_diskon;
                            } else {
                                $jumlah_diskon = (int)$promo_diskon->jumlah_diskon;
                                $total = $total - $jumlah_diskon;
                            }
                        } else {
                            $jumlah_diskon = 0;
                        }

                        $tr = new Transaksi();
                        $tr->kd_transaksi = $kd;
                        $tr->user_id = Auth::guard('users')->id();
                        $tr->mitra_id = $mitra;
                        $tr->provinsi = $alm->provinceRef->name;
                        $tr->kota = $alm->cityRef->name;
                        $tr->kode_pos = $alm->kode_pos;
                        $tr->alamat = $alm->alamat_detail;
                        $tr->latitude = $alm->latitude;
                        $tr->longitude = $alm->longitude;
                        $tr->total_harga = $total;
                        $tr->diskon = $jumlah_diskon;
                        $tr->status = "pending";
                        $tr->pengiriman = $request->pengiriman;
                        $tr->save();

                        $dt = new DetailTransaksi();
                        $dt->transaksi_kd = $kd;
                        $dt->harga = $request->harga[$key];
                        $dt->product_id = $request->id_produk[$key];
                        $dt->mitra_id = $mitra;
                        $dt->qty = $request->qty[$key];
                        $dt->subtotal = $request->subtotal[$key];
                        $dt->save();
                    }
                } else {
                    $ts = Transaksi::where('kd_transaksi', $prev_kd)->where('mitra_id', $mitra)->first();
                    if ($ts) {
                        // return "benar";
                        $total = 0;
                        $product = Product::where('id_mitra', $mitra)->where('id_produk', $request->id_produk[$key])->first();
                        if ($product) {
                            $promo = Promo::where('tipe_promo', 'promo-produk')->where('product_id', $product->id_produk)->first();
                            if ($promo) {
                                if ($promo->tipe_diskon === 'presentase') {
                                    $subtotal = (int)$request->qty[$key] * ((int)$product->harga - ((int)$product->harga * $promo->jumlah_diskon));
                                } elseif ($promo->tipe_diskon === 'langsung') {
                                    $subtotal = (int)$request->qty[$key] * ((int)$product->harga - (int)$promo->jumlah_diskon);
                                };
                            } else {
                                $subtotal = (int)$request->qty[$key] * (int)$product->harga;
                            }
                        }


                        $total += $subtotal;
                        if ($promo_diskon) {
                            if ($promo_diskon->tipe_diskon === 'presentase') {
                                $jumlah_diskon = ($total * $promo_diskon->jumlah_diskon);

                                $total = $total - $jumlah_diskon;
                            } else {
                                $jumlah_diskon = (int)$promo_diskon->jumlah_diskon;
                                $total = $total - $jumlah_diskon;
                            }
                        } else {
                            $jumlah_diskon = 0;
                        }

                        Transaksi::where('kd_transaksi', $prev_kd)->update([
                            'total_harga' => $ts->total_harga + $total,
                            'diskon' => $ts->diskon + $jumlah_diskon,
                        ]);

                        $dt = new DetailTransaksi();
                        $dt->transaksi_kd = $prev_kd;
                        $dt->harga = $request->harga[$key];
                        $dt->product_id = $request->id_produk[$key];
                        $dt->mitra_id = $mitra;
                        $dt->qty = $request->qty[$key];
                        $dt->subtotal = $request->subtotal[$key];
                        $dt->save();
                    } else {
                        $kd = Str::random(10);
                        $prev_kd = $kd;
                        // return "salah2";
                        if ($alm) {
                            $total = 0;
                            $product = Product::where('id_mitra', $mitra)->where('id_produk', $request->id_produk[$key])->first();
                            if ($product) {
                                $promo = Promo::where('tipe_promo', 'promo-produk')->where('product_id', $product->id_produk)->first();
                                if ($promo) {
                                    if ($promo->tipe_diskon === 'presentase') {
                                        $subtotal = (int)$request->qty[$key] * ((int)$product->harga - ((int)$product->harga * $promo->jumlah_diskon));
                                    } elseif ($promo->tipe_diskon === 'langsung') {
                                        $subtotal = (int)$request->qty[$key] * ((int)$product->harga - (int)$promo->jumlah_diskon);
                                    };
                                } else {
                                    $subtotal = (int)$request->qty[$key] * (int)$product->harga;
                                }
                            }

                            $total += $subtotal;
                            if ($promo_diskon) {
                                if ($promo_diskon->tipe_diskon === 'presentase') {
                                    $jumlah_diskon = ($total * $promo_diskon->jumlah_diskon);

                                    $total = $total - $jumlah_diskon;
                                } else {
                                    $jumlah_diskon = (int)$promo_diskon->jumlah_diskon;
                                    $total = $total - $jumlah_diskon;
                                }
                            } else {
                                $jumlah_diskon = 0;
                            }

                            $tr = new Transaksi();
                            $tr->kd_transaksi = $kd;
                            $tr->user_id = Auth::guard('users')->id();
                            $tr->mitra_id = $mitra;
                            $tr->provinsi = $alm->provinceRef->name;
                            $tr->kota = $alm->cityRef->name;
                            $tr->kode_pos = $alm->kode_pos;
                            $tr->alamat = $alm->alamat_detail;
                            $tr->latitude = $alm->latitude;
                            $tr->longitude = $alm->longitude;
                            $tr->total_harga = $total;
                            $tr->diskon = $jumlah_diskon;
                            $tr->status = "pending";
                            $tr->pengiriman = $request->pengiriman;
                            $tr->save();

                            $dt = new DetailTransaksi();
                            $dt->transaksi_kd = $kd;
                            $dt->harga = $request->harga[$key];
                            $dt->product_id = $request->id_produk[$key];
                            $dt->mitra_id = $mitra;
                            $dt->qty = $request->qty[$key];
                            $dt->subtotal = $request->subtotal[$key];
                            $dt->save();
                        }
                    }
                    //     $total = 0;
                    //     $product = Product::where('id_mitra', $mitra)->where('id_produk', $request->id_produk[$key])->first();
                    //     if ($product) {
                    //         $promo = Promo::where('tipe_promo', 'promo-produk')->where('product_id', $product->id_produk)->first();
                    //         if ($promo) {
                    //             if ($promo->tipe_diskon === 'presentase') {
                    //                 $subtotal = (int)$request->qty[$key] * ((int)$product->harga - ((int)$product->harga * $promo->jumlah_diskon));
                    //                 dd($request->qty);
                    //             } elseif ($promo->tipe_diskon === 'langsung') {
                    //                 $subtotal = (int)$request->qty[$key] * ((int)$product->harga - (int)$promo->jumlah_diskon);
                    //             };
                    //         } else {
                    //             $subtotal = (int)$request->qty[$key] * (int)$product->harga;
                    //         }
                    //     }


                    //     $total += $subtotal;
                    //     if ($promo_diskon) {
                    //         if ($promo_diskon->tipe_diskon === 'presentase') {
                    //             $jumlah_diskon = ($total * $promo_diskon->jumlah_diskon);

                    //             $total = $total - $jumlah_diskon;
                    //         } else {
                    //             $jumlah_diskon = (int)$promo_diskon->jumlah_diskon;
                    //             $total = $total - $jumlah_diskon;
                    //         }
                    //     } else {
                    //         $jumlah_diskon = 0;
                    //     }

                    //     Transaksi::where('kd_transaksi', $kd)->update([
                    //         'total_harga' => $ts->total_harga + $total,
                    //         'diskon' => $ts->diskon + $jumlah_diskon,
                    //     ]);

                    //     $dt = new DetailTransaksi();
                    //     $dt->transaksi_kd = $kd;
                    //     $dt->harga = $request->harga[$key];
                    //     $dt->product_id = $request->id_produk[$key];
                    //     $dt->mitra_id = $mitra;
                    //     $dt->qty = $request->qty[$key];
                    //     $dt->subtotal = $request->subtotal[$key];
                    //     $dt->save();
                    // }
                }
            }


            return redirect()->route('checkout.success');
        } catch (Throwable $e) {
            return $e;
        }
    }

    public function getBukti($kd)
    {
        $ts = Transaksi::where('kd_transaksi', $kd)->first();
        return view('konsumen.paid', compact('kd', 'ts'));
    }

    public function postBukti(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        // ]);

        if ($files = $request->file('file')) {
            $destinationPath = public_path('/transfer/bukti-transfer/'); // upload path
            $bukti_image = $files->getClientOriginalName();
            $files->move($destinationPath, $bukti_image);

            Transaksi::where('kd_transaksi', $request->kd)->update([
                'bukti_transfer' => $bukti_image,
                'status' => 'cek'
            ]);

            return view('konsumen.successPurchase');
        }
    }

    public function success()
    {
        return view('konsumen.success');
    }

    public function expired($kd)
    {
        $mytime = Carbon::now();
        $datetime = $mytime->toDateTimeString();
        $time = date('H:i:s', strtotime($datetime));
        $ts = Transaksi::where('kd_transaksi', $kd)->first();

        if ($ts) {
            Transaksi::where('kd_transaksi', $ts->kd_transaksi)->update([
                'status' => 'expired'
            ]);
        }

        $success['status'] = '1';
        // $success['html'] = $html;
        $success['message'] = 'Waktu kirim bukti transfer telah habis';
        return response()->json($success, 200);
    }
}
