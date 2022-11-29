<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Account extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    protected $guarded = 'web';
    protected $table = "accounts";

    protected $fillable = [
        'Username',
        'password',
        'email',
        'Phone',
        'Address',
        'IsAdmin',
        'FullName',
        'Avatar'
    ];
    public function cart(){
        return $this->hasMany(Cart::class, 'AccountId', 'id');
    }
    public function invoice(){
        return $this->hasMany(Invoice::class, 'AccountId', 'id');
    }

}
