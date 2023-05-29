<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
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
        Log::channel("customlog")->info("Start Appointment index function.");

        $apm = new Appointment();
        $apmList= $apm->apmList();
        Log::channel("customlog")->info("End Appointment index function.");

        return view("appointment.AppointmentList",[
            "apms"=> $apmList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Log::channel("customlog")->info("Start Appointment create function.");
        $doc = new Doctor();
        $docList= $doc->getDocNames();
        // dd($docList);
        return view("appointment.addAppointment",[
            "docList"=> $docList
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::channel("customlog")->info("Start Appointment store function.");

        $apm = new Appointment();
        $apm->insert($request);
        Log::channel("customlog")->info("End Appointment store function.");

        return redirect("/appointment");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Log::channel("customlog")->info("Start Appointment show function.");

        $apm = new Appointment();
        $apmInfo= $apm->showApm($id);
        Log::channel("customlog")->info("End Appointment show function.");

        return view("appointment.showAppointment",[
            "apmInfo"=> $apmInfo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Log::channel("customlog")->info("Start Appointment edit function.");
        $doc = new Doctor();
        $docList= $doc->getDocNames();
        $apm = new Appointment();
        $apmInfo= $apm->showApm($id);
        Log::channel("customlog")->info("Start Appointment edit function.");

        return view("appointment.editAppointment",[
            "apmInfo"=> $apmInfo,
            "docList"=> $docList
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Log::channel("customlog")->info("Start Appointment update function.");

        $apm = new Appointment();
        $apm->updateApmById($id,$request);
        Log::channel("customlog")->info("End Appointment update function.");

        return redirect("/appointment");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Log::channel("customlog")->info("Start Appointment destory function.");

        $apm = new Appointment();
        $apm->deleteApm($id);
        Log::channel("customlog")->info("End Appointment destory function.");

        return redirect("/appointment");
    }
}
