<?php


namespace App\Http\Controllers;

use App\Models\Case_Staff_Assignment;
use App\Models\CaseModel;
use App\Models\Document;
use App\Models\DocumentType;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

use Illuminate\Http\Request;


class DocumentController extends Controller
{
    function __construct()
{   $this->middleware('permission:document-list|document-create|document-edit|document-delete', ['only' => ['index', 'store','create', 'show','update', 'edit','destroy']]);
        $this->middleware('permission:document-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:document-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:document-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $viewData['title'] = "MOD_CCMS";
        $viewData['subtitle'] = "Lists Documents";
        $viewData['Document'] = Document::all();
        $dataProvider = new EloquentDataProvider(Document::query());
        return view('admin.Document.index', [
            'dataProvider' => $dataProvider,
            'viewData' => $viewData
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $viewData['case'] = CaseModel::all();
        // $dataProvider = new EloquentDataProvider(Document::query());

        Document::validate($request);
        $Document = new Document();
        $Document->case_id = $request->case_id;
        $Document->csa_id = $request->csa_id;
        $Document->document_type_id = $request->document_type_id;
        $Document->date_filed = date("Y-m-d");
        $Document->description = $request->description;
        // $Document->doc_storage_path = $request->doc_storage_path;
        $Document->save();
        notify()->success('Document registered Successfully', 'Creation Success');
        return redirect()->route('admin.document.store');
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
        $viewData['subtitle'] = "Document Detail: " . $document->getDetail();
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
     * @param  \Illuminate\Http\Request  $request
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
