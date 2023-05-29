<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\hospitalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SignupController;
use App\Models\Hospital;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::resource("/room", RoomController::class);

Route::resource("/drug", DrugController::class);

Route::resource("/message", MessageController::class);

Route::resource("/appointment", AppointmentController::class);

Route::resource("/hospital", hospitalController::class);

Route::resource("/doctor", DoctorController::class);





Route::get('/login', function () {
    return view("login");
});

Route::post('/login', [LoginController::class, "login"]);

Route::get('/signup', function () {
    return view("signup");
});

Route::post('/signup', [SignupController::class, "signup"]);

Route::get("/lang/{locale}", function ($locale) {

    session()->put("locale", $locale);
    return redirect()->back();
});
