<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $categories = Category::where('status','active')->latest()->get();
        return view('frontend.home.index',[
            'categories' => $categories,
        ]);
    }

}
