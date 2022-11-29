<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends ModelDB
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'Code',
        'AccountId',
        'IssuedDate',
        'ShippingAddress',
        'ShippingPhone',
        'Total'
    ];
    protected $table = "invoices";

    public function account()
    {
        return $this->belongsTo(Account::class, 'AccountId');
    }
    public function invoiceDetail(){
        return $this->hasMany(InvoiceDetail::class, 'ProductId', 'id');
    }

}
