<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Drug;
use App\Models\Message;
use App\Models\Room;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class hospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Log::channel("customlog")->info("start hospital index function.");
        // room list
        $room = new Room();
        $roomList = $room->getAll();
        // Messages
        $msg = new Message();
        $msgList = $msg->getAll();
        //Drugs
        $drug = new Drug();
        $drugList = $drug->getAll();
        // Appointments
        $appointment = new Appointment();
        $appointmentList = $appointment->getAll();
        Log::channel("customlog")->info("end hospital index function.");
        return View("hospital",[
            "rooms"=> $roomList,
            "msgs"=> $msgList,
            "drugs"=> $drugList,
            "appointments"=>$appointmentList
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd("create");
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
