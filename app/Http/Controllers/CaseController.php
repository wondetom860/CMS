<?php

namespace App\Http\Controllers;

use App\Models\CaseModel;
use App\Models\CaseType;
use App\Models\Court;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $viewData = [];
        $viewData["title"] = "Register_Case - CCMS";
        $viewData["subtitle"] = "List of Cases";
        $viewData["case"] =CaseModel::all();
        return view('case.index')->with('viewData', $viewData);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData['title'] = 'Register Case - CCMS';
        $viewData['courts'] = Court::all();
        $viewData['case_type'] = CaseType::all();
        return view('case.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CaseModel::validate($request);
        $case = new CaseModel();
        $case->case_number = $request->case_number;
        $case->cause_of_action = $request->cause_of_action;
        $case->court_id = $request->court_id;
        $case->case_status = 0;
        $case->case_type_id = $request->case_type_id;
        $case->start_date = $request->start_date;
        //$case->end_date = $request->end_date;
        $case->save();
        notify()->success('Case Created Successfully', 'Creation Success');
        return redirect()->route('case.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     
     */
    public function show($id)
    {
        $case = CaseModel::find($id); //findOrFail
        if (is_null($case)) {
            return view('error')
                ->with('title', 'Case not found')
                ->with('message', 'Such cases does NOT exist');
        }
        return view('case.show')->with('case', $case);
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
        $viewData['title'] = 'Case Page - Edit Case - CMS';
        $viewData['courts'] = Court::all();
        $viewData['case_type'] = CaseType::all();
        $viewData['case'] = CaseModel::findOrFail($id);
        return view('case.edit')->with('viewData', $viewData);
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
        CaseModel::validate($request);
        $case = CaseModel::findOrFail($id);
        $case->case_number = $request->case_number;
        $case->cause_of_action = $request->cause_of_action;
        $case->court_id = $request->court_id;
        $case->case_type_id = $request->case_type_id;
        $case->start_date = $request->start_date;
        $case->save();
        notify()->success('Case Updateted Successfully', 'Update Success');
        return redirect()->route('case.index');
    }

    public function delete($id)
    {
        CaseModel::destroy($id);
        notify()->success('Case Deleted Successfully', 'Delete Success');
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
