<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData['event_type'] = EventType::all();
        $viewData['title'] = "MOD - CCMS";
        $viewData['subtitle'] = "Event Types";
        return view('admin.event-type.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData['title'] = 'Admin Page - Event Types - CCMS';
        return view('admin.event-type.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EventType::validate($request);
        $evntType = new EventType();
        $evntType->event_type_name = $request->event_type_name;
        $evntType->description = $request->description;
        $evntType->save();
        notify()->success('Event Type Registered Successfully', 'Creation Success');
        return redirect()->route('admin.event-type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docType = EventType::findOrFail($id);
        $viewData['title'] = 'Admin Page - Event Type Detail - CCMS';
        $viewData['subtitle'] = "Event Type Detail: ";
        $viewData['docType'] = $docType;
        return view('admin.event-type.detail')->with('viewData', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = 'Admin Page - Edit Event Type Info - CCMS';
        $viewData['eventType'] = EventType::findOrFail($id);
        return view('admin.event-type.edit')->with('viewData', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        EventType::validate($request);
        $eventType = EventType::findOrFail($id);
        $eventType->event_type_name = $request->event_type_name;
        $eventType->description = $request->description;
        $eventType->save();
        notify()->success('EventType Updateted Successfully', 'Update Success');
        return redirect()->route('admin.event-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        EventType::destroy($id);
        notify()->success('Event Type Deleted Successfully', 'Delete Success');
        return back();
    }
}
