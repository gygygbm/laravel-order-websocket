<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //
        $orders=$user->orders()->with('statuses')->paginate(12);
        $statuses=Order::statuses;
        return view('orders.index',compact('orders','statuses'));
    }

    public function admin()
    {
        $statuses=Order::statuses;
        $orders=Order::with('user','statuses')->paginate(12);

        return view('orders.admin',compact('orders','statuses'));

    }

    public function update(Request $request,Order $order)
    {
        $order->setStatus($request->status);
//        return back();
    }


}
