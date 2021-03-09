<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mitra extends Authenticatable
{
    public $table = "mitra";
    public $primaryKey  = "id_mitra";
    public $timestamps = true;
    protected $hidden = ['password', 'remember_token'];
}
