<?php

namespace App\Http\Controllers;

use App\Models\CaseModel;
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
        $case->case_of_action = $request->case_of_action;
       // $case->court_id = $request->court_id;
        //$case->case_type_id = $request->case_type_id;
        $case->start_date = $request->start_date;
        $case->end_date = $request->end_date;
        $case->save();
        notify()->success('Case Created Successfully', 'Creation Success');
        return redirect()->route('admin.case.index');
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
                ->with('message', 'Such item does NOT exist');
        }
        return view('case.detail')->with('case', $case);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
