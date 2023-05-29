<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
{


    public function __construct()
    {
        $this->middleware("checkLogin")->except(["index","show"]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        Log::channel("customlog")->info("Start room index function");
        $room = new Room();
        $roomList= $room->roomList();
        Log::channel("customlog")->info("End room index function");
        $roomCount = $room->roomCount();
        return view("room.RoomList",[
            "rooms"=> $roomList,
            "roomCount"=> $roomCount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Log::channel("customlog")->info("Start create function.");

        return view("room.addRoom");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::channel("customlog")->info("Start store function.");
        $room = new Room();
        $room->insert($request);
        Log::channel("customlog")->info("End store function.");
        return redirect("/room");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Log::channel("customlog")->info("Start show function.");

        $room = new Room();
        $roomInfo= $room->showRoom($id);
        Log::channel("customlog")->info("End show function.");
        return view("room.showRoom",[
            "roomInfo"=> $roomInfo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        Log::channel("customlog")->info("Start edit function.");
        $room = new Room();
        $roomInfo= $room->showRoom($id);
        Log::channel("customlog")->info("End edit function.");
        return view("room.editRoom",[
            "roomInfo"=> $roomInfo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Log::channel("customlog")->info("Start update function.");

        $room = new Room();
        $room->updateRoomById($id,$request);
        Log::channel("customlog")->info("End update function.");
        return redirect("/room");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Log::channel("customlog")->info("Start destory function.");
        $room = new Room();
        $room->deleteRoom($id);
        Log::channel("customlog")->info("End destory function.");

        return redirect("/room");
    }
}
