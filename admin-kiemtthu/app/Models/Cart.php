<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends ModelDB
{
    use HasFactory;

    protected $fillable = [
        'AccountId',
        'ProductId',
        'Quantity'
    ];

    protected $table = "carts";

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductId');
    }
    public function account()
    {
        return $this->belongsTo(Account::class, 'AccountId');
    }
}
