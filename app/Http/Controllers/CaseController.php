<?php

namespace App\Http\Controllers;

use App\Models\Case_Staff_Assignment;
use App\Models\CaseModel;
use App\Models\CaseType;
use App\Models\Court;
use App\Models\CourtStaff;
use App\Models\Party;
use App\Models\PartyType;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class CaseController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:case-list|case-create|case-edit|case-delete', ['only' => ['index', 'store']]);
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
                ->withAggregate('court', 'name')
                ->withAggregate('caseType', 'case_type_name')
        );
        return view('case.index', [
            'dataProvider' => $dataProvider,
            'viewData' => $viewData
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     */
    public function create($clientId = null)
    {
        $courtStaff = CourtStaff::where(['person_id' => Auth::user()->person_id])->first();
        if ($courtStaff) {
            $viewData['title'] = 'Register Case - CCMS';
            $viewData['courts'] = Court::all();
            $viewData['case'] = CaseModel::all();
            $viewData['case_type'] = CaseType::all();
            $viewData['partyType'] = PartyType::all();
            $viewData['courtStaff'] = $courtStaff;
            $viewData['clients'] = $clientId ? ([Person::findOrFail($clientId)]) : (Person::all());
            return view('case.create')->with('viewData', $viewData);
        } else {
            return view('error')
                ->with('title', 'Access not allowed')
                ->with('message', 'Case registration is allowed only for court staff.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        // CaseModel::validate($request);
        $courtStaff = CourtStaff::where(['person_id' => Auth::user()->person_id])->first();
        if ($courtStaff) {
            $case = new CaseModel();
            $case->court_id = $request->court_id;
            $case->case_number = $case->getCaseNumber();
            $case->cause_of_action = $request->cause_of_action;
            $case->case_status = 0;
            $case->case_type_id = $request->case_type_id;
            $case->start_date = date('Y-m-d');

            if ($case->save()) {
                // users registering case should be memebres of the court.
                $party = new Party();
                $party->person_id = $request->person_id;
                $party->case_id = $case->id;
                $party->party_type_id = $request->party_type_id;

                $party->save();

                $csa = new Case_Staff_Assignment();
                $csa->court_staff_id = $courtStaff->id;
                $csa->assigned_as = $courtStaff->staffRole->role_name;
                $csa->case_id = $case->id;
                $csa->assigned_at = $case->start_date;
                $csa->assigned_by = Auth::user()->id;

                $csa->save();

                notify()->success('Case Registered Successfully', 'Creation Success');
                return redirect()->route('case.index');
            }else{
                notify()->error('Case Registering failed', 'Creation Failed');
                return redirect()->route('case.create');
            }
        } else {
            return view('error')
                ->with('title', 'Access not allowed')
                ->with('message', 'Case registration is allowed only for court staff.');
        }
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
