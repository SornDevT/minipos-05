<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class UserController extends Controller
{
    //

    public function register(Request $request){

    
        try{

            $CheckEmail = User::where("email",$request->email);

            if($CheckEmail->count()){

                $success = false;
                $message = "ອີເມວນີ້: ".$request->email." ໄດ້ເຄີຍລົງທະບຽນແລ້ວ!";
                
            } else {

                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = hash::make($request->password);
                $user->save();

                $success = true;
                $message = "ສຳເລັດ!";

            }


            
        } catch (\Illuminate\Database\QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
        }

        $response = [
            "success" => $success,
            "message" => $message
        ];
        
        return response()->json($response);

    }

     public function login(Request $request){

        $check_user_login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($check_user_login)){
            $success = true;
            $message = "ສຳເລັດ!";
        } else {
            $success = false;
            $message = "ອີເມວລ໌ ຫຼື ລະຫັດຜ່ານຂອງທ່ານ ບໍ່ຖຶກຕ້ອງ!";
        }

        $response = [
            "success" => $success,
            "message" => $message
        ];
        
        return response()->json($response);


     }

     public function logout(){
        

        try{

            Session::flush();
            
            $success = true;
            $message = "ສຳເລັດ!";
            
        } catch (\Illuminate\Database\QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
        }

        $response = [
            "success" => $success,
            "message" => $message
        ];
        
        return response()->json($response);
     }

     public function checkauth(){
        if(Auth::check()){
            $isLoggin = true;
        } else {
            $isLoggin = false;
        }

        $response = [
            'isLoggin' => $isLoggin
        ];

        return response()->json($response);
     }
}
