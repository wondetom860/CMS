<?php

namespace App\Http\Controllers;

use App\Models\CaseType;
use Illuminate\Http\Request;

class CaseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData['case_type'] = CaseType::all();
        $viewData['title'] = "MOD - CCMS";
        $viewData['subtitle'] = "Case Types";
        return view('admin.case_type.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData['title'] = 'Admin Page - Case Types - CCMS';
        return view('admin.case_type.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CaseType::validate($request);
        $caseTypes = new CaseType();
        $caseTypes->case_type_name = $request->case_type_name;
        $caseTypes->description = $request->description;
        $caseTypes->save();
        notify()->success('Case Type Created Successfully', 'Creation Success');
        return redirect()->route('admin.case_type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $viewData['title'] = 'Admin Page - Edit case_type - CMS';
        $viewData['case_type'] = CaseType::findOrFail($id);
        return view('admin.case_type.edit')->with('viewData', $viewData);
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
        CaseType::validate($request);
        $case_type = CaseType::findOrFail($id);
        $case_type->case_type_name = $request->case_type_name;
        $case_type->description = $request->description;
        $case_type->save();
        notify()->success('Case Type Updateted Successfully', 'Update Success');
        return redirect()->route('admin.case_type.index');
    }

    public function delete($id)
    {
        CaseType::destroy($id);
        notify()->success('Case Type Deleted Successfully', 'Delete Success');
        return back();
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
