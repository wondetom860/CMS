<?php

namespace App\Http\Controllers;

use App\Models\Court;
use App\Models\CourtStaff;
use App\Models\Staffrole;
use App\Models\User;
// use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Person;
// use App\Models\Role;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class PersonController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:profile-list|profile-create|profile-edit|profile-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:profile-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:profile-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:profile-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        // $people = ;
        $viewData['person'] = Person::all();
        $viewData['title'] = "MOD - CCMS";
        $viewData['subtitle'] = "Person Information";
        $dataProvider = new EloquentDataProvider(Person::query());
        return view('admin.person.index', [
            'dataProvider' => $dataProvider,
            'viewData' => $viewData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response |\Illuminate\Contracts\View\View
     */
    public function create($client_registration = null)
    {
        $viewData['title'] = 'Admin Page - Register a Person Information - CCMS';
        $viewData['courts'] = Court::all();
        $viewData['staffrole'] = Staffrole::all();
        $viewData['client_registration'] = $client_registration;
        return view('admin.person.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {

        // dd($request->role_id);
        // Person::validate($request);
        $person = new Person();
        $person->court_id = $request->court_id;
        $person->first_name = ucfirst(strtolower($request->first_name));
        $person->fath_name = ucfirst(strtolower($request->fath_name));
        // $person->fat_name = $request->fat_name;
        $person->gfath_name = ucfirst(strtolower($request->gfath_name));
        $person->dob = strtotime($request->dob);
        $person->id_number = $request->id_number;
        $person->gender = $request->gender;
        if($person->checkIfExists()){
            notify()->error('Such profile inforamtion alredy exists', 'Creation failed');
            return redirect()->route('admin.person.index');
        }
        if($request->client_registration){
            $person->save();
            return $person->id;
        }
        if ($person->save()) {
            // auto register court_staff
            $courtStaff = new CourtStaff();
            $courtStaff->person_id = $person->id;
            $courtStaff->court_id = $person->court_id;
            $courtStaff->staff_role_id = $request->role_id;

            if ($courtStaff->save()) {
                notify()->success('Person Information Registered Successfully', 'Creation Success');
                return redirect()->route('admin.person.index');
            }
        } 
    }

    public function signUp(Request $request)
    {
        $user = new User();
        $user->user_name = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->person_id = intval($request->person_id);
        $user->phone = $request->phone;

        if ($user->save()) {
            $courtStaff = CourtStaff::where(['person_id' => $user->person_id])->first();
            if ($courtStaff) {
                $role = $courtStaff->staffRole->role_name;
            } else {
                $role = 'Client';
            }

            $RR = Role::where(['name' => $role])->first();
            if ($RR) {

            } else {
                Role::create(['name' => $role]);
            }
            $user->assignRole($role);
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
