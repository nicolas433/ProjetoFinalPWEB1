<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->is_admin == 1) {
            return view('admin');
        } else {
            $products = Product::all()->where('operating', '=', '1');
            return view('home', compact('products'));
        }
    }

    // public function admin()
    // {
    //     // auth()->user()->is_admin == 1 return admin
    //     return view('admin');
    // }
}
