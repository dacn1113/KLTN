<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;

use App\Models\Product;
use App\Models\MultiImg;
use App\Models\PriceProduct;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{

    public function AddProduct()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add', compact('categories', 'brands'));
    }


    public function StoreProduct(Request $request)
    {

        // $request->validate([
        //     'file' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
        // ]);

        // if ($files = $request->file('file')) {
        //     $destinationPath = 'upload/pdf'; // upload path
        //     $digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
        //     $files->move($destinationPath, $digitalItem);
        // }

        if ($request->discount_price == '') {
            $price_dl = $request->selling_price;
            $dolar = 24770;
            $price = $price_dl / $dolar;
            $price_dl = round($price, 2);
        } else {
            $price_dl = $request->discount_price;
            $dolar = 24770;
            $price = $price_dl / $dolar;
            $price_dl = round($price, 2);
        }


        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/' . $name_gen);
        $save_url = 'upload/products/thambnail/' . $name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'selling_price_dl' => $price_dl,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hin,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thambnail' => $save_url,

            // 'digital_file' => $digitalItem,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

        ////


        // $pro_id = $request->id;
        $size = $request->size;
        $sl_pr = $request->sl_pr;
        $dc_price = $request->dc_price;

        foreach ($size as $index => $sizes) {


            $size1 = $sizes;
            $sl_pr1 = $sl_pr[$index];
            $dc_price1 = $dc_price[$index];

            PriceProduct::insert(
                [
                    'pro_id' => $product_id,
                    'size' => $size1,
                    'sl_pr' => $sl_pr1,
                    'dc_price' => $dc_price1,
                ]
            );
        }




        ///


        ////////// Multiple Image Upload Start ///////////

        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;

            MultiImg::insert([

                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),

            ]);
        }

        ////////// Een Multiple Image Upload Start ///////////


        $notification = array(
            'message' => 'Sản phẩm được tạo thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);
    } // end method



    public function ManageProduct()
    {

        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('products'));
    }


    public function EditProduct($id)
    {

        $multiImgs = MultiImg::where('product_id', $id)->get();

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $products = Product::findOrFail($id);
        $products_size = PriceProduct::where('pro_id', $id)->get();
        return view('backend.product.product_edit', compact('categories', 'brands', 'subcategory', 'subsubcategory', 'products', 'products_size', 'multiImgs'));
    }


    public function ProductDataUpdate(Request $request)
    {

        $product_id = $request->id;

        if ($request->discount_price == '') {
            $price_dl = $request->selling_price;
            $dolar = 24770;
            $price = $price_dl / $dolar;
            $price_dl = round($price, 2);
        } else {
            $price_dl = $request->discount_price;
            $dolar = 24770;
            $price = $price_dl / $dolar;
            $price_dl = round($price, 2);
        }

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'selling_price_dl' => $price_dl,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hin,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);


        $id = $request->id_pro;
        $size = $request->size;
        $sl_pr = $request->sl_pr;
        $dc_price = $request->dc_price;

        foreach ($size as $index => $sizes) {

            $size1 = $sizes;
            $id1 = $id[$index];
            $sl_pr1 = $sl_pr[$index];
            $dc_price1 = $dc_price[$index];

            PriceProduct::findOrFail($id1)->update(
                [
                    'size' => $size1,
                    'sl_pr' => $sl_pr1,
                    'dc_price' => $dc_price1,
                ]
            );
        }

        $notification = array(
            'message' => 'Đã cập nhật sản phẩm không có hình ảnh thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);
    } // end method 
    // public function Addsizeproduct(Request $request)
    // {
    //     $pro_id = $request->id;
    //     $size = $request->size;
    //     $sl_pr = $request->sl_pr;
    //     $dc_price = $request->dc_price;

    //     foreach ($size as $index => $sizes) {


    //         $size1 = $sizes;
    //         $sl_pr1 = $sl_pr[$index];
    //         $dc_price1 = $dc_price[$index];

    //         PriceProduct::insert(
    //             [
    //                 'pro_id' => $pro_id,
    //                 'size' => $size1,
    //                 'sl_pr' => $sl_pr1,
    //                 'dc_price' => $dc_price1,
    //             ]
    //         );
    //     }


    // $notification = array(
    //     'message' => 'Product Image Updated Successfully',
    //     'alert-type' => 'info'
    // );

    // return redirect()->back()->with($notification);
    // }

    /// Multiple Image Update
    public function MultiImageUpdate(Request $request)
    {
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;

            MultiImg::where('id', $id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),

            ]);
        } // end foreach

        $notification = array(
            'message' => 'Hình ảnh sản phẩm được cập nhật thành công',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end mehtod 


    /// Product Main Thambnail Update /// 
    public function ThambnailImageUpdate(Request $request)
    {
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/' . $name_gen);
        $save_url = 'upload/products/thambnail/' . $name_gen;

        Product::findOrFail($pro_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Đã cập nhật hình thu nhỏ hình ảnh sản phẩm thành công',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end method


    //// Multi Image Delete ////
    public function MultiImageDelete($id)
    {
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Đã xóa hình ảnh sản phẩm thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method 



    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Sản phẩm không hoạt động',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Sản phẩm đang hoạt động',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }



    public function ProductDelete($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        PriceProduct::where('pro_id', $product->id)->delete();
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id', $id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Đã xóa sản phẩm thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method 



    // product Stock 
    public function ProductStock()
    {

        $products = Product::latest()->get();
        return view('backend.product.product_stock', compact('products'));
    }
}