<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    //

    public function index(){

        //$store = Store::orderBy('id','asc')->get();
        //return $store;

        $search = \Request::get('search');
        $store = Store::orderBy('id','asc')
        ->where('name','LIKE',"%{$search}%")
        ->paginate(5)
        ->toArray();

         return array_reverse($store);

    }

    public function add(Request $request){


        try{

            // ບັນທຶກຂໍ້ມູນ
            $store = new Store();
            $store->name = $request->name;
            $store->amount = $request->amount;
            $store->price_buy = $request->price_buy;
            $store->price_sell = $request->price_sell;
            $store->save();

            $success = true;
            $message = "ບັນທຶກຂໍ້ມູນສຳເລັດ!";
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

    public function edit($id){

        $store = Store::find($id);
        return response()->json($store);

    }

    public function update($id, Request $request){

        try{
            // ຄົ້ນຫາຂໍ້ມູນ
            $store = Store::find($id);
            // ອັບເດດ
            $store->update([
                'name' => $request->name,
                'amount' => $request->amount,
                'price_buy' => $request->price_buy,
                'price_sell' => $request->price_sell,
            ]);

            $success = true;
            $message = "ອັບເດດຂໍ້ມູນສຳເລັດ!";
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

    public function delete($id){

        try{
           
            $store = Store::find($id);
            $store->delete();

            $success = true;
            $message = "ລຶບຂໍ້ມູນສຳເລັດ!";
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

}
