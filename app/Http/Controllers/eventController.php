<?php

namespace App\Http\Controllers;
use App\Models\CaseModel;
use App\Models\event;

 

use App\Models\EventType;
use Illuminate\Http\Request;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class eventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $viewData['title'] = "events";
        $viewData['subtitle'] = "Lists events";
        $viewData['event'] = event::all();
        $dataProvider = new EloquentDataProvider(event::query());
        return view('admin.event.index', [
            'dataProvider' => $dataProvider,
            'viewData' => $viewData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData['title'] = 'Admin Page - events - CCMS';
        $viewData['eventTypes'] = EventType::all();
        $viewData['cases'] = CaseModel::all();
        return view('admin.event.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        event::validate($request);
        $event = new event();
        $event->case_id = $request->case_id;
        $event->event_type_id = $request->event_type_id;
        $event->date_time = $request->date_time;
        $event->location = $request->location;
        $event->out_come = $request->out_come;
        $event->save();
        notify()->success('event registered Successfully', 'Creation Success');
        return redirect()->route('admin.event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = event::findOrFail($id);
        $viewData['title'] = 'Admin Page - event Detail - CCMS';
        $viewData['subtitle'] = "event Detail: " . $event->getDetail();
        $viewData['event'] = $event;
        return view('admin.event.detail')->with('viewData', $viewData);
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
        $viewData['title'] = 'Admin Page - Edit event Info - CCMS';
        $viewData['event'] = event::findOrFail($id);
        $viewData['eventTypes'] = EventType::all();
        $viewData['cases'] = CaseModel::all();
        return view('admin.event.edit')->with('viewData', $viewData);
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
        event::validate($request);
        $event = event::findOrFail($id);
        $event->case_id = $request->case_id;
        $event->event_type_id = $request->event_type_id;
        $event->date_time = $request->date_time;
        $event->location = $request->location;
        $event->out_come = $request->out_come;
        $event->save();
        notify()->success('event Updated Successfully', 'Update Success');
        return redirect()->route('admin.event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        event::destroy($id);
        notify()->success('event Deleted Successfully', 'Delete Success');
         return back();
       // return redirect()->route('admin.event.index');
    }
}
