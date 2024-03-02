<?php

namespace App\Http\Controllers;

use App\Models\Case_Staff_Assignment;
use App\Models\CaseModel;
use App\Models\Document;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:document-list|document-create|document-edit|document-delete', ['only' => ['index', 'store', 'create', 'show', 'update', 'edit', 'destroy']]);
        $this->middleware('permission:document-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:document-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:document-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $viewData['title'] = 'MOD_CCMS';
        $viewData['subtitle'] = 'Lists Documents';
        $viewData['Document'] = Document::all();
        $dataProvider = new EloquentDataProvider(Document::query());

        return view('admin.Document.index', [
            'dataProvider' => $dataProvider,
            'viewData' => $viewData,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData['title'] = 'Admin Page - Documents - CCMS';
        $viewData['cases'] = CaseModel::all();
        $viewData['documentTypes'] = DocumentType::all();
        $viewData['csas'] = Case_Staff_Assignment::all();

        return view('admin.Document.create')->with('viewData', $viewData);
    }

    public function readUploadedFile(Request $request)
    {
        if ($request->doc_id) {
            $doc = Document::find($request->doc_id);

            return view('admin.document._partials.read_doc_content')->with('doc', $doc);
        } else {
            return "Invalid request";
        }
    }

    public function createPartial(Request $request)
    {
        $case = CaseModel::findOrFail($request->case_id);
        return view('admin.Document._partials._form')->with('case', $case);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        // $viewData['case'] = CaseModel::all();
        // $dataProvider = new EloquentDataProvider(Document::query());

        // Document::validate($request);
        $document = new Document();
        $document->case_id = $request->case_id;
        $document->csa_id = $request->csa_id;
        $document->document_type_id = $request->document_type_id;
        $document->date_filed = date('Y-m-d');
        $document->description = $request->description;
        $document->created_by = Auth::user()->id;
        $document->save();
        if ($request->hasFile('file')) {
            $imageName = $document->id . '_' . $request->file('file')->getFilename() . '_' . date('Y_m_d_h_i') . '.' . $request->file('file')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('file')->getRealPath())
            );
            $document->doc_storage_path = $imageName;
            $document->save();
        }
        notify()->success('Document registered Successfully', 'Creation Success');
        if (isset($request->pop_up)) {
            return 1;
        }
        return redirect()->route('admin.document.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::findOrFail($id);
        $viewData['title'] = 'Admin Page - Document Detail - CCMS';
        $viewData['subtitle'] = 'Document Detail: ' . $document->getDetail();
        $viewData['Document'] = $document;

        return view('admin.document.detail')->with('viewData', $viewData);
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
        $viewData['title'] = 'Admin Page - Edit Document Info - CCMS';
        $viewData['document'] = document::findOrFail($id);

        return view('admin.document.edit')->with('viewData', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Document::validate($request);
        $doc = Document::findOrFail($id);
        $doc->case_id = $request->case_id;
        $doc->csa_id = $request->csa_id;
        $doc->document_type_id = $request->document_type_id;
        $doc->date_filed = $request->date_filed;
        $doc->description = $request->description;
        $doc->doc_storage_path = $request->doc_storage_path;
        $doc->save();
        notify()->success('Document Updateted Successfully', 'Update Success');

        return redirect()->route('admin.document.index');
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

        Document::destroy($id);
        notify()->success('Document  Deleted Successfully', 'Delete Success');

        // return back();
        return redirect()->route('admin.document.index');

        //
    }
}
