<?php

namespace App\Http\Controllers\Account;

use AnthonyMartin\GeoLocation\GeoLocation;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct() {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('account.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function store(Request $request, $id)
    {
        $id = $id == Auth::user()->id;
        $user = User::find($id);
        $response = GeoLocation::getGeocodeFromGoogle($request->get('location'));
        if ($id == Auth::user()->id) {
            dd($request);
            $request->user()->update($request->all());
            $request->user()->latitude = $response->results[0]->geometry->location->lat;
            $request->user()->longitude = $response->results[0]->geometry->location->lng;

            $request->user()->save();
            alert()->success('Your profile was successfully updated', 'Alright!');
            return redirect()->intended('account/profile');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $id  = Auth::user()->id;
        $user = User::find($id);
        return view('account.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $id  = Auth::user()->id;
        $user = User::find($id);
        return view('account.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
//        $id = $id == Auth::user()->id;
        $user = Auth::user();

        if (Auth::check()) {
//        dd($request);
            if($request->has('location')) {
                $response = GeoLocation::getGeocodeFromGoogle($request->get('location'));
                $user->latitude = $response->results[0]->geometry->location->lat;
                $user->longitude = $response->results[0]->geometry->location->lng;

                $user->update($request->all());
            } else {
                $user->update($request->all());
            }
//            dd($user);
            alert()->success('Your profile was successfully updated', 'Alright!');
            return redirect()->intended('account/profile');
        }
    }

}
