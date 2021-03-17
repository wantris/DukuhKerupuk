<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductCategories;
use App\ProductExpired;

class Product extends Model
{
    //
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    public function categories()
    {
        return $this->hasOne(ProductCategories::class, 'id', 'product_category_id');
    }

    public function expireds()
    {
        return $this->hasOne(ProductExpired::class, 'id', 'product_expired_id');
    }
}
