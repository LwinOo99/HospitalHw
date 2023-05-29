<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Drug extends Model
{
    use HasFactory;

    public function getAll(){
        Log::channel("customlog")->info("Start Drug getAll function.");

        return DB::table("drugs")->take(5)->where("del_flg","=",0)->get();
    }

    public function drugList(){
        Log::channel("customlog")->info("Start Drug drugList function.");

        return DB::table("drugs")->orderBy("id", "DESC")->where("del_flg","=",0)->paginate(10);
    }

    public function insert(Request $request){
        Log::channel("customlog")->info("Start Drug insert function.");
        DB::table('drugs')
        ->insert([
            "d_name"=>$request->d_name,
            "d_amount"=>$request->d_amount,
            "d_stock" =>$request->d_stock,
            "d_price"=>$request->d_price,
            "created_at"=>Carbon::now()

        ]);
        Log::channel("customlog")->info("End Drug insert function.");

    }

    public function showDrug($id){
        Log::channel("customlog")->info("Start Drug showDrug function.");

        return DB::table('drugs')
        ->find($id);
    }

    public function updateDrugById($id,Request $request){
        Log::channel("customlog")->info("Start Drug updateDrugById function.");

        DB::table('drugs')
        ->where("id","=",$id)
        ->update([
            "d_name"=>$request->d_name,
            "d_amount"=>$request->d_amount,
            "d_stock" =>$request->d_stock,
            "d_price"=>$request->d_price
        ]);
        Log::channel("customlog")->info("End Drug updateDrugById function.");

    }
    public function deleteDrug($id){
        // DB::table("drugs")
        // ->where("id","=",$id)
        // ->delete();
        Log::channel("customlog")->info("Start Drug deleteDrug function.");

        DB::table('drugs')
        ->where("id","=",$id)
        ->update([
            "del_flg"=> 1
        ]);
        Log::channel("customlog")->info("End Drug deleteDrug function.");

    }
}
