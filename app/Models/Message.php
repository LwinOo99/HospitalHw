<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Message extends Model
{
    use HasFactory;
    public function getAll(){
        Log::channel("customlog")->info("Start Message getall function.");

        return DB::table("messages")->take(4)->orderBy("id","DESC")->where("del_flg","=",0)->get();
    }

    public function msgList(){
        Log::channel("customlog")->info("Start Message msgList function.");

        return DB::table("messages")->orderBy("id","DESC")->where("del_flg","=",0)->paginate(10);
    }

    public function insert(Request $request){
        Log::channel("customlog")->info("Start Message insert function.");

        DB::table('messages')
        ->insert([
            "m_message"=>$request->m_message,
            "m_vip"=>$request->m_vip,
            "created_at"=>Carbon::now()

        ]);
        Log::channel("customlog")->info("End Message insert function.");

    }
    public function showMsg($id){
        Log::channel("customlog")->info("Start Message showMsg function.");

        return DB::table('messages')
        ->find($id);
    }
        public function updateMsgById($id,Request $request){
        Log::channel("customlog")->info("Start Message updateMsgById function.");

        DB::table('messages')
        ->where("id","=",$id)
        ->update([
            "m_message"=>$request->m_message,
            "m_vip"=>$request->m_vip,
            "updated_at"=>Carbon::now()
            
        ]);
        Log::channel("customlog")->info("End Message updateMsgById function.");

    }

    public function deleteMsg($id){
        Log::channel("customlog")->info("Start Message deleteMsg function.");

        DB::table('messages')
        ->where("id","=",$id)
        ->update([
            "del_flg"=> 1
        ]);
        Log::channel("customlog")->info("End Message deleteMsg function.");
    
    }
}
