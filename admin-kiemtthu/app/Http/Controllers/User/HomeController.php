<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\Product;
use App\Http\Controllers\UserDBController;
use App\Models\ModelDB;
use Illuminate\Support\Facades\Auth;

class HomeController extends UserDBController
{
    public function login($id = '')
    {

        $data = [];
        return view('pages.login', $data);
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'password.required' => 'Vui lòng nhập nhập khẩu'
        ]);
        $dataCheck =  $this->db->checkLogin($request->email, $request->password);
        if ($dataCheck["status"] == true) {
            if (Auth::user()->IsAdmin == 0) {
                return redirect(config('env_custom.user.urlDefault'));
            }
            return redirect(config('env_custom.admin.url'));
        }
        return redirect('login')->with('thongbao', 'Email hoặc mật khẩu không đúng !! ');
    }
    function register(Request $request)
    {
        $this->validate($request, [
            'Username' => 'required|min:3',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password',
            'email' => 'email|required|unique:accounts,email',
            'Phone' => 'required|min:10|max:15',
            'Address' => 'required',
            'FullName' => 'required',
            'Avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4086'
        ]);
        $response =  $this->db->registerUser($request);
        if ($response["status"]) {
            return back()->with('thongbao', 'Đăng ký thành công');
        }
        return back()->with('thongbao', 'Đăng ký thất bại');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }

    public function home()
    {
        $data = [];
        $model = new ProductType();
        // $data['productType'] =ProductType::all();
        // $data['productType'] = $this->db->getAllData('product_types');
        $data['productType'] = $this->db->getAllDataInModel($model);
        $data['product'] = $this->db->getAllDataAndPagination('products', 6);
        return view('pages.home', $data);
    }
    public function blog($id = '')
    {
        $data = [];
        return view('pages.blog', $data);
    }
    public function checkout($id = '')
    {
        $data = [];
        return view('pages.checkout', $data);
    }
    public function contact($id = '')
    {
        $data = [];
        return view('pages.contact', $data);
    }

    public function detail($id = '')
    {
        $data = [];
        return view('pages.detail', $data);
    }
    public function listProduct($id = '')
    {
        $data = [];
        return view('pages.listProduct', $data);
    }
    public function cart($id = '')
    {
        $data = [];
        return view('pages.cart', $data);
    }
}
