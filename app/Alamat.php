<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{Province, City};

class Alamat extends Model
{
    protected $table = "alamat_konsumen";
    public $timestamps = true;

    public function provinceRef()
    {
        return $this->hasOne(Province::class, 'province_id', 'id');
    }

    public function cityRef()
    {
        return $this->hasOne(city::class, 'province_id', 'id');
    }
}
