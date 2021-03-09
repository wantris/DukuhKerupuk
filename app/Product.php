<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductCategories;

class Product extends Model
{
    //
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    public function categories()
    {
        return $this->hasOne(ProductCategories::class);
    }
}
