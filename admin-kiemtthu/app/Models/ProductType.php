<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductType extends ModelDB
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'Name'
    ];
    protected $table = "product_types";

    public function product(){
        return $this->hasMany(Product::class, 'ProductTypeId', 'id');
    }
}
