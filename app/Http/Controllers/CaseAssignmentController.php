<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaseAssignment;
use App\Models\StaffModel;
use App\Models\CaseModel;
class CaseAssignmentController extends Controller
{
    

    public function create()
    {
        $cases = CaseModel::all();
        $staffMembers = StaffModel::all();
        return view('admin.case-assignment.create', compact('cases', 'staffMembers'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'case_id' => 'required|exists:cases,id',
            'staff_id' => 'required|exists:staff,id',
        ]);

        // Create a new case assignment
        $caseAssignment = new CaseAssignment();
        $caseAssignment->case_id = $validatedData['case_id'];
        $caseAssignment->staff_id = $validatedData['staff_id'];
        $caseAssignment->assigned_at = now();
        //$caseAssignment->assigned_by = Auth::user()->name; // Assuming you have authentication set up

        // Save the assignment
        $caseAssignment->save();

        return redirect()->route('admin.assign-case.create')->with('success', 'Case assigned to staff successfully');
    }
}
//

