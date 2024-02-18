<?php

namespace App\Http\Controllers;

use App\Models\CaseModel;
use App\Models\CaseType;
use App\Models\Court;
use App\Models\Party;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class CaseController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:case-list|role-create|case-edit|case-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:case-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:case-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:case-delete', ['only' => ['delete']]);
        $this->middleware('permission:case-detail', ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     *
     *
     */
    public function index()
    {
        //
        $viewData = [];
        $viewData["title"] = "Register_Case - CCMS";
        $viewData["subtitle"] = "List of Cases";
        $viewData["case"] = CaseModel::all();
        $dataProvider = new EloquentDataProvider(
            CaseModel::query()
            ->withAggregate('court','name')
            ->withAggregate('caseType','case_type_name')
        );
        return view('case.index', [
            'dataProvider' => $dataProvider,
            'viewData' => $viewData
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($clientId = null)
    {
        $viewData['title'] = 'Register Case - CCMS';
        $viewData['courts'] = Court::all();
        $viewData['case'] = CaseModel::all();
        $viewData['case_type'] = CaseType::all();
        $viewData['clients'] = $clientId ? ([Person::findOrFail($clientId)]) : (Person::all());
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
        // CaseModel::validate($request);
        $case = new CaseModel();
        $case->court_id = $request->court_id;
        $case->case_number =$case->getCaseNumber();
        $case->cause_of_action = $request->cause_of_action;
        $case->case_status = 0;
        $case->case_type_id = $request->case_type_id;
        $case->start_date = date('Y-m-d');
        
        // create party and courtStaff automatically
        // dd($request->person_id);//client ID = $request->person_id
        // users registering case should be memebres of the court.
        $party = new Party();
        $party->person_id = $request->person_id;
        $party->case_id = 1;
        $party->party_type_id = $request->party_type_id;
        


        $det = Auth::user()->id;
        dd($det);

        //$case->end_date = $request->end_date;
        // $case->save();
        // register current user as his role/Detective for the case
        dd($request->person_id);
        $party = new Party();
        $party->person_id = $request->person_id;
        $party->case_id = $case->id;
        $person = Person::get()->where('id',Auth::user()->person_id)->first();
        $staffProfile = CourtStaff::get()->where(['person_id' => $person->id])->first();
        dd($staffProfile);

        notify()->success('Case Created Successfully', 'Creation Success');
        return redirect()->route('case.index');

        // kjhfkh
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id

     */
    public function show($id)
    {
        $case = CaseModel::findOrFail($id);
        $viewData['title'] = 'Case Page - Case Detail - CCMS';
        $viewData['subtitle'] = "Case Detail: " . $case->getDetail();
        $viewData['case'] = $case;
        return view('case.detail')->with('viewData', $viewData);
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
        // CaseModel::validate($request);
        $case = CaseModel::findOrFail($id);
        // $case->case_number = $request->case_number;
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
        
    }
}
