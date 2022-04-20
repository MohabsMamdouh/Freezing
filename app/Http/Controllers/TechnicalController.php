<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Addresses_attach;
use App\Models\Phone;
use App\Models\Phones_attach;
use App\Models\Role;
use App\Models\User;
use App\Models\User_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TechnicalController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tech = User::all();
        return view('technicals.technical', compact('tech'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('technicals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'FullName' => 'required',
            'ArabicName' => 'required',
            'Phone1' => 'required|string|min:4|max:255',
            'Address' => 'required',
            'Email' => 'required|string|min:4|max:255',
            'Photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'Password' => 'required|min:8',
        ]);

        $photo =  $request['FullName'] . '-' . now() . $request->Photo->extension();
        $request->Photo->move(public_path('storage/users'), $photo);

        $user = new User();
        $user->name = $request['FullName'];
        $user->arabic_name = $request['ArabicName'];
        $user->email = $request['Email'];
        $user->image_path = $photo;
        $user->password = Hash::make($request['Password']);
        $user->save();

        if ($request['technical'] == "on") {
            $user->roles()->attach(Role::Where('name', 'Technical')->first());
        }

        if ($request['admin'] == "on") {
            $user->roles()->attach(Role::Where('name', 'Admin')->first());
        }

        $phone = new Phone();
        $phone->phone = $request['Phone1'];
        $phone->save();
        $user->getPhones()->attach(Phone::where('phone', $request['Phone1'])->first());

        if (isset($request['addPhone']) && $request['addPhone'] != "") {
            $phone = new Phone();
            $phone->phone = $request['addPhone'];
            $phone->save();
            $user->getPhones()->attach(Phone::where('phone', $request['addPhone'])->first());
        }

        $address = new Address();
        $address->address = $request['Address'];
        $address->save();
        $user->getAddress()->attach(Address::where('address', $request['Address'])->first());

        return redirect(route('showTechnicals', ['id' => $user->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tech = User::with('getPhones', 'getAddress', 'roles', 'getJobs')->where('id', $id)->get();
        return view('technicals.show', compact('tech'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tech = User::with('getPhones', 'getAddress', 'roles', 'getJobs')->where('id', $id)->get();
        return view('technicals.edit', compact('tech'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'FullName' => 'required',
            'ArabicName' => 'required',
            'Phone1' => 'required|string|min:4|max:255',
            'Address' => 'required',
            'Email' => 'required|string|min:4|max:255',
            'Photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        
        if ($request->hasFile('Photo') == false) {
            $photo = $request['Hidden_Photo'];
        } else {
            $photo =  $request['FullName'] . '-' . time() . '.' . $request->Photo->extension();
            $request->Photo->move(public_path('storage\users'), $photo);
        }

        $user = User::where('id', $request['id'])->first();
        $user->name = $request['FullName'];
        $user->arabic_name = $request['ArabicName'];
        $user->email = $request['Email'];
        $user->image_path = $photo;
        $user->save();

        if ($request['technical'] == "on") {
            if (!isset($request['Technical'])) {
                $user->roles()->attach(Role::Where('name', 'Technical')->first());
            }
        } else {
            if (isset($request['Technical'])) {
                $user_role = User_role::where('user_id', $request['id'])->where('role_id', Role::Where('name', 'Technical')->first()->id)->delete();
            }
        }

        if ($request['admin'] == "on") {
            if (!isset($request['Admin'])) {
                $user->roles()->attach(Role::Where('name', 'Admin')->first());
            }
        } else {
            if (isset($request['Admin'])) {
                $user_role = User_role::where('user_id', $request['id'])->where('role_id', Role::Where('name', 'Admin')->first()->id)->delete();
            }
        }

        $phone = Phone::where('id', $request['Hidden_Phone'])->first();
        $phone->phone = $request['Phone1'];
        $phone->save();

        if (isset($request['Phone2']) && $request['Phone2'] != "") {
            $phone = Phone::where('id', $request['Hidden_Phone2'])->first();
            $phone->phone = $request['Phone2'];
            $phone->save();
        }

        if (isset($request['addPhone'])) {
            $phone = new Phone();
            $phone->phone = $request['addPhone'];
            $phone->save();
            $user->getPhones()->attach(Phone::where('phone', $request['addPhone'])->first());
        }

        $address = Address::where('id', $request['Address_id'])->first();
        $address->address = $request['Address'];
        $address->save();

        return redirect(route('showTechnicals', ['id' => $request['id']]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete Roles
        $user_role = User_role::where('user_id', $id)->delete();

        // Delete Phones
        $attach_phones = Phones_attach::where('attach_id', $id)->get(['phone_id']);
        foreach ($attach_phones as $phone) {
            Phone::where('id', $phone->phone_id)->delete();
        }
        Phones_attach::where('attach_id', $id)->delete();

        // Delete Address
        $attach_address = Addresses_attach::where('attach_id', $id)->get(['address_id']);
        foreach ($attach_address as $address) {
            Address::where('id', $address->address_id)->delete();
        }
        Addresses_attach::where('attach_id', $id)->delete();

        // Delete User
        $user = User::where('id', $id)->delete();
        return redirect(route('technicals'));
    }
}
