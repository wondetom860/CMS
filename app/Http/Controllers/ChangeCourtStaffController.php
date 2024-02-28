<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChangeCourtStaff;
class ChangeCourtStaffController extends Controller
{
    public function index()
    {
        $changeCourtStaffs = ChangeCourtStaff::all();
        return view('admin.change_court_staff.index', compact('changeCourtStaffs'));
    }

    public function create()
    {
        // Return view for creating new Change Court Staff record
        return view('admin.change_court_staff.create');
    }

    public function store(Request $request)
    {
        // Logic to store new Change Court Staff record
    }

    public function edit($id)
    {
        $changeCourtStaff = ChangeCourtStaff::findOrFail($id);
        return view('admin.change_court_staff.edit', compact('changeCourtStaff'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update existing Change Court Staff record
    }

    public function show($id)
    {
        $changeCourtStaff = ChangeCourtStaff::findOrFail($id);
        return view('admin.change_court_staff.show', compact('changeCourtStaff'));
    } //
}
