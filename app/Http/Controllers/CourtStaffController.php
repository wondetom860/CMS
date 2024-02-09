<?php

namespace App\Http\Controllers;

use App\Models\Court;
use App\Models\CourtStaff;
use App\Models\Person;
use App\Models\Staffrole;
use Illuminate\Http\Request;

class CourtStaffController extends Controller
{
    //
    public function index()
    {
        $viewData['title'] = "staff role";
        $viewData['subtitle'] = "Lists staff role";
        $viewData['court_staff'] = CourtStaff::all();
        return view('admin.courtstaff.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData['title'] = 'Admin Page - staff - CCMS';
        $viewData['courts'] = Court::all();
        $viewData['person'] = Person::all();
        $viewData['staff_role'] = Staffrole::all();
        return view('admin.courtstaff.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CourtStaff::validate($request);
        $court_staff = new CourtStaff();
        $court_staff->id = $request->id;
        $court_staff->court_id= $request->court_id;
        $court_staff->person_id= $request->person_id;
        $court_staff->staff_role_id = $request->staff_role_id;
        $court_staff->save();
        notify()->success('Court Staff registered Successfully', 'Creation Success');
        return redirect()->route('admin.courtstaff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($id)
    {
        $viewData['court_staff'] = CourtStaff::find($id);
        $viewData['title'] = "Court Staff ";
        $viewData['subtitle'] = "Detail of Court Staff ";
        return view('admin.courtstaff.detail')->with('viewData', $viewData);
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
        $viewData['court_staff'] = CourtStaff::findOrFail($id);
        $viewData['courts'] = Court::all();
        $viewData['person'] = Person::all();
        $viewData['staffrole'] = Staffrole::all();
        return view('admin.courtstaff.edit')->with('viewData', $viewData);
       
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

         CourtStaff::validate($request);
         $CourtStaff = CourtStaff::findOrFail($id);
         $CourtStaff->court->name = $request->name;
         $CourtStaff->person->person_id = $request->person_id;
         $CourtStaff->staff_role_id = $request->staff_role_id;
         $CourtStaff->save();
         notify()->success('Court Staff Updateted Successfully', 'Update Success');
         return redirect()->route('admin.courtstaff.index');
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
    public function delete($id)
    {
        CourtStaff::destroy($id);
        notify()->success('Product Deleted Successfully', 'Delete Success');
        return back();
    }

    
}
