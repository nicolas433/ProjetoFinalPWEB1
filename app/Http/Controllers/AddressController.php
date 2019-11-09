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
    public function create($action = 0)
    {
        if ($action == 0) {
            return view('pages.address.newAddress');
        } else {
            return view('pages.address.newAddress', compact('action'));
        }
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

        if(isset($address->action)){
            return redirect('/selectaddress');
        }

        return redirect('/addresses');
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
        $address = Address::find($id);
        if(isset($address)) {
            return view('pages.address.editAddress', compact('address'));
        } else {
            return redirect('/addresses');
        }
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
        $address = Address::find($id);
        if(isset($address)) {
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
                return redirect('/addresses');
            }

            $address->save();

            return redirect('/addresses');
        } else {
            return redirect('/addresses');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::find($id);
        if (isset($address)) {
            $address->operating = '0';
            $address->save();
        }
        return redirect('/addresses');
    }
}
