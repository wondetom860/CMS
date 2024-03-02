<?php

namespace App\Http\Controllers;

use App\Models\Case_Staff_Assignment;
use App\Models\CaseModel;
use App\Models\CourtStaff;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\LastStatment;
use App\Models\Party;
use App\Models\PartyType;
use App\Models\Person;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class LastStatmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:laststatment-list|laststatment-create|laststatment-edit|laststatment-delete', ['only' => ['index', 'store', 'create', 'show', 'update', 'edit', 'destroy']]);
        $this->middleware('permission:laststatment-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:laststatment-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:laststatment-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $viewData['title'] = 'MOD_CCMS';
        $viewData['subtitle'] = 'Lists of Lastststment';
        $viewData['Document'] = LastStatment::all();
        $dataProvider = new EloquentDataProvider(LastStatment::query());

        return view('admin.laststatment.index', [
            'dataProvider' => $dataProvider,
            'viewData' => $viewData,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courtStaff = CourtStaff::where(['person_id' => Auth::user()->person_id])->first();
        if ($courtStaff) {
            $viewData['title'] = 'Admin Page - Lastststment - CCMS';
            $viewData['cases'] = CaseModel::all();
            $viewData['documentTypes'] = DocumentType::all();
            $viewData['csas'] = Case_Staff_Assignment::all();
            // $viewData['courtStaff'] = $courtStaff;
            // $viewData['clients'] = $clientId ? ([Person::findOrFail($clientId)]) : (Person::all());
            return view('admin.laststatment.create')->with('viewData', $viewData);
        } else {
            return view('error')
                ->with('title', 'Access not allowed')
                ->with('message', 'Case registration is allowed only for court staff.');


        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $viewData['case'] = CaseModel::all();
        // $dataProvider = new EloquentDataProvider(Document::query());

        // LastStatment::validate($request);
        $laststatment = new LastStatment();
        $laststatment->case_id = $request->case_id;

        $judgesCSA = $laststatment->case->caseStaffAssignments()->where(['assigned_as' => 'JUDGE'])->get();

        if ($judgesCSA) {
            $laststatment->judges = json_encode($judgesCSA->pluck('id'));
        } else {
            return "Operation not allowed";
        }
        $laststatment->statement_description = $request->description;
        $laststatment->event_id = $request->event_id;
        $laststatment->accept_status = 0;
        $laststatment->remark = $request->remark;
        $laststatment->written_by = Auth::user()->id;
        $laststatment->date_time = date('Y-m-d');
        // $Document->doc_storage_path = $request->doc_storage_path;
        $laststatment->save();

        notify()->success('laststatment registered Successfully', 'Creation Success');

        return redirect()->route('admin.laststatment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laststatment = LastStatment::findOrFail($id);
        $viewData['party'] = Party::findOrFail($id);
        $viewData['parttype'] = PartyType::all();
        $viewData['person'] = Person::all();
        $viewData['cases'] = CaseModel::all();
        $viewData['title'] = 'Admin Page - Document Detail - CCMS';
        $viewData['subtitle'] = 'LastStatment Detail: ' . $laststatment->getDetail();
        $viewData['Document'] = $laststatment;

        return view('admin.laststatment.detail')->with('viewData', $viewData);
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
        $viewData['title'] = 'Dashborad - Edit Last Statment - CCMS';
        $viewData['Document'] = LastStatment::findOrFail($id);
        $viewData['party'] = Party::findOrFail($id);
        $viewData['parttype'] = PartyType::all();
        $viewData['person'] = Person::all();
        $viewData['cases'] = CaseModel::all();
        return view('admin.laststatment.edit')->with('viewData', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $laststatment = LastStatment::findOrFail($id);
        $laststatment->statement_description = $request->description;
        $laststatment->remark = $request->remark;
        $laststatment->save();
        notify()->success('LastStatment Updateted Successfully', 'Update Success');

        return redirect()->route('admin.laststatment.index');
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

        LastStatment::destroy($id);
        notify()->success('LastStatment  Deleted Successfully', 'Delete Success');

        // return back();
        return redirect()->route('admin.laststatment.index');

        //
    }
}
