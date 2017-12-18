<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Order;
use App\Product;
use App\Msuser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand=Brand::count();
        $order=Order::count();
        $product=Product::count();
        $msuser=Msuser::count();
        return view('index')
                    ->with('brand',$brand)
                    ->with('product',$product)
                    ->with('msuser',$msuser)
                    ->with('order',$order);
    }
}
