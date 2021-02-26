<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";
    protected $primaryKey ="id_user";
    protected $fillable = [
    'nama_user', 'username', 'password' , 'alamat_user', 'no_tlp', 'role'];
}
