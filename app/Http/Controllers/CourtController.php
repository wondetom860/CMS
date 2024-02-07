<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Court;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData['title'] = "Courts";
        $viewData['subtitle'] = "Lists Courts";
        $viewData['courts'] = Court::all();
        return view('admin.court.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData['title'] = 'Admin Page - Courts - CCMS';
        return view('admin.court.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Court::validate($request);
        $court = new Court();
        $court->name = $request->name;
        $court->state = $request->state;
        $court->city = $request->city;
        $court->zip = $request->zip;
        $court->save();
        notify()->success('Court registered Successfully', 'Creation Success');
        return redirect()->route('admin.court.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $court = Court::findOrFail($id);
        $viewData['title'] = 'Admin Page - Court Detail - CCMS';
        $viewData['subtitle'] = "Course Detail: " . $court->getDetail();
        $viewData['court'] = $court;
        return view('admin.court.detail')->with('viewData', $viewData);
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
        $viewData['title'] = 'Admin Page - Edit Court Info - CCMS';
        $viewData['court'] = Court::findOrFail($id);
        return view('admin.court.edit')->with('viewData', $viewData);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
