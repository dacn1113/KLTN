<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use Carbon\Carbon;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\PriceProduct;
use App\Models\ShipDivision;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        $product = Product::findOrFail($id);

        $s_price = PriceProduct::where('pro_id', $id)->get();

        foreach ($s_price as $item) {
            if ($request->size == $item->size) {
                if ($item->dc_price == NULL) {
                    $price = (int)str_replace(',', '', $item->sl_pr);
                } else {
                    $price = (int)str_replace(',', '', $item->dc_price);
                }
            }
        }


        // if ($product->discount_price == NULL) {
        //     Cart::add([
        //         'id' => $id,
        //         'name' => $request->product_name,
        //         // 'qty' => $request->quantity,
        //         // 'price' => $product->selling_price,
        //         'price' => $price,
        //         'weight' => 1,
        //         'options' => [
        //             'image' => $product->product_thambnail,
        //             'color' => $request->color,
        //             'size' => $request->size,
        //         ],
        //     ]);

        //     return response()->json(['success' => 'Successfully Added on Your Cart']);
        // } else {

        Cart::add([
            'id' => $id,
            'name' => $request->product_name,
            'qty' => $request->quantity,

            // 'price' => $product->discount_price,
            // 'price' => (int)str_replace(',', '', $request->price),
            'price' => $price,
            'weight' => 1,
            'options' => [
                'image' => $product->product_thambnail,
                'color' => $request->color,
                'size' => $request->size,
            ],
        ]);
        return response()->json(['success' => '???? th??m th??nh c??ng v??o gi??? h??ng c???a b???n']);
        // }
    } // end mehtod 


    // Mini Cart Section
    public function AddMiniCart()
    {

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = (int)str_replace(',', '', Cart::total());

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => number_format(round($cartTotal)),

        ));
    } // end method 


    /// remove mini cart 
    public function RemoveMiniCart($rowId)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        Cart::remove($rowId);
        return response()->json(['success' => 'X??a s???n ph???m kh???i gi??? h??ng']);
    } // end mehtod 


    // add to wishlist mehtod 

    public function AddToWishlist(Request $request, $product_id)
    {

        if (Auth::check()) {

            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => '???? th??m th??nh c??ng v??o danh s??ch y??u th??ch c???a b???n']);
            } else {

                return response()->json(['error' => 'S???n ph???m n??y ???? c?? trong danh s??ch y??u th??ch c???a b???n']);
            }
        } else {

            return response()->json(['error' => '????ng nh???p t??i kho???n c???a b???n ????? s??? d???ng']);
        }
    } // end method 




    public function CouponApply(Request $request)
    {

        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {

            $total = (int)str_replace(',', '', Cart::total());

            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round($total * $coupon->coupon_discount / 100),
                'total_amount' => round($total - $total * $coupon->coupon_discount / 100)
            ]);

            return response()->json(array(
                'validity' => true,
                'success' => 'Phi???u gi???m gi?? ???????c ??p d???ng th??nh c??ng'
            ));
        } else {
            return response()->json(['error' => 'Phi???u gi???m gi?? kh??ng h???p l???']);
        }
    } // end method 


    public function CouponCalculation()
    {

        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => number_format(session()->get('coupon')['discount_amount']),
                'total_amount' => number_format(session()->get('coupon')['total_amount']),
            ));
        } else {
            return response()->json(array(
                'total' => Cart::total(),
            ));
        }
    } // end method 


    // Remove Coupon 
    public function CouponRemove()
    {
        Session::forget('coupon');
        return response()->json(['success' => 'Lo???i b??? phi???u gi???m gi?? th??nh c??ng']);
    }

    // Checkout Method 
    public function CheckoutCreate()
    {

        if (Auth::check()) {
            if (Cart::total() > 0) {

                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = (int)str_replace(',', '', Cart::total());

                $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
                return view('frontend.checkout.checkout_view', compact('carts', 'cartQty', 'cartTotal', 'divisions'));
            } else {

                $notification = array(
                    'message' => 'Shopping At list One Product',
                    'alert-type' => 'error'
                );

                return redirect()->to('/')->with($notification);
            }
        } else {

            $notification = array(
                'message' => 'B???n c???n ph???i ????ng nh???p ?????u ti??n',
                'alert-type' => 'error'
            );

            return redirect()->route('login')->with($notification);
        }
    } // end method 
}