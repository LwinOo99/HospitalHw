<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Room extends Model
{
    use HasFactory;
    public function getAll(){
        Log::channel("customlog")->info("Start room getAll function.");
        return DB::table("rooms")->take(4)->orderBy("r_number","ASC")->where("del_flg","=",0)->get();
    }
    public function roomCount(){
        return DB::table("rooms")->where("del_flg","=",0)->count();
    }
    public function roomList(){
        Log::channel("customlog")->info("Start room roomList function.");
        return DB::table("rooms")->orderBy("r_number","ASC")->where("del_flg","=",0)->paginate(10);
    }

    public function insert(Request $request){
        Log::channel("customlog")->info("Start room insert function.");

        DB::table('rooms')
        ->insert([
            "r_number"=>$request->r_number,
            "r_status"=>$request->r_status,
            "r_guestNumber" =>$request->r_guestNumber,
            "r_fees"=>$request->r_fees,
            "created_at"=>Carbon::now()
        ]);
        Log::channel("customlog")->info("End room insert function.");

    }

    public function showRoom($id){
        Log::channel("customlog")->info("Start room showRoom function.");
        return DB::table('rooms')
        ->find($id);
    }

    public function updateRoomById($id,Request $request){
        Log::channel("customlog")->info("Start room updateRoomById function.");
        DB::table('rooms')
        ->where("id","=",$id)
        ->update([
            "r_number"=>$request->r_number,
            "r_status"=>$request->r_status,
            "r_guestNumber" =>$request->r_guestNumber,
            "r_fees"=>$request->r_fees
        ]);
        Log::channel("customlog")->info("End room updateRoomById function.");
    }

    public function deleteRoom($id){
        Log::channel("customlog")->info("Start room deleteRoom function.");
        DB::table('rooms')
        ->where("id","=",$id)
        ->update([
            "del_flg"=> 1
        ]);
        Log::channel("customlog")->info("End room deleteRoom function.");
    }
}
