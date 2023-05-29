<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doc = new Doctor();
        $docList = $doc->getAll();

        foreach ($docList as $key => $doc) {
            $spc_info = $doc->specialist;
        }
        // dd($spc_info);
        return View("doctor.DoctorList", [
            "doctors"=> $docList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View("doctor.addDoctor");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        $doc = new Doctor();
        $doc->insert($request);
        return redirect("/doctor");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doc = new Doctor();
        $docInfo = $doc->showDoc($id);
        $spc = $docInfo->specialist;

        return view("doctor.showDoctor", [
            "docInfo" => $docInfo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doc = new Doctor();
        $docInfo = $doc->showDoc($id);
        $spc = $docInfo->specialist;

        return view("doctor.editDoctor", [
            "docInfo" => $docInfo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $doc = new Doctor();
        $doc->updateDocById($id,$request);
        return redirect("/doctor");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doc = new Doctor();
        $doc->deleteDoc($id);
        return redirect("/doctor");
    }
}
