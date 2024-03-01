<?php

namespace App\Http\Controllers;

use App\Models\CaseArchive;
use App\Models\CaseModel;
use App\Models\event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class CaseArchiveController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:archive-list|archive-create|archive-edit|archive-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:archive-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:archive-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:archive-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $viewData['title'] = "Case Archives";
        $viewData['subtitle'] = "case_archives";
        $viewData['event'] = CaseArchive::all();
        $dataProvider = new EloquentDataProvider(CaseArchive::query());
        return view('admin.case_archive.index', [
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

        $viewData['title'] = ' Case Archives - CCMS';
        $viewData['cases'] = CaseModel::all();
        $viewData['events'] = event::all();
        return view('admin.case_archive.create')->with('viewData', $viewData);
    }

    public function createPartial(Request $request)
    {
        $event =event::findOrFail($request->event_id);
        $viewData['case'] = $event->case;
        $viewData['event'] =$event;
        return view('admin.case_archive._partials._form')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // CaseArchive::validate($request);
        $archive = new CaseArchive();
        $archive->case_id = $request->case_id;
        $archive->event_id = $request->event_id;
        $archive->description = $request->description;
        $archive->remark = $request->remark;
        $archive->date_archived = date("Y-m-d H:i:s");
        $archive->archived_by = Auth::user()->id;
        $archive->save();
        if ($request->hasFile('file')) {
            $ext = $request->file('file')->extension();
            $ft = $archive->getFileType('.'.strtoupper($ext));
            if ($ft) {
                $archive->file_type = $ft;
            } else {
                return "UnSupported File Type";
            }

            $path = $archive->id . '_' . $request->file('file')->getFilename() . '_' . date('Y_m_d_h_i') . '.' . $request->file('file')->extension();
            Storage::disk('public')->put(
                $path,
                file_get_contents($request->file('file')->getRealPath())
            );
            $archive->file_path = $path;
            $archive->save();
        }
        notify()->success('Case Archive registered Successfully', 'Creation Success');
        if (isset($request->pop_up)) {
            return redirect()->route('case.show',['id' => $archive->case_id]);
        }
        return redirect()->route('admin.case_archive.index');
        // notify()->success('Case Archive registered Successfully', 'Creation Success');
        // return redirect()->route('admin.case_archive.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
