<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
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
        Log::channel("customlog")->info("Start  message index function.");
        $msg = new Message();
        $msgList= $msg->msgList();
        Log::channel("customlog")->info("End message index function.");

        return view("message.MessageList",[
            "msgs"=> $msgList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Log::channel("customlog")->info("Start message create function.");
        return view("message.addMessage");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::channel("customlog")->info("Start message store function.");

        $msg = new Message();
        $msg->insert($request);
        Log::channel("customlog")->info("End message store function.");

        return redirect("/message");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Log::channel("customlog")->info("Start message show function.");
        $msg = new Message();
        $msgInfo= $msg->showMsg($id);
        Log::channel("customlog")->info("End message show function.");

        return view("message.showMessage",[
            "msgInfo"=> $msgInfo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Log::channel("customlog")->info("Start message edit function.");
        $msg = new Message();
        $msgInfo= $msg->showMsg($id);
        Log::channel("customlog")->info("End message edit function.");
        return view("message.editMessage",[
            "msgInfo"=> $msgInfo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Log::channel("customlog")->info("Start message update function.");
        $msg = new Message();
        $msg->updateMsgById($id,$request);
        Log::channel("customlog")->info("End message update function.");

        return redirect("/message");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Log::channel("customlog")->info("Start message destory function.");
        $msg = new Message();
        $msg->deleteMsg($id);
        Log::channel("customlog")->info("End message destory function.");

        return redirect("/message");
    }
}
