<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DrugController extends Controller
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
        Log::channel("customlog")->info("Start Drug index function.");

        $drug =new Drug();
        $drugList = $drug->drugList();
        Log::channel("customlog")->info("End Drug index function.");

        return View("DrugStore",[
            "drugstore"=> $drugList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Log::channel("customlog")->info("Start Drug create function.");

        return view("addDrug");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::channel("customlog")->info("Start Drug store function.");

        $drug = new Drug();
        $drug->insert($request);
        Log::channel("customlog")->info("End Drug store function.");
        return redirect("/drug");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Log::channel("customlog")->info("Start Drug show function.");

        $drug = new Drug();
        $drugInfo= $drug->showDrug($id);
        Log::channel("customlog")->info("End Drug show function.");

        return view("showDrug",[
            "drugInfo"=> $drugInfo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        Log::channel("customlog")->info("Start Drug edit function.");

        $drug = new Drug();
        $drugInfo= $drug->showDrug($id);
        Log::channel("customlog")->info("End Drug edit function.");

        return view("editDrug",[
            "drugInfo"=> $drugInfo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Log::channel("customlog")->info("Start Drug update function.");

        $drug = new Drug();
        $drug->updateDrugById($id,$request);
        Log::channel("customlog")->info("End Drug update function.");

        return redirect("/drug");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Log::channel("customlog")->info("Start Drug destory function.");

        $drug = new Drug();
        $drug->deleteDrug($id);
        Log::channel("customlog")->info("End Drug destory function.");

        return redirect("/drug");
    }
}
