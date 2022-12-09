<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use Intervention\Image\Facades\Image;

class StoreController extends Controller
{
    //

    public function index(){

        //$store = Store::orderBy('id','asc')->get();
        //return $store;

        $search = \Request::get('search');
        $store = Store::orderBy('id','asc')
        ->where('name','LIKE',"%{$search}%")
        ->paginate(15)
        ->toArray();

         return array_reverse($store);

    }

    public function add(Request $request){


        try{


            if($request->file('file')){

                $upload_path = "assets/img";
                $generated_new_name = time().'.'.$request->file->getClientOriginalExtension();
                $image = $request->file('file');
                $img = Image::make($image->getRealpath());
                $img->resize(800, null, function($constraint){
                    $constraint->aspectRatio();
                });

                $img->save($upload_path.'/'.$generated_new_name);

            } else {
                $generated_new_name = "";
            }

            // ບັນທຶກຂໍ້ມູນ
            $store = new Store();
            $store->name = $request->name;
            $store->image = $generated_new_name;
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


            if($request->file('file')){

                $upload_path = "assets/img";

                if($store->image!=''){
                    if(file_exists($upload_path.'/'.$store->image)){
                        unlink($upload_path.'/'.$store->image);
                    }
                }


                $generated_new_name = time().'.'.$request->file->getClientOriginalExtension();
                $image = $request->file('file');
                $img = Image::make($image->getRealpath());
                $img->resize(800, null, function($constraint){
                    $constraint->aspectRatio();
                });

                $img->save($upload_path.'/'.$generated_new_name);

                 // ອັບເດດ
                $store->update([
                    'name' => $request->name,
                    'image' => $generated_new_name,
                    'amount' => $request->amount,
                    'price_buy' => $request->price_buy,
                    'price_sell' => $request->price_sell,
                ]);


            } else {
                $generated_new_name = "";

                // ອັບເດດ
                $store->update([
                    'name' => $request->name,
                    'amount' => $request->amount,
                    'price_buy' => $request->price_buy,
                    'price_sell' => $request->price_sell,
                ]);
            }


            

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
