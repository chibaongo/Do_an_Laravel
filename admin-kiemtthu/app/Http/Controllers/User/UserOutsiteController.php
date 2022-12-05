<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserDBController;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserOutsiteController extends UserDBController
{
    function showDetailInfoUser(){
        return view('pages.detaiUser');
    }
    function postDetailInfoUser(Request $request){
        $this->validate($request,[
            'Username' =>'required|min:3',
            'email'=>'email|required',
            'Phone'=> 'required|min:10|max:15',
            'Address' =>'required',
            'FullName'=>'required'
        ]);

        $user = Account::find(Auth::user()->id);
        $user->Username = $request->Username;
        $user->email = $request->email;
        $user->Phone = $request->Phone;
        $user->Address = $request->Address;
        $user->FullName = $request->FullName;

        if(!empty($user->password)){
            $user->password = Hash::make($request->password);
        }
        //Mặc định là user
        $user->IsAdmin = 0;   // user: 0 ; admin :1

        //add image
        
        if($request->hasFile('Avatar')){
            $file = $request->file('Avatar');
            
            $name = $file->getClientOriginalName();
            $nameKhongTrung =  date('Y_m_d_H_i_s_').$name;
            $file->move('Avatar', $nameKhongTrung);
            $user->Avatar = $nameKhongTrung;

        }
        // response status
        $response['status'] =  $user->save();

        if($response["status"]){
            return back()->with('thongbao','Sửa thành công');
        }
        return back()->with('thongbao','Sửa thất bại');
    }
}
