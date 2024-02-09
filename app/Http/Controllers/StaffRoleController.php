<?php

namespace App\Http\Controllers;

use App\Models\Staffrole;
use Illuminate\Http\Request;

class StaffRoleController extends Controller
{
    //

    public function index()
    {
        $viewData['title'] = "staff role";
        $viewData['subtitle'] = "Lists staff role";
        $viewData['staff_role'] = Staffrole::all();
        return view('admin.staffrole.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData['title'] = 'Admin Page - staff - CCMS';
        
        return view('admin.staffrole.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Staffrole::validate($request);
        $staff_role = new Staffrole();
        $staff_role->id = $request->id;
        $staff_role->role_name= $request->role_name;
        $staff_role->rank= $request->rank;
        $staff_role->description = $request->description;
        $staff_role->save();
        notify()->success('staffrole registered Successfully', 'Creation Success');
        return redirect()->route('admin.staffrole.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($id)
    {
        $viewData['staff_role'] = Staffrole::find($id);
        $viewData['title'] = "Staff Role";
        $viewData['subtitle'] = "Detail of Staff Role";
        return view('admin.staffrole.detail')->with('viewData', $viewData);
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
        $viewData['staffrole'] = Staffrole::findOrFail($id);
        return view('admin.staffrole.edit')->with('viewData', $viewData);
       
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

         Staffrole::validate($request);
         $Staffrole = Staffrole::findOrFail($id);
         $Staffrole->role_name = $request->role_name;
         $Staffrole->rank = $request->rank;
         $Staffrole->description = $request->description;
         $Staffrole->save();
         notify()->success('Product Updateted Successfully', 'Update Success');
         return redirect()->route('admin.staffrole.index');
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
        Staffrole::destroy($id);
        notify()->success('Product Deleted Successfully', 'Delete Success');
        return back();
    }

}
