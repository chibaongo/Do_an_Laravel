<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserDBController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductOutSideController extends UserDBController
{

    function __construct()
    {
        $this->table = new Product();
    }

    // =========================================== SEARCH
    // Tìm kiếm cơ bản: Tìm theo tên sản phẩm.
    // ▪ Tìm kiếm nâng cao: Tìm theo nhiều tiêu chí như tên
    //sản phẩm, mô tả, khoảng giá tiền, loại sản phẩm.
    public function search(Request $request){

        $sql =  DB::table('products')->join('product_types','products.ProductTypeId','=','product_types.id')
                                     ->select('products.*', DB::raw('product_types.Name as NameType'));
        if(!empty($request->name)){
            $sql->where('products.Name','LIKE', "%$request->name%");
        }
        if(!empty($request->description)){
            $sql->where('products.Description','LIKE', "%$request->description%");
        }
        if(!empty($request->type)){
            $sql->where('product_types.Name','LIKE', "%$request->type%");
        }
        if(!empty($request->price)){
            $sql->where('products.Price','LIKE', "%$request->price%");
        };
        $dataSearch = $sql->get();

        return view('pages.search', ['product'=> $dataSearch]);
    }

    public function detailProduct($id){
         echo $id;
    }
}
