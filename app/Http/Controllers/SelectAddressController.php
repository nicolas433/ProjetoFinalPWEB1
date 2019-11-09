<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Address;

class SelectAddressController extends Controller
{
    public function index()
    {
        if (isset(auth()->user()->id)) {
            $userId = auth()->user()->id;
            $addresses = Address::all()
                            ->where('operating', '=', '1')
                            ->where('user_id', '=', $userId);

            return view('pages.address.selectAddress', compact(['addresses']));
        } else {
            return redirect('/');
        }
    } 
}
