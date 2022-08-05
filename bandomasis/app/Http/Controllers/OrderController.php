<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Hotel;
use Post;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $orders = Order::orderBy('id', 'desc')->get();


        return view('orders.allOrders', [
            'orders' => $orders,
            'statuses' => Order::STATUSES
        
        ]);
    }

    public function setStatus(Request $request, Order $order)
    {
        
        $order->status = $request->status;
        $order->save();
        return redirect()->back();
    }
    
    
    public function add(Request $request)
    {
        $countries = Country::all();
        $hotels = Hotel::all();
        

        $order = new Order;

        $order->country_id = $request->country_id;
        $order->hotel_id = $request->hotel_id;
        $order->user_id = Auth::user()->id;

        $order->save();

        return redirect()->route('my-orders', ['countries' => $countries, 'hotels' => $hotels]);

    }

    public function showMyOrders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        $hotels = Hotel::all();
       

        return view('orders.index', [
            'hotels' => $hotels,
            'orders' => $orders,
            'statuses' => Order::STATUSES
        ]);
    }
    public function pick(Request $request)
    {

        
        
        $hotels = match($request->sort) {
            'hotels-asc' => Hotel::orderBy('price', 'asc')->get(),
            'hotels-desc' => Hotel::orderBy('price', 'desc')->get(),
            default => Hotel::all()
        };
        $countries = Country::all();
        
        
       return redirect()->route('my-orders', ['hotels' => $hotels, 'countries' => $countries]);
    }
}
