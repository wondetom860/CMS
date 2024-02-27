<?php

namespace App\Http\Controllers;

use App\Models\Staffrole;
use Illuminate\Http\Request;
use App\Models\case_staff_assignment;
use App\Models\CaseModel;
use App\Models\Caset;
use App\Models\CourtStaff;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class CaseStaffAssignmentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:case-staff-assignment-list|case-staff-assignment-create|case-staff-assignment-edit|case-staff-assignment-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:case-staff-assignment-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:case-staff-assignment-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:case-staff-assignment-delete', ['only' => ['destroy']]);
        $this->middleware('permission:case-staff-assignment-detail', ['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {
        $viewData['title'] = "Case Assignment";
        $viewData['subtitle'] = "Lists of cases Assigned";
        $viewData['case_staff_assignment'] = case_staff_assignment::all();
        $dataProvider = new EloquentDataProvider(Case_Staff_Assignment::query());
        return view('admin.case_staff_assignments.index', [
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
        $viewData['title'] = 'Add-case to staff-assignment - CCMS';
        $viewData['subtitle'] = "Assign The Case to Staff";
        $viewData['innerTitle'] = "Assign The Case";
        // $viewData['case_staff_assignment'] = case_staff_assignment::all();
        $viewData['cases'] = CaseModel::all();
        $viewData['court_staffs'] = CourtStaff::all();
        return view('admin.case_staff_assignments.create')->with('viewData', $viewData);
    }


    public function createPartial(Request $request)
    {
        $viewData['case'] = CaseModel::findOrFail($request->case_id);
        $viewData['court_staff'] = CaseModel::getUnAssignedStaff($request->case_id);
        return view('admin.case_staff_assignments._partials._form')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        // $request->assign_as = ;
        // Case_staff_assignment::validate($request);
        $case_staff_assignment = new Case_staff_assignment();
        $case_staff_assignment->case_id = $request->case_id;
        $case_staff_assignment->court_staff_id = $request->court_staff_id;
        $case_staff_assignment->assigned_as = $case_staff_assignment->courtStaff->staffrole->role_name;
        $case_staff_assignment->assigned_by = Auth::user()->id;
        $case_staff_assignment->assigned_at = date("Y-m-d");
        // $case_staff_assignment->updated_at = $request->updated_at;
        if ($case_staff_assignment->checkIfAssigned()) {
            notify()->error('Court Staff id already assigned to this case', 'record creation failed');
            return redirect()->route('admin.case_staff_assignments.index');
        }
        $case_staff_assignment->save();
        notify()->success('Case is Assigned Successfully', 'Creation Success');
        return redirect()->route('admin.case_staff_assignments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function show($id)
    {
        $case = Case_staff_assignment::find($id);
        $viewData['title'] = ' Case Staff Assignment-MOD-CMS';
        $viewData['subtitle'] = "Course Detail: " . $case->$id;
        $viewData['case_staff_assignment'] = $case;
        return view('admin.case_staff_assignments.detail')->with('viewData', $viewData);
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
        $viewData['cases'] = CaseModel::all();
        $viewData['court_staffs'] = CourtStaff::all();
        $viewData['case_staff_assignment'] = Case_staff_assignment::findOrFail($id);
        $viewData['staff_roles'] = Staffrole::all();
        return view('admin.case_staff_assignments.edit')->with('viewData', $viewData);
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
        $case_staff_assignment = Case_staff_assignment::findOrFail($id);
        // $case->case_number = $request->case_number;
        $case_staff_assignment->case_id = $request->case_id;
        $case_staff_assignment->court_staff_id = $request->court_staff_id;
        $case_staff_assignment->assigned_as = $case_staff_assignment->courtStaff->staffrole->role_name;
        $case_staff_assignment->assigned_by = Auth::user()->id;
        $case_staff_assignment->assigned_at = date("Y-m-d");
        $case_staff_assignment->save();
        notify()->success('Case_staff_assignment Updateted Successfully', 'Update Success');
        return redirect()->route('admin.case_staff_assignments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * 
     */
    public function delete($id)
    {
        //CaseModel::delete($id);
        if (case_staff_assignment::destroy($id)) {
            notify()->success('Case Assignment Deleted Successfully', 'Delete Success');
            return back();
        } else {
            notify()->error('Case Assignment Deleted Error', 'Delete Error');
            return back();
        }
    }
}

























/*{
    // Method to list all CaseStaffAssignments
    public function index()
    {
        $assignments = Case_Staff_Assignment::all();
        return view('admin.case_staff_assignment.index', ['assignments' => $assignments]);
    }

    // Method to show details of a specific CaseStaffAssignment
    public function show($id)
    {
        $assignment = Case_Staff_Assignment::findOrFail($id);
        return view('admin.case_staff_assignment.show', ['assignment' => $assignment]);
    }

    // Method to show form for creating a new CaseStaffAssignment
    public function create()
    {
        // You may need additional logic here depending on your requirements
        return view('admin.case_staff_assignment.create');
    }

    // Method to store a newly created CaseStaffAssignment
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'case_id' => 'required',
            'court_staff_id' => 'required',
            'assigned_as' => 'required',
            // Add more validation rules as needed
        ]);

        // Create new CaseStaffAssignment
        $assignment = Case_Staff_Assignment::create($validatedData);

        // Redirect to index or show page
        return redirect()->route('admin.case_staff_assignment.index');
    }

    // Method to show form for editing a CaseStaffAssignment
    public function edit($id)
    {
        $assignment = Case_Staff_Assignment::findOrFail($id);
        return view('admin.case_staff_assignment.edit', ['assignment' => $assignment]);
    }

    // Method to update an existing CaseStaffAssignment
    public function update(Request $request, $id)
    {
        // Validate input
        $validatedData = $request->validate([
            'case_id' => 'required',
            'court_staff_id' => 'required',
            'assigned_as' => 'required',
            // Add more validation rules as needed
        ]);

        // Find and update the CaseStaffAssignment
        $assignment = Case_Staff_Assignment::findOrFail($id);
        $assignment->update($validatedData);

        // Redirect to index or show page
        return redirect()->route('admin.case_staff_assignment.index');
    }

    // Method to delete a CaseStaffAssignment
    public function destroy($id)
    {
        // Find and delete the CaseStaffAssignment
        $assignment = Case_Staff_Assignment::findOrFail($id);
        $assignment->delete();

        // Redirect to index page
        return redirect()->route('admin.case_staff_assignment.index');
    }

    // Method to get assigned case
    public function getAssignedCase($staffId)
    {
        // Logic to retrieve assigned cases for the given staffId
    }

    // Method to get assigned staff
    public function getAssignedStaff($caseId)
    {
        // Logic to retrieve assigned staff for the given caseId
    }

    // Method to get parties
    public function getParties($caseId)
    {
        // Logic to retrieve parties related to the given caseId
    }
}
*/