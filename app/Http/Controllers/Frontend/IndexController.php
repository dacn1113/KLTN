<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;
use Illuminate\Support\Facades\Hash;
use App\Models\BlogPost;
use App\Models\PriceProduct;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use DB;

class IndexController extends Controller
{
    public function index()
    {
        $blogpost = BlogPost::latest()->get();
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $hot_deals = Product::where('hot_deals', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->limit(3)->get();

        $special_offer = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(6)->get();

        $special_deals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(6)->get();

        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status', 1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->get();


        $skip_category_1 = Category::skip(2)->first();
        $skip_product_1 = Product::where('status', 1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->get();

        $category_1 = Category::where('id', 5)->first();
        $product_1 = Product::where('status', 1)->where('category_id', $category_1->id)->orderBy('id', 'DESC')->limit(2)->get();


        $category_2 = Category::where('id', 6)->first();
        $product_2 = Product::where('status', 1)->where('category_id', $category_2->id)->orderBy('id', 'DESC')->limit(2)->get();


        $category_3 = Category::where('id', 7)->first();
        $product_3 = Product::where('status', 1)->where('category_id', $category_3->id)->orderBy('id', 'DESC')->limit(2)->get();


        $category_4 = Category::where('id', 8)->first();
        $product_4 = Product::where('status', 1)->where('category_id', $category_4->id)->orderBy('id', 'DESC')->limit(2)->get();

        $category_5 = Category::where('id', 9)->first();
        $product_5 = Product::where('status', 1)->where('category_id', $category_5->id)->orderBy('id', 'DESC')->limit(2)->get();



        $skip_brand_1 = Brand::skip(1)->first();
        $skip_brand_product_1 = Product::where('status', 1)->where('brand_id', $skip_brand_1->id)->orderBy('id', 'DESC')->get();

        $brand = Brand::orderBy('id', 'DESC')->get();
        // return $skip_category->id;
        // die();

        return view('frontend.index', compact(
            'brand',
            'product_1',
            'product_2',
            'product_3',
            'product_4',
            'product_5',
            'categories',
            'sliders',
            'products',
            'featured',
            'hot_deals',
            'special_offer',
            'special_deals',
            'skip_category_0',
            'skip_product_0',
            'skip_category_1',
            'skip_product_1',
            'skip_brand_1',
            'skip_brand_product_1',
            'blogpost'
        ));
    }


    public function UserLogout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }


    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }



    public function UserProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;


        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/' . $data->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    } // end method 


    public function UserChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }


    public function UserPasswordUpdate(Request $request)
    {

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        } else {
            return redirect()->back();
        }
    } // end method



    public function ProductDetails($id, $slug)
    {
        $product = Product::findOrFail($id);

        $users = DB::table('reviews')->where('product_id', $product->id)->selectRaw('rating, count(*) * 100.0 / sum(count(*)) over() as phantram ,count(rating) as soluong')->groupBy('rating')->get();

        $rt5 = 0;
        $count5 = 0;
        $rt4 = 0;
        $count4 = 0;
        $rt3 = 0;
        $count3 = 0;
        $rt2 = 0;
        $count2 = 0;
        $rt1 = 0;
        $count1 = 0;
        foreach ($users as $it => $item) {
            if ($item->rating == 5) {
                $rt5 = $item->phantram;
                $count5 = $item->soluong;
            }
            if ($item->rating == 4) {
                $rt4 = $item->phantram;
                $count4 = $item->soluong;
            }
            if ($item->rating == 3) {
                $rt3 = $item->phantram;
                $count3 = $item->soluong;
            }
            if ($item->rating == 2) {
                $rt2 = $item->phantram;
                $count2 = $item->soluong;
            }
            if ($item->rating == 1) {
                $rt1 = $item->phantram;
                $count1 = $item->soluong;
            }
        }

        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);

        $color_hin = $product->product_color_hin;
        $product_color_hin = explode(',', $color_hin);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        $size_hin = $product->product_size_hin;
        $product_size_hin = explode(',', $size_hin);

        $multiImag = MultiImg::where('product_id', $id)->get();

        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id', $cat_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->get();
        return view(
            'frontend.product.product_details',
            compact(
                'product',
                'multiImag',
                'product_color_en',
                'product_color_hin',
                'product_size_en',
                'product_size_hin',
                'relatedProduct',
                'rt5',
                'rt4',
                'rt3',
                'rt2',
                'rt1',
                'count5',
                'count4',
                'count3',
                'count2',
                'count1'
            )
        );
    }



    public function TagWiseProducten($tag)
    {
        $products = Product::where('status', 1)->where('product_tags_en', $tag)->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('frontend.tags.tags_view', compact('products', 'categories'));
    }
    public function TagWiseProductvn($tag)
    {
        $products = Product::where('status', 1)->where('product_tags_hin', $tag)->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('frontend.tags.tags_view', compact('products', 'categories'));
    }


    // Subcategory wise data
    public function SubCatWiseProduct(Request $request, $subcat_id, $slug)
    {
        $products = Product::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        $breadsubcat = SubCategory::with(['category'])->where('id', $subcat_id)->get();


        ///  Load More Product with Ajax 
        if ($request->ajax()) {
            $grid_view = view('frontend.product.grid_view_product', compact('products'))->render();

            $list_view = view('frontend.product.list_view_product', compact('products'))->render();
            return response()->json(['grid_view' => $grid_view, 'list_view', $list_view]);
        }
        ///  End Load More Product with Ajax 

        return view('frontend.product.subcategory_view', compact('products', 'categories', 'breadsubcat'));
    }

    // Sub-Subcategory wise data
    public function SubSubCatWiseProduct($subsubcat_id, $slug)
    {
        $products = Product::where('status', 1)->where('subsubcategory_id', $subsubcat_id)->orderBy('id', 'DESC')->paginate(6);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        $breadsubsubcat = SubSubCategory::with(['category', 'subcategory'])->where('id', $subsubcat_id)->get();

        return view('frontend.product.sub_subcategory_view', compact('products', 'categories', 'breadsubsubcat'));
    }



    /// Product View With Ajax
    public function ProductViewAjax($id)
    {
        $product = Product::with('category', 'brand')->findOrFail($id);
        $size_product = PriceProduct::where('pro_id', $id)->first();
        $ccl = $size_product->sl_pr;
        $ccl1 = $size_product->dc_price;
        $price = number_format($ccl);
        $price1 = number_format($ccl1);

        $color = $product->product_color_en;
        $product_color = explode(',', $color);

        $size = $product->product_size_en;
        $product_size = explode(',', $size);

        $color1 = $product->product_color_hin;
        $product_color1 = explode(',', $color1);

        $size1 = $product->product_size_hin;
        $product_size1 = explode(',', $size1);

        return response()->json(array(
            'product' => $product,
            'slpr' => $price,
            'dcpr' => $price1,
            'color' => $product_color,
            'size' => $product_size,
            'color1' => $product_color1,
            'size1' => $product_size1,

        ));
    } // end method 

    // Product Seach 
    public function ProductSearch(Request $request)
    {

        $request->validate(["search" => "required"]);

        $item = $request->search;
        // echo "$item";
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $products = Product::where('product_name_en', 'LIKE', "%$item%")->get();
        return view('frontend.product.search', compact('products', 'categories'));
    } // end method 


    ///// Advance Search Options 

    public function SearchProduct(Request $request)
    {

        $request->validate(["search" => "required"]);

        $item = $request->search;

        $products = Product::where('product_name_en', 'LIKE', "%$item%")->select('product_name_en', 'product_thambnail', 'selling_price', 'id', 'product_slug_en')->limit(5)->get();
        return view('frontend.product.search_product', compact('products'));
    } // end method 

    public function selectSize(Request $request)
    {
        $proDum = $request->proDum;
        $size = $request->size;
        $s_price = PriceProduct::where('pro_id', $proDum)->where('size', $size)->get();

        foreach ($s_price as $sPrice) {
            $dcpr = number_format($sPrice->dc_price);
            $slpr = number_format($sPrice->sl_pr);
        }

        return response()->json(array(
            // 's_price' => $s_price,
            'slpr' => $slpr,
            'dcpr' => $dcpr
        ));
    }
}