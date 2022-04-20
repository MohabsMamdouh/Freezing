<?php

namespace App\Http\Controllers;

use App\Models\SiteInfo;
use Illuminate\Http\Request;

class SiteController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('settings');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id=1)
    {
        $request->validate([
            'website_title' => 'required',
            'website_name' => 'required',
            'website_email' => 'required|string|min:4|max:255',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'website_phone1' => 'required',
            'website_phone2' => 'required',
            'website_address' => 'required',
            'website_logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'website_favicon' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        
        if ($request->hasFile('website_logo') == false) {
            $logoName = $request['hidden_logo'];
        } else {
            $logoName = 'logo.' . $request->website_logo->extension();
            $request->website_logo->move(public_path('storage'), $logoName);
        }


        if ($request->hasFile('website_favicon') == false) {
            $faviconName = $request['hidden_favicon'];
        } else {
            $faviconName = 'favicon.' . $request->website_favicon->extension();
            $request->website_favicon->move(public_path('storage'), $faviconName);
        }

        $info = SiteInfo::where('id', '=', $id)
                    ->update([
                        'website_title' => $request['website_title'],
                        'website_arabic' => $request['website_name'],
                        'email' => $request['website_email'],
                        'website_logo' => $logoName,
                        'website_favicon' => $faviconName,
                        'meta_keyword' => $request['meta_keyword'],
                        'meta_description' => $request['meta_description'],
                        'phone2' => $request['website_phone1'],
                        'phone1' => $request['website_phone2'],
                        'address' => $request['website_address'],
                    ]);
        return redirect(route('settings', ['id' => $id]));
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
