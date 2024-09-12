<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('dashboard.category.index',compact('categories'));
    }

    public function store(Request $request){
        $manager = new ImageManager(new Driver());
        $request->validate([
            'title' => 'required',
            'image' => 'required|image',
        ]);

        if($request->hasfile('image')){
            $newname = auth()->id().'-'.Str::random(6).'.'.$request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'));
            $image->toPng()->save(base_path('public/uploads/category/'.$newname));

            if($request->slug){
                Category::insert([
                    'title' => Str::ucfirst($request->title),
                    'slug' => Str::slug($request->slug,'-'),
                    'image' => $newname,
                    'created_at' => now(),
                ]);

                return back()->with('cat_success' , "Category Create Successfull");
            }else{
                Category::insert([
                    'title' => Str::ucfirst($request->title),
                    'slug' => Str::slug($request->title,'-'),
                    'image' => $newname,
                    'created_at' => now(),
                ]);
                return back()->with('cat_success' , "Category Create Successfull");
            }


        }else{
            return back()->withErrors(['image' => 'image field is must required!'])->withInput();
        }
    }
}
