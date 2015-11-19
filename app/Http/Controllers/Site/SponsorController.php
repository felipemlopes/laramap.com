<?php

namespace App\Http\Controllers\Site;

use App\Events\UserBecomeSponsor;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SponsorController extends Controller
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
        $users = User::where('is_sponsor', true)->get();
        return view('pages.sponsor', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $creditCardToken = $request->get('stripeToken');
            $plan =  Input::get('plan');

            if (!$user->subscribed()) {
                try {
                    $user->subscription($plan)
                        ->create($creditCardToken);

                    $user->is_sponsor = true;
                    $user->save();

                    alert()->success('Thank you for sponsoring Laramap!', 'Wahooo!');
                    event(new UserBecomeSponsor($user));
                    return redirect()->intended('sponsor');
                } catch (\Exception $e) {
                    alert()->error('Something went wrong..', 'Whoops =/');
                    return redirect()->intended('sponsor');
                }
            }

        } else {
            alert()->warning('You need to sign in to become a sponsor', 'Please sign in');
            return redirect()->intended('auth/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
        //
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
