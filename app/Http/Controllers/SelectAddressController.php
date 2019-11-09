<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SelectAddressController extends Controller
{
    public function index() {
        return view('pages.address.selectAddress');
    } 
}
