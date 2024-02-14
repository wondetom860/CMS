<?php


namespace App\Http\Controllers;

use App\Models\Case_Staff_Assignment;
use App\Models\CaseModel;
use App\Models\Document;
use App\Models\DocumentType;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
        /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     */
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
        $document = new Document();
        $document->case_id = $request->case_id;
        $document->csa_id = $request->csa_id;
        $document->document_type_id = $request->document_type_id;
        $document->date_filed = date("Y-m-d");
        $document->description = $request->description;
        // $Document->doc_storage_path = $request->doc_storage_path;
        $document->save();
        if ($request->hasFile('file')) {
            $imageName = $document->id . '_' . $request->file('file')->getFilename() . "_" . date('Y_m_d_h_i') . "." . $request->file('file')->extension();
            Storage::disk('public')->put(
                $imageName, 
                file_get_contents($request->file('file')->getRealPath())
            );
            $document->doc_storage_path = $imageName;
            $document->save();
        }
        notify()->success('Document registered Successfully', 'Creation Success');
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
