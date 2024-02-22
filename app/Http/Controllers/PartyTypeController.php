<?php

namespace App\Http\Controllers;

use App\Models\PartyType;
use Illuminate\Http\Request;

class PartyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData['party_type'] = PartyType::all();
        $viewData['title'] = __('MOD-CCMS');
        $viewData['subtitle'] = "Party Types";
        return view('admin.party_type.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData['title'] = 'Admin Page - Party Types - CCMS';
        return view('admin.party_type.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PartyType::validate($request);
        $caseTypes = new PartyType();
        $caseTypes->party_type_name = $request->party_type_name;
        $caseTypes->description = $request->description;
        $caseTypes->save();
        notify()->success('party Type Created Successfully', 'Creation Success');
        return redirect()->route('admin.party_type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $viewData['title'] = 'Admin Page - Edit party_type - CMS';
        $viewData['party_type'] = PartyType::findOrFail($id);
        return view('admin.party_type.edit')->with('viewData', $viewData);
    }

    public function delete($id)
    {
        PartyType::destroy($id);
        notify()->success('Party_Type Deleted Successfully', 'Delete Success');
        return back();
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
        PartyType::validate($request);
        $party_type = PartyType::findOrFail($id);
        $party_type->party_type_name = $request->party_type_name;
        $party_type->description = $request->description;
        $party_type->save();
        notify()->success('Party_Type Updateted Successfully', 'Update Success');
        return redirect()->route('admin.party_type.index');
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
