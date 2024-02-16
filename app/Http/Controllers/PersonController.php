<?php

namespace App\Http\Controllers;

use App\Models\Court;
use App\Models\User;
// use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Person;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PersonController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:person-list|person-create|person-edit|person-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:person-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:person-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:person-delete', ['only' => ['destroy']]);
    }
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
        $caseTypes->court_id = $request->court_id;
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

    public function signUp(Request $request)
    {
        $user = new User();
        $user->user_name = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->person_id = intval($request->person_id);
        $user->phone = $request->phone;

        $user->assignRole('Client');

        if ($user->save()) {
            return 1;
        } else {
            return "signup failed";
        }
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
        $viewData['title'] = 'Admin Page - Update Person Info - CCMS';
        $viewData['courts'] = Court::all();
        $viewData['person'] = Person::findOrFail($id);
        return view('admin.person.edit')->with('viewData', $viewData);
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
        // Person::validate($request);
        $profile = Person::findOrFail($id);
        // $profile->court_id = $request->court_id;
        $profile->first_name = ucfirst(strtolower($request->first_name));
        $profile->fath_name = ucfirst(strtolower($request->fath_name));
        // $profile->fat_name = $request->fat_name;
        $profile->gfath_name = ucfirst(strtolower($request->gfath_name));
        $profile->dob = strtotime($request->dob);
        $profile->id_number = $request->id_number;
        $profile->gender = $request->gender;
        $profile->save();
        notify()->success('Person Information Updated Successfully', 'Update Success');
        return redirect()->route('admin.person.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     */
    public function destroy($id)
    {
        Person::find($id)->delete();
            return redirect()->route('admin.person.index')
                ->with('success', 'person deleted successfully');
    }

    public function findPerson(Request $request)
    {
        // $person = ;
        return json_encode(DB::table('persons')->where('id_number', $request->personId)->first());
    }
}
