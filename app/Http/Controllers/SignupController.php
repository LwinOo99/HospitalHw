<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SignupController extends Controller
{
    public function signup(Request $request){
        Log::channel("customlog")-> info("Sign up function start");

        Log::channel("customlog")->info("$request->username sign up our system.");
        $request->validate([
            "username"=> "required|between:4,12|alpha",
            "password"=> "required|digits_between:8,12|numeric",
            "age" => "required|numeric|gt:20|min:2"
        ]);
        return redirect("/hospital");
    }
}
