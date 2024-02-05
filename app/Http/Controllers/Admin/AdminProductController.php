<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData["title"] = "List Products - Admin - Online Store";
        $viewData["products"] = Product::all();
        return view('admin.products.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData['title'] = 'Admin Page - Products - Online Store';
        return view('admin.products.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::validate($request);
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = ("image");
        $product->save();
        if ($request->hasFile('image')) {
            $imageName = $product->id . '_' . $request->file('image')->getFilename() . "_" . date('Y_m_d_h_i') . "." . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName, 
                file_get_contents($request->file('image')->getRealPath())
            );
            $product->image = $imageName;
            $product->save();
        }
        notify()->success('Product Created Successfully', 'Creation Success');
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.products.detail')->with('product', $product);
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
        $viewData['title'] = 'Admin Page - Edit product - Online Store';
        $viewData['product'] = Product::findOrFail($id);
        return view('admin.products.edit')->with('viewData', $viewData);
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
        Product::validate($request);
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        // $product->image = ("image");
        // $product->save();
        if ($request->hasFile('image')) {
            $imageName = $product->id . '_' . $request->file('image')->getFilename() . "_" . date('Y_m_d_h_i') . "." . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName, 
                file_get_contents($request->file('image')->getRealPath())
            );
            $product->image = $imageName;
        }
        $product->save();
        notify()->success('Product Updateted Successfully', 'Update Success');
        return redirect()->route('admin.products.index');
    }

    public function delete($id)
    {
        Product::destroy($id);
        notify()->success('Product Deleted Successfully', 'Delete Success');
        return back();
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
