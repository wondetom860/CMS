<?php

namespace App\Http\Controllers;

use App\Models\Court;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $people = ;
        $viewData['person'] = Person::all();
        $viewData['title'] = "MOD - CCMS";
        $viewData['subtitle'] = "Person Information";
        return view('admin.person.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $viewData['title'] = 'Admin Page - Register a Person Information - CCMS';
        // $courts = 
        $viewData['courts'] = Court::all();
        return view('admin.person.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Person::validate($request);
        $caseTypes = new Person();
        // $caseTypes->court_id = $request->court_id;
        $caseTypes->first_name = ucfirst(strtolower($request->first_name));
        $caseTypes->fath_name = ucfirst(strtolower($request->fath_name));
        // $caseTypes->fat_name = $request->fat_name;
        $caseTypes->gfath_name = ucfirst(strtolower($request->gfath_name));
        $caseTypes->dob = strtotime($request->dob);
        $caseTypes->id_number = $request->id_number;
        $caseTypes->gender = $request->gender;
        $caseTypes->save();
        notify()->success('Person Information Registered Successfully', 'Creation Success');
        return redirect()->route('admin.person.index');
    }

    public function signUp(Request $request){
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response |\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $product = Person::find($id); //findOrFail
        if (is_null($product)) {
            return view('error')
                ->with('title', 'Person Information not found')
                ->with('message', 'Such person record does NOT exist');
        }
        $viewData['person'] = Person::find($id);
        $viewData['title'] = "MOD - CCMS";
        $viewData['subtitle'] = "Person Information";
        return view('admin.person.detail')->with('viewData', $viewData);
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
