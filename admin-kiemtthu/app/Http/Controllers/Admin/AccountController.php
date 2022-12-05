<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AccountController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();
        $this->model = new Account();
        $this->table = "account";
        $this->data = $this->model->paginate($this->perPage);
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
            'table' => $this->table
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
        // dữ liệu
        $param = $request->all();
        $param['IsAdmin'] = $param['IsAdmin'] == "on" ? 1 : 0;
        $param['password']=Hash::make($request->password);

       
        unset($param["_token"]);
        // upload avatar
        if ($request->Avatar) {
            $name = uploadImage($request, 'Avatar');
            if (!$name) {
                return back()->withInput();
            }
        }
        $param['Avatar'] = $name ?? "";
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
            'data' => $data,
            'id' => $id,
            'table' => $this->table
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
        if (isset($param['IsAdmin'])) {
            $param['IsAdmin'] = $param['IsAdmin'] == "on" ? 1 : 0;
        }
        $param['password']=Hash::make($request->password);
        unset($param["_token"]);
        unset($param["_method"]);
        // upload avatar
        if ($request->Avatar) {
            $name = uploadImage($request, 'Avatar');
            if (!$name) {
                return back()->withInput();
            }
        }
        $param['Avatar'] = $name ?? "";
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
