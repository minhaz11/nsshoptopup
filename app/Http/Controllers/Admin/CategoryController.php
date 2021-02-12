<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {
        $title = 'Categories';
        $categories = Category::latest()->paginate(15);
        return view('admin.category.categories',compact('title','categories'));
    }

    public function store(Request $request, $id = null)
    {
        
        $request->validate([
            'name' => "required",
        ]);

        if($id==null){
            $category = Category::firstOrNew(['created_at'=>now()]);
            $msg = 'Category added successfully';
         } else {
            $category = Category::firstOrNew(['id'=>$id]);
            $msg = 'Category updated successfully';
         }

         $category->name = $request->name;
         $category->status = $request->status ? 1 : 0;
         $category->save();

        return back()->with('success',$msg);
    }
}
