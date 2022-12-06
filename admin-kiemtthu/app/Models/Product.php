<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends ModelDB
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'SKU',
        'Name',
        'Description',
        'Price',
        'Stock',
        'ProductTypeId',
        'Image',
        // 'Image1',
        // 'Image2'
    ];
    protected $table = "products";

    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'ProductTypeId');
    }

}
