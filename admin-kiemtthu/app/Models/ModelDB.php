<?php

namespace App\Models;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ModelDB extends Model
{
    use HasFactory;

    // AnPH
    function __construct()
    {
        parent::__construct();
    }
    function addWithParams($table = '', $param = []){
        try{
            $data = DB::table($table)->insert($param);
            return $data;
        }catch(Exception $e){
            // return $e->getMessage();
            return false;
        }
    }
    function editByWhere($table = '', $param = [], $where = ''){
        try{
            $data = DB::table($table)->where('id', $where)->update($param);
            return $data;
        }catch(Exception $e){
            return false;
        }
    }

    function deleteByWhere($table = '', $where = '')
    {
        try {
            return DB::table($table)->where('id', $where)->delete();
        } catch (Exception $e) {
            return false;
        }
    }

    // HieuNM
    function getAllData($table){
        try {
            return DB::table($table)->get();

        } catch (Exception $e) {
            return false;
        }
    }
    function getAllDataInModel($model){
        try {
            return $model::all();
        } catch (Exception $e) {
            return false;
        }
    }
    function getAllDataAndPagination($table, $quantily){
        try {
            return DB::table($table)->paginate($quantily);
        } catch (Exception $e) {
            return false;
        }
    }
    // ===============  login
    //   checkUser : nếu
    //      + true là check user,
    //      + false check admin
    function checkLoginV2($email, $password, $checkUser = true){
        $dataResponse = [];
        $dataResponse['status'] = false;
        try {
            //login home
            if( $checkUser){
                if(Auth::guard('web')->attempt(['email' => $email, 'password' => $password , 'IsAdmin' => false])){
                    $dataResponse['status'] = true;
                    $dataResponse['IsAdmin'] = 'user';
                }
            }
            //login admin
            else{
                if(Auth::guard('web')->attempt(['email' => $email, 'password' => $password, 'IsAdmin' => true])){
                    $dataResponse['status'] = true;
                    $dataResponse['IsAdmin'] = 'admin';
                }
            }
        } catch (Exception $e) {
            return false;
        }
        return $dataResponse;
    }

    function checkLogin($email, $password){
        $dataResponse = [];
        $dataResponse['status'] = false;
        try {
            if(Auth::guard('web')->attempt(['email' => $email, 'password' => $password ])){
                $dataResponse['status'] = true;
            }

        } catch (Exception $e) {
            return false;
        }
        return $dataResponse;
    }

    //$checkUser = true là thêm user
    //$checkUser = false là thêm admin
    function registerUser(Request $request, $checkUser = true){

        $user = new Account();
        $user->Username = $request->Username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->Phone = $request->Phone;
        $user->Address = $request->Address;
        $user->FullName = $request->FullName;

        if($checkUser){
            $user->IsAdmin = 0;   // user: 0 ; admin :1
        }else{
            $user->IsAdmin = 1;
        }

        //add image
        if($request->hasFile('Avatar')){
            $file = $request->file('Avatar');
            $name = $file->getClientOriginalName();
            $nameKhongTrung =  date('Y_m_d_H_i_s_').$name;
            $file->move('Avatar', $nameKhongTrung);
            $user->Avatar = $nameKhongTrung;

        }else{
            $user->Avatar = "";
        }
        // response status
        $data['status'] =  $user->save();
        return $data;
    }
}
