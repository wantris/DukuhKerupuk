<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class DetailTransaksi extends Model
{
    protected $table = "detail_transaksi";

    public function productRef()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id_produk');
    }
}
