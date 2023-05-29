<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Doctor extends Model
{
    use HasFactory;

    public function specialist(){
        return $this->hasOne(Specialist::class);
    }

    public function histories(){
        return $this->hasMany(History::class);
    }

    public function insert(Request $request){
        $doc = new Doctor();
        $doc->d_drName = $request->d_drName;
        $doc->d_age = $request->d_age;
        $doc->d_phone = $request->d_phone;
        $doc->d_address = $request->d_address;
        $doc->save();

        $spc =new Specialist();
        $spc->s_specialized = $request->s_specialized;
        $spc->s_experience =$request->s_experience;
        $spc->s_license = $request->s_license;
        
        $doc->specialist()->save($spc);
    }   

    public function getAll(){
        return Doctor::has("specialist")-> orderBy("id","DESC")-> where("del_flg","=",0)->paginate(4);
    }

    public function getDocNames(){
        return Doctor::all()->where("del_flg","=",0);
    }

    public function showDoc($id){
        return Doctor::find($id);
    }
    
    public function updateDocById($id,Request $request){
        
        $doc = Doctor::find($id);
        $doc->d_drName = $request->d_drName;
        $doc->d_age = $request->d_age;
        $doc->d_phone = $request->d_phone;
        $doc->d_address = $request->d_address;

        $doc->specialist->s_specialized =$request->s_specialized;
        $doc->specialist->s_experience =$request->s_experience;
        $doc->specialist->s_license = $request->s_license;

        $doc->save();
        $doc->specialist->save();

    }


    public function deleteDoc($id){
        $doc =Doctor::find($id);
        $doc->del_flg = 1;
        $doc->save();
    }



}
