<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset(auth()->user()->id)) {
            $userId = auth()->user()->id;
            $addresses = Address::all()
                            ->where('operating', '=', '1')
                            ->where('user_id', '=', $userId);

            return view('pages.address.index', compact(['addresses']));
        } else {
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.address.newAddress');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = new Address();

        $address->house_number = $request->input('houseNumber');
        $address->apartment_number = $request->input('apartmentNumber');
        $address->street = $request->input('street');
        $address->neighborhood = $request->input('neighborhood');
        $address->city = $request->input('city');
        $address->reference_point = $request->input('referencePoint');
        $address->operating = '1';

        if (isset(auth()->user()->id)) {
            $address->user_id = auth()->user()->id;
        } else {
            return redirect('/address/new');
        }

        $address->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
