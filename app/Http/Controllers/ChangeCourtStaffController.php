<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourtStaff;
use App\Models\ChangeCourtStaff;
use App\Models\Case_Staff_Assignment;
use Illuminate\Support\Facades\Auth;
class ChangeCourtStaffController extends Controller
{
    public function index()
    {
        // $viewData=Case_Staff_Assignment::all();
        // $viewData=CourtStaff::all();
        $viewData['title'] = "Case Assignment";
        $viewData['subtitle'] = "Lists of cases Assigned";
        $viewData['changes'] = ChangeCourtStaff::all();
        return view('admin.change_court_staff.index')->with('viewData', $viewData);
    }

    public function create()
    {
        
        $viewData['cass'] = case_staff_assignment::query()
            ->join('court_staff', 'court_staff.id', '=', 'case_staff_assignment.court_staff_id')
            ->where('court_staff.person_id', Auth::user()->person_id)->get();

        // $viewData['court_staf'] = CourtStaff::all();
        $viewData['title'] = "Change Case staff assignemnt";
        $viewData['subtitle'] = "Change Staff Assignment";
        return view('admin.change_court_staff.create')->with('viewData', $viewData);
        // return view('admin.change_court_staff.create');
    }

    public function store(Request $request)
    {
        $changes = new ChangeCourtStaff();
        $changes->csa_id = $request->csa_id;
        $changes->termination_reason = $request->termination_reason;
        $changes->requested_by = Auth::user()->id;
        $changes->requested_at = $changes->requestd_at  = date("Y-m-d");
        // if ($changes->checkIfAssigned()) {
        //     notify()->error('Court Staff id already assigned to this case', 'record creation failed');
        //     return redirect()->route('admin.case_staff_assignments.index');
        // }
        $changes->save();
        notify()->success('Request generated Successfully', 'Creation Success');
        return redirect()->route('admin.change_court_staff.index');
    
        // return redirect()->route('admin.change_court_staff.index')->with('success', 'Change Court Staff created successfully.');
    
    }
    public function show($id)
    {
        $change = ChangeCourtStaff::find($id);
        $viewData['title'] = "Case Assignment";
        $viewData['subtitle'] = "detail of cases Assigned". $change->$id;
        // $viewData['changes'] = ChangeCourtStaff::all();
        
        // $viewData['subtitle'] = "Course Detail: " ;
        return view('admin.change_court_staff.show')->with('viewData', $viewData);
        
        // return view('admin.change_court_staff.show', compact('change'));
    }

    public function edit($id)
    {
        $change = ChangeCourtStaff::findOrFail($id);
        return view('change_court_staff.edit', compact('change'));
    }

    public function update(Request $request, $id)
    {
        $change = ChangeCourtStaff::findOrFail($id);
        $change->update($request->all());
        return redirect()->route('change_court_staff.index')->with('success', 'Change Court Staff updated successfully.');
    }

    public function destroy($id)
    {
        $change = ChangeCourtStaff::findOrFail($id);
        $change->delete();
        return redirect()->route('change_court_staff.index')->with('success', 'Change Court Staff deleted successfully.');
    }


//     public function index()
//     {
//         $changeCourtStaffs = ChangeCourtStaff::all();
//         $changeCourtStaffs = case_staff_assignment::all();
//         return view('admin.change_court_staff.index', compact('changeCourtStaffs'));
//     }

//     public function create()
//     {
//         // Return view for creating new Change Court Staff record
//         return view('admin.change_court_staff.create');
//     }

//     public function store(Request $request)
//     {
//         // Logic to store new Change Court Staff record
//     }

//     public function edit($id)
//     {
//         $changeCourtStaff = ChangeCourtStaff::findOrFail($id);
//         return view('admin.change_court_staff.edit', compact('changeCourtStaff'));
//     }

//     public function update(Request $request, $id)
//     {
//         // Logic to update existing Change Court Staff record
//     }

//     public function show($id)
//     {
//         $changeCourtStaff = ChangeCourtStaff::findOrFail($id);
//         return view('admin.change_court_staff.show', compact('changeCourtStaff'));
//     } //
}
