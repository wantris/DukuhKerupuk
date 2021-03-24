<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Keranjang extends Model
{
    protected $table = "keranjang";
    protected $primaryKey = "id_keranjang";

    public $timestamps = true;

    public function productRef()
    {
        return $this->hasOne(Product::class, 'id_produk', 'id_produk');
    }
}
