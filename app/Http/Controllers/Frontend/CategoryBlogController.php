<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryBlogController extends Controller
{
    public function show($slug){
        $category = Category::where('slug',$slug)->first();
        $blogs = Blog::where('category_id',$category->id)->paginate(1);

        return view('frontend.category.index',[
           'blogs' =>  $blogs,
           'category' => $category,
        ]);
    }
}
