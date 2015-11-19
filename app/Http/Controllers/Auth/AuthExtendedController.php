<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegistered;
use App\Http\Requests\UserCreateRequest;
use App\User;
use PackageBackup\Watchable\Models\Watchlist;
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Laravel\Socialite\Facades\Socialite;

use AnthonyMartin\GeoLocation\GeoLocation as GeoLocation;

class AuthExtendedController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        parent::__construct();
    }

    public function getRegister() {
        return view('auth.login');
    }

    /**
     * @param Request $request
     */
    public function postRegister(UserCreateRequest $request) {
        $response = GeoLocation::getGeocodeFromGoogle($request->get('location'));

        $user = new User();
        $user->name = $request->get('name');
        $user->username = str_slug($request->get('username'), '_');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->location = $request->get('location');

        $user->latitude = $response->results[0]->geometry->location->lat;
        $user->longitude = $response->results[0]->geometry->location->lng;

        $user->save();

        $user->createWatchlist([
            'title' =>  $user->username.' follows',
            'description' => $user->username.'_follow',
            'type' => 'follow',
        ]);

        $watchlist = Watchlist::where('author_id', $user->id)->first();
        $watchlist->addItem(User::find(1));

        $user->createWatchlist([
            'title' => $user->username.'´s Bookmarks',
            'description' => $user->username.'_bookmarks',
            'type' => 'bookmarks',
        ]);

        Auth::login($user, true);

        event(new UserRegistered($user));
        alert()->success('You have successfully signed up', 'Welcome aboard!');

        return redirect()->intended('home');
    }

    public function getLogout() {
        if (Auth::check()) {
            alert('See you later, '.Auth::user()->username);
            Auth::logout();
            return redirect()->intended('home');
        }
    }
}
