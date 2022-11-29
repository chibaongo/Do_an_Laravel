<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends ModelDB
{
    use HasFactory;

    protected $fillable = [
        'InvoiceId',
        'ProductId',
        'Quantity',
        'UnitPrice'
    ];
    protected $table = "invoice_details";

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'InvoiceId');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductId');
    }
}
