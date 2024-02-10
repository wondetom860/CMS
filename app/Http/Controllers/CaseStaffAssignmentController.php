<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\case_staff_assignment;
use App\Models\Caset;

class CaseStaffAssignmentController extends Controller



{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData['title'] = "Case Assignment";
        $viewData['subtitle'] = "Lists of cases Assigned";
        $viewData['case_staff_assignment'] = case_staff_assignment::all();
        return view('admin.Case_staff_assignments.index')->with('viewData', $viewData);
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
        $viewData['innerTitle']= "Assign The Case";
        // $viewData['case_staff_assignment'] = case_staff_assignment::all();
        return view('admin.case_staff_assignments.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    public function store(Request $request)
    {
        Case_staff_assignment::validate($request);
        $case_staff_assignment = new Case_staff_assignment();
        $case_staff_assignment->case_id = $request->case_id;
        $case_staff_assignment->court_staff_id = $request->court_staff_id;
        $case_staff_assignment->assigned_as = $request->assigned_as;
        $case_staff_assignment->assigned_by = $request->assigned_by;
        $case_staff_assignment->assigned_at = $request->assigned_at;
        // $case_staff_assignment->updated_at = $request->updated_at;
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
        $viewData['subtitle'] = "Course Detail: ".$case->$id;
        $viewData['case_staff_assignment'] = $case;
        return view('admin.case_staff_assignments.show')->with('viewData', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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