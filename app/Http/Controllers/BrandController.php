<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
      $brands = Brand::orderBy('created_at', 'desc')
               ->take(7)
               ->get();
      $count   =Brand::count();

      return view('brand/index')->with('brands',$brands)
                                ->with('brandcount',$count);
    }

    public function createBrand(Request $request)
    {
      $request->validate([
        'email' => 'bail|required|unique:brands|max:255',
        'username' => 'bail|required|unique:brands|max:255',
        'name'  => 'bail|required|max:255',
      ]);

        $brand = new Brand;
        $brand->name    = $request->name;
        $brand->username= $request->username;
        $brand->company = $request->company;
        $brand->website = $request->website;
        $brand->email   = $request->email;
        $brand->mobile  = $request->mobile;
        $brand->type    = $request->type;
        $brand->save();

        return redirect()->route('brand');
    }

    public function managerForm()
    {
      $brands = Brand::all();
      return view('brand/managerform')->with('brands',$brands);
    }

    public function createManager(Request $request)
    {
      $request->validate([
        'email' => 'bail|required|unique:brandadmins|max:255',
        'name'  => 'bail|required|max:255',
      ]);

      $ba = new BrandAdmin;
      $ba->name   = $request->name;
      $ba->email  = $request->email;
      $ba->mobile = $request->mobile;
      $ba->password= bcrypt('test123');
      $ba->active = 1;
      $ba->save();

       DB::insert('insert into brandadminmap (brandadminid,brandid) values (?, ?)', [$ba->id, $request->brandid]);
      return redirect()->route('brand');
    }
}
