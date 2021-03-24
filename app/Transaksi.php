<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mitra;

class Transaksi extends Model
{
    protected $table = "transaksi";

    public function mitraRef()
    {
        return $this->belongsTo(Mitra::class, 'mitra_id', 'id_mitra');
    }

    public function userRef()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}
