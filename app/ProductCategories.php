<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class ProductCategories extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_category_id', 'id');
    }
}
