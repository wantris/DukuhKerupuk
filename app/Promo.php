<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Promo extends Model
{
    protected $table = "mitra_promos";

    public function productref()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id_produk');
    }
}
