<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\BrandAdmin;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      return view('brand/index');
    }

    public function createBrand(Request $request)
    {
        $brand = new Brand;
        $brand->name    = $request->name;
        $brand->username= $request->username;
        $brand->company = $request->company;
        $brand->website = $request->website;
        $brand->email   = $request->email;
        $brand->mobile  = $request->mobile;
        $brand->type    = $request->type;
        $brand->save();
        return 'done';
    }

    public function managerForm()
    {
      $brands = Brand::all();
      return view('brand/managerform')->with('brands',$brands);
    }

    public function createManager(Request $request)
    {
      $ba = new BrandAdmin;
      $ba->name   = $request->name;
      $ba->email  = $request->email;
      $ba->mobile = $request->mobile;
      $ba->password= bcrypt('123');
      $ba->save();
      echo 'done';
    }
}
