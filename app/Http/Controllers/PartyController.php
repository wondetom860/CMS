<?php

namespace App\Http\Controllers;

use App\Models\PartyType;
use App\Models\Party;
use App\Models\Person;
use App\Models\CaseModel;
use Itstructure\GridView\DataProviders\EloquentDataProvider;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    //



    public function index()
    {
        $viewData['title'] = "Parties";
        $viewData['subtitle'] = "Lists parties";
        $viewData['party'] = Party::all();
        $dataProvider = new EloquentDataProvider(Party::query());
        return view('admin.party.index', [
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
        $viewData['title'] = 'Admin Page - parties - CCMS';
        $viewData['parttype'] = PartyType::all();
        $viewData['person'] = Person::all();
        $viewData['cases'] = CaseModel::all();
        return view('admin.party.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Party::validate($request);
        $court = new Party();
        $court->case_id = $request->case_id;
        $court->person_id = $request->person_id;
        $court->party_type_id = $request->party_type_id;
        $court->save();
        notify()->success('party registered Successfully', 'Creation Success');
        return redirect()->route('admin.party.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $viewData['party'] = Party::findOrFail($id);
        $viewData['title'] = "Party";
        $viewData['subtitle'] = "Detail of Party ";
        return view('admin.party.detail')->with('viewData', $viewData);
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
        $viewData['title'] = 'Admin Page - Edit staffrole - CCMS';
        $viewData['party'] = Party::findOrFail($id);
        $viewData['parttype'] = PartyType::all();
        $viewData['person'] = Person::all();
        $viewData['cases'] = CaseModel::all();
        return view('admin.party.edit')->with('viewData', $viewData);
       
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

         //

         Party::validate($request);
         $party = Party::findOrFail($id);
         $party->case->case_number = $request->case_number;
         $party->person->person_id = $request->person_id;
         $party->party_type_name = $request->party_type_name;
         $party->save();
         notify()->success('Party Updateted Successfully', 'Update Success');
         return redirect()->route('admin.party.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        //
    }
    public function delete($id)
    {
        Party::destroy($id);
        notify()->success('Party Deleted Successfully', 'Delete Success');
        return back();
    }

    
}


