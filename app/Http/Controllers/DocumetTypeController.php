<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use App\Models\EventType;
use Illuminate\Http\Request;

class DocumetTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData['document_type'] = DocumentType::all();
        $viewData['title'] = "MOD - CCMS";
        $viewData['subtitle'] = "Document Types";
        return view('admin.document-type.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData['title'] = 'Admin Page - Document Types - CCMS';
        return view('admin.document-type.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DocumentType::validate($request);
        $docTypes = new DocumentType();
        $docTypes->doc_type_name = $request->doc_type_name;
        $docTypes->description = $request->description;
        $docTypes->save();
        notify()->success('Documet Type Created Successfully', 'Creation Success');
        return redirect()->route('admin.document_type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docType = DocumentType::findOrFail($id);
        $viewData['title'] = 'Admin Page - Document Type Detail - CCMS';
        $viewData['subtitle'] = "Document Type Detail: ";
        $viewData['docType'] = $docType;
        return view('admin.document_type.detail')->with('viewData', $viewData);
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
        $viewData['title'] = 'Admin Page - Edit Document Type Info - CCMS';
        $viewData['documentType'] = DocumentType::findOrFail($id);
        return view('admin.document-type.edit')->with('viewData', $viewData);
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
        DocumentType::validate($request);
        $docType = DocumentType::findOrFail($id);
        $docType->doc_type_name = $request->doc_type_name;
        $docType->description = $request->description;
        $docType->save();
        notify()->success('Document Type Updateted Successfully', 'Update Success');
        return redirect()->route('admin.document_type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DocumentType::destroy($id);
        notify()->success('Document Type Deleted Successfully', 'Delete Success');
        // return back();
        return redirect()->route('admin.document_type.index');
    }
}
