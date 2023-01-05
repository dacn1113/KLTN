<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    public function BrandView()
    {
        $brands = Brand::latest()->get();
        return view('Backend.brand.brand_view', compact('brands'));
    }

    public function BrandStore(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_hin' => 'required',
            'brand_image' => 'required'
        ], [
            'brand_name_en.required' => 'Input Brand English Name',
            'brand_name_hin.required' => 'Input Brand Hindi Name'
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brand/' . $name_gen);
        $save_url = 'upload/brand/' . $name_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_hin' => $request->brand_name_hin,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_slug_en)),
            'brand_slug_hin' => str_replace(' ', '-', $request->brand_slug_hin),
            'brand_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Hồ sơ thương hiệu được cập nhật thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function BrandEdit($id)
    {
        $brands = Brand::findOrFail($id);
        return view('Backend.brand.brand_edit', compact('brands'));
    }
    public function BrandUpdate(Request $request)
    {
        // $request->validate([
        //     'brand_name_en' => 'required',
        //     'brand_name_hin' => 'required',
        //     'brand_image' => 'required'
        // ], [
        //     'brand_name_en.required' => 'Input Brand English Name',
        //     'brand_name_hin.required' => 'Input Brand Hindi Name'
        // ]);
        $brand_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('brand_image')) {

            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand/' . $name_gen);
            $save_url = 'upload/brand/' . $name_gen;

            unlink($old_img);
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_slug_en)),
                'brand_slug_hin' => str_replace(' ', '-', $request->brand_slug_hin),
                'brand_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Brand Inserted Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.brand')->with($notification);
        } else {
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_slug_en)),
                'brand_slug_hin' => str_replace(' ', '-', $request->brand_slug_hin),

            ]);

            $notification = array(
                'message' => 'Brand Inserted Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.brand')->with($notification);
        }
    }

    public function BrandDelete($id)
    {
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);

        Brand::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}