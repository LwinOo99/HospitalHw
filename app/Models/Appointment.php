<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Appointment extends Model
{
    use HasFactory;
    public function getAll(){
        Log::channel("customlog")->info("Start Appointment getAll function.");

        return DB::table("appointments")->take(3)->where("del_flg","=",0)->get();
    }

    public function apmList(){
        Log::channel("customlog")->info("Start Appointment apmList function.");

        return DB::table("appointments")->orderBy("id","DESC")->where("del_flg","=",0)->paginate(10);
    }

    public function insert(Request $request){
        Log::channel("customlog")->info("Start Appointment insert function.");

        DB::table('appointments')
        ->insert([
            "a_drname"=>$request->d_drName,
            "a_room"=>$request->a_room,
            "a_dateTime"=>$request->a_dateTime,
            "created_at"=>Carbon::now()
        ]);
        Log::channel("customlog")->info("End Appointment insert function.");
    }

    public function showApm($id){
        Log::channel("customlog")->info("Start Appointment showApm function.");

        return DB::table('appointments')
        ->find($id);
    }
    public function updateApmById($id,Request $request){
        Log::channel("customlog")->info("Start Appointment updateApmById function.");

        DB::table('appointments')
        ->where("id","=",$id)
        ->update([
            "a_drName"=>$request->a_drName,
            "a_room"=>$request->a_room,
            "a_dateTime"=>$request->a_dateTime,
            "updated_at"=>Carbon::now()
            
        ]);
        Log::channel("customlog")->info("End Appointment updateApmById function.");

    }
    public function deleteApm($id){
        Log::channel("customlog")->info("Start Appointment deleteApm function.");

        DB::table('appointments')
        ->where("id","=",$id)
        ->update([
            "del_flg"=> 1
        ]);
        Log::channel("customlog")->info("End Appointment deleteApm function.");
    }
}
