<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transection;
use App\Models\Store;

class TransectionController extends Controller
{
    //

    public function index(){

        $trans = Transection::orderBy("created_at","desc")
        ->paginate(10)
        ->toArray();

        return array_reverse($trans);
    }

    public function add(Request $request){

        try{

        //return $request->listorder;

        foreach($request->listorder as $item){

            $number = 1;
            $tran = Transection::all()->sortByDesc('id')->take(1)->toArray();

            foreach($tran as $new){
                $number = $new["tran_id"];
            }
            // ຕົວຢ່າງ INC00001
            if($number !=''){
                $number1 = str_replace("INC","",$number); // 00001
                $number2 = str_replace("EXP","",$number1);
                $number3 = (int)$number2+1; // 1+1 = 2
                $length = 5;
                $number = substr(str_repeat(0,$length).$number3, - $length); //00002
            }

            if($request->acc_type == "income") {
                $tnum = "INC";
            } elseif($request->acc_type == "expense") {
                $tnum = "EXP";
            }

            $trans = new Transection();
            $trans->tran_id = $tnum.$number;
            $trans->product_id = $item["id"];
            $trans->tran_type = $request->acc_type;
            $trans->tran_detail = $item["name"];
            $trans->amount = $item["order_amount"];
            $trans->price = $item["order_amount"]*$item["price_sell"];
            $trans->save();

            // ທຳການ ຕັດສະຕ໋ອກສິນຄ້າ

            $store = Store::find($item["id"]);

            // update
            $store_update = Store::find($item["id"]);
            $store_update->update([
                'amount' => $store->amount - $item["order_amount"]
            ]);
            

        }

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
}
