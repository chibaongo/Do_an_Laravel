<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Product();
        $this->table = "product";
        $this->data = $this->model->paginate($this->perPage);
        $productType = new ProductType();
        $this->dataForeign = [
            'productType' => $productType->all()
        ];
    }
    public function index()
    {
        return view($this->view . $this->table . '.home')->with([
            'data' => $this->data,
            'table' => $this->table
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view . $this->table . '.edit')->with([
            'table' => $this->table,
            'dataForeign' => $this->dataForeign
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $param = $request->all();
        unset($param["_token"]);
        // upload Image
        if ($request->Image) {
            $name = uploadImage($request, 'Image');
            if (!$name) {
                return back()->withInput();
            }
        }
        $param['Image'] = $name ?? "";
        // create account
        $create = insertTable($this->table . 's', $param);
        if ($create) {
            return redirect()->route($this->table . '.index');
        }
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->model->find($id);
        return view($this->view . $this->table . '.edit')->with([
            'table' => $this->table,
            'dataForeign' => $this->dataForeign,
            'id' => $id,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $param = $request->all();
        unset($param["_token"]);
        unset($param["_method"]);
        // upload Image
        if ($request->Image) {
            $name = uploadImage($request, 'Image');
            if (!$name) {
                return back()->withInput();
            }
        }
        $param['Image'] = $name ?? "";
        $update = updateTable($this->table . 's', $param, ['id' => $id]);
        if ($update) {
            return redirect()->route($this->table . '.index');
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->model->find($id);
        $data->delete();
        return redirect()->route($this->table . '.index');
    }
}
