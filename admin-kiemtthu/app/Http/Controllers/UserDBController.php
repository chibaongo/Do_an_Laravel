<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Account;
use App\Models\Cart;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\ModelDB;


class UserDBController extends Controller{
   protected $table ='';
   protected $db ='';

   function __construct()
   {
      $this->db = new ModelDB();
   }
}
