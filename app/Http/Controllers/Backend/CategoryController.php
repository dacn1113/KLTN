<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
    //
    public function CategoryView()
    {
        $categorys = Category::latest()->get();
        return view('Backend.category.category_view', compact('categorys'));
    }

    public function CategoryStore(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_hin' => 'required',
            'category_icon' => 'required'
        ], [
            'category_name_en.required' => 'Input Category English Name',
            'category_name_hin.required' => 'Input Category Hindi Name'
        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_slug_en)),
            'category_slug_hin' => str_replace(' ', '-', $request->category_slug_hin),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Category Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function CategoryEdit($id)
    {
        $categorys = Category::findOrFail($id);
        return view('Backend.category.category_edit', compact('categorys'));
    }

    public function CategoryUpdate(Request $request, $id)
    {

        Category::findOrFail($id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' =>  $request->category_name_en,
            'category_slug_hin' => $request->category_name_hin,
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.category')->with($notification);
    }

    public function CategoryDelete($id)
    {
        $categorys = Category::findOrFail($id);
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}