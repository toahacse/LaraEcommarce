<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use PDF;

class OrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(){
        $orders = Order::orderBy('id','desc')->get();
        return view('backend.pages.orders.index', compact('orders'));
    }

    public function show($id){
        $order = Order::find($id);
        $order->is_seen_by_admin = 1;
        $order->save();
        return view('backend.pages.orders.show', compact('order'));
    }

    public function completed($id){
        $order = Order::find($id);
        if ($order->is_completed){
            $order->is_completed = 0;
        }else{
            $order->is_completed = 1;
        }
        $order->save();
        session()->flash('success','Order completed status changed..');
        return back();
    }

    public function chargeUpdate(Request $request,$id){
        $order = Order::find($id);

        $order->shipping_charge = $request->shipping_charge;
        $order->custom_discount = $request->custom_discount;

        $order->save();
        session()->flash('success','Order Charge and Discount status changed..');
        return back();
    }
    public function generateInvoice($id){
        $order = Order::find($id);

//        return view('backend.pages.orders.invoice', compact('order'));
        $pdf = PDF::loadView('backend.pages.orders.invoice', compact('order'));
        $pdf->download('invoice.pdf');
        return $pdf->stream('invoice.pdf');
    }

    public function paid($id){
        $order = Order::find($id);
        if ($order->is_paid){
            $order->is_paid = 0;
        }else{
            $order->is_paid = 1;
        }
        $order->save();
        session()->flash('success','Order paid status changed..');
        return back();
    }

    public function delete($id)
    {
        $order = Order::find($id);
        if(!is_null($order)){
            $order->delete();
        }else{
            return redirect()->route('admin.orders');
        }
        session()->flash('success','Order has Deleted!');
        return back();
    }

}
