<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Solicitation;
use App\Status;
use App\User;

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
    public function index(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $solicitations = Solicitation::all()->where('status_id', '=', '1');
            foreach($solicitations as $solicitation) {
                $user = User::find($solicitation->user_id);
                $solicitation->user = $user->name;
            }

            return view('admin', compact(['solicitations']));
            
        } else {
            // Cria uma sessão bag caso ela não exista
            if (!session()->has('bag')) {
                $request->session()->put('bag', []);
            }

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
