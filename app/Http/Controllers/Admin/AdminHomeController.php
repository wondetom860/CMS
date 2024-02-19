<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:dashboard-view', ['only' => ['index']]);
    }

    public function index(){
        $viewData["title"] = "Admin Page - Admin";
        return view("admin.home.index")->with("viewData",$viewData);
    }

    
    public function listProducts(){
        
    }
}
