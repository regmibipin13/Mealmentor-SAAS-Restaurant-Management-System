<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::where('user_id', auth()->id())->paginate(20);
        return view('user.addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.addresses.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sanitized = $request->validate([
            'name' => 'required',
            'city' => 'required',
            'street' => 'required',
            'nearby_landmark' => 'required',
        ]);

        $sanitized['user_id'] = auth()->id();

        Address::create($sanitized);
        return redirect()->to('/addresses')->with('success', 'Address Added Successfully');
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
    public function edit(Address $address)
    {
        return view('user.addresses.form', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $sanitized = $request->validate([
            'name' => 'required',
            'city' => 'required',
            'street' => 'required',
            'nearby_landmark' => 'required',
        ]);

        $sanitized['user_id'] = auth()->id();

        $address->update($sanitized);
        return redirect()->to('/addresses')->with('success', 'Address Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->back()->with('success', 'Address Deleted Sucessfully');
    }
}
