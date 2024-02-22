<?php

namespace App\Http\Controllers;

use App\Models\PartyType;
use App\Models\Party;
use App\Models\Person;
use App\Models\CaseModel;
use Itstructure\GridView\DataProviders\EloquentDataProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartyController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:party-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:party-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:party-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:party-delete', ['only' => ['destroy']]);
        $this->middleware('permission:party-detail', ['only' => ['show']]);
    }
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
        $viewData['title'] = 'Dashborad - parties - CCMS';
        $viewData['parttype'] = PartyType::all();
        $viewData['person'] = Person::getAllClients();
        $viewData['cases'] = CaseModel::all();
        $viewData['client_registration'] = 1;
        return view('admin.party.create')->with('viewData', $viewData);
    }


    public function createPartial(Request $request)
    {
        // dd($request->case_id);
        $viewData['title'] = 'Dashborad - Register Parties - CCMS';
        $viewData['parttype'] = PartyType::all();
        $viewData['case'] = CaseModel::findOrFail($request->case_id);
        $viewData['client_registration'] = 1;
        return view('admin.party._create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        // Party::validate($request);
        $case = CaseModel::findOrFail($request->case_id);        
        $person = new Person();
        $person->court_id = $case->court_id;
        $person->first_name = ucfirst(strtolower($request->first_name));
        $person->fath_name = ucfirst(strtolower($request->fath_name));
        // $person->fat_name = $request->fat_name;
        $person->gfath_name = ucfirst(strtolower($request->gfath_name));
        $person->dob = strtotime($request->dob);
        $person->id_number = $request->id_number;
        $person->gender = $request->gender;
        if ($person->checkIfExists()) {
            if ($request->client_registration) {
                return "Such record already exists";
            }
            notify()->error('Such profile inforamtion alredy exists', 'Creation failed');
            return redirect()->route('case.detail', ['id' => $case->id]);
        }
        if ($person->save()) {
            $party = new Party();
            $party->case_id = $case->id;
            $party->person_id = $person->id;
            $party->party_type_id = $request->party_type_id;
            if ($party->save()) {
                notify()->success('Party registration successfull.', 'Creation success');
                if ($request->client_registration) {
                    return 1;
                } else {
                    notify()->error('Party registration failed', 'Creation failed');
                    return redirect()->route('case.detail', ['id' => $request->case_id]);
                }
            }
        }
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
        $viewData['title'] = 'Dashborad - Edit staffrole - CCMS';
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
