<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Auth;
use Carbon\Carbon;
use PDF;
use DB;



class OrderController extends Controller
{

    // Pending Orders 
    public function PendingOrders()
    {
        $orders = Order::where('status', 'Chưa giải quyết')->orderBy('id', 'DESC')->get();
        return view('backend.orders.pending_orders', compact('orders'));
    } // end mehtod 


    // Pending Order Details 
    public function PendingOrdersDetails($order_id)
    {

        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('backend.orders.pending_orders_details', compact('order', 'orderItem'));
    } // end method 



    // Confirmed Orders 
    public function ConfirmedOrders()
    {
        $orders = Order::where('status', 'Xác nhận')->orderBy('id', 'DESC')->get();
        return view('backend.orders.confirmed_orders', compact('orders'));
    } // end mehtod 


    // Processing Orders 
    public function ProcessingOrders()
    {
        $orders = Order::where('status', 'Nhận đơn')->orderBy('id', 'DESC')->get();
        return view('backend.orders.processing_orders', compact('orders'));
    } // end mehtod 


    // Picked Orders 
    public function PickedOrders()
    {
        $orders = Order::where('status', 'Chờ vận chuyển')->orderBy('id', 'DESC')->get();
        return view('backend.orders.picked_orders', compact('orders'));
    } // end mehtod 



    // Shipped Orders 
    public function ShippedOrders()
    {
        $orders = Order::where('status', 'Đang vận chuyển')->orderBy('id', 'DESC')->get();
        return view('backend.orders.shipped_orders', compact('orders'));
    } // end mehtod 


    // Delivered Orders 
    public function DeliveredOrders()
    {
        $orders = Order::where('status', 'Đã giao')->orderBy('id', 'DESC')->get();
        return view('backend.orders.delivered_orders', compact('orders'));
    } // end mehtod 


    // Cancel Orders 
    public function CancelOrders()
    {
        $orders = Order::where('status', 'Hủy đơn')->orderBy('id', 'DESC')->get();
        return view('backend.orders.cancel_orders', compact('orders'));
    } // end mehtod 




    public function PendingToConfirm($order_id)
    {

        Order::findOrFail($order_id)->update(['status' => 'Xác nhận']);

        $notification = array(
            'message' => 'Xác nhận đơn hàng thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('pending-orders')->with($notification);
    } // end method





    public function ConfirmToProcessing($order_id)
    {

        Order::findOrFail($order_id)->update(['status' => 'Nhận đơn']);

        $notification = array(
            'message' => 'Xử lý đơn hàng thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('confirmed-orders')->with($notification);
    } // end method



    public function ProcessingToPicked($order_id)
    {

        Order::findOrFail($order_id)->update(['status' => 'Chờ vận chuyển']);

        $notification = array(
            'message' => 'Đặt hàng được chọn thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('processing-orders')->with($notification);
    } // end method


    public function PickedToShipped($order_id)
    {

        Order::findOrFail($order_id)->update(['status' => 'Đang vận chuyển']);

        $notification = array(
            'message' => 'Đơn hàng đã vận chuyển thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('picked-orders')->with($notification);
    } // end method


    public function ShippedToDelivered($order_id)
    {

        $product = OrderItem::where('order_id', $order_id)->get();
        foreach ($product as $item) {
            Product::where('id', $item->product_id)
                ->update(['product_qty' => DB::raw('product_qty-' . $item->qty)]);
        }

        Order::findOrFail($order_id)->update(['status' => 'Đã giao']);

        $notification = array(
            'message' => 'Đơn hàng được giao thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('shipped-orders')->with($notification);
    } // end method

    public function Cancel($order_id)
    {

        Order::findOrFail($order_id)->update(['status' => 'Hủy đơn']);

        $notification = array(
            'message' => 'Đơn hàng đã hủy thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('cancel-orders')->with($notification);
    } // end method

    public function AdminInvoiceDownload($order_id)
    {

        $order = Order::with('division', 'district', 'state', 'user', 'notes')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        $pdf = PDF::loadView('backend.orders.order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    } // end method 



}