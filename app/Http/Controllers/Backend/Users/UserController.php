<?php

namespace App\Http\Controllers\Backend\Users;

use AnthonyMartin\GeoLocation\GeoLocation;
use App\Events\UserRegistered;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
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
        $users = User::all();
        return view('backend.users.manage', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $response = GeoLocation::getGeocodeFromGoogle($request->get('location'));

        $user = new User();
        $user->name = $request->get('name');
        $user->username = str_slug($request->get('username'), '_');
        $user->email = $request->get('email');
        $user->password = bcrypt('AppleJuice88!');
        $user->location = $request->get('location');

        $user->latitude = $response->results[0]->geometry->location->lat;
        $user->longitude = $response->results[0]->geometry->location->lng;

        $user->save();

        alert()->success(str_slug($request->get('username'), '_').' was successfully created', 'Alright!');
        event(new UserRegistered($user));
        return redirect()->intended('backend/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $response = GeoLocation::getGeocodeFromGoogle($request->get('location'));

//        dd($request);
        $user->update($request->all());
        $user->latitude = $response->results[0]->geometry->location->lat;
        $user->longitude = $response->results[0]->geometry->location->lng;

        $user->save();

        alert()->success($user->username.' was successfully updated', 'Alright!');
        return redirect()->intended('backend/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
