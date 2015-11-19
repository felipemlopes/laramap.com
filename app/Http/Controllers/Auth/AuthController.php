<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegistered;
use App\User;
use PackageBackup\Watchable\Models\Watchlist;
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use AnthonyMartin\GeoLocation\GeoLocation as GeoLocation;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        parent::__construct();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a v alid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => str_slug($data['username'], '_'),
            'password' => bcrypt($data['password']),
            'location' => $data['location']
        ]);
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
        } catch (Exception $e) {
            return redirect('auth/github');
        }

//        $authUser = $this->findOrCreateUser($user);
//        Auth::login($authUser, true);

        if ($authUser = User::where('github_id', $user->id)->first()) {
            Auth::login($authUser, true);
            alert()->success('Welcome back, '.$authUser->username);
        } else {
            $this->findOrCreateUser($user);
        }

        return redirect()->intended('home');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    private function findOrCreateUser($githubUser)
    {
        if ($authUser = User::where('github_id', $githubUser->id)->first()) {
            return $authUser;
        } else {
            $response = GeoLocation::getGeocodeFromGoogle($githubUser->user['location']);

            $user = new User();
            $user->name = $githubUser->name;
            $user->username = str_slug($githubUser->nickname, '_');
            $user->email = $githubUser->email;
            $user->github_id = $githubUser->id;
            $user->avatar = $githubUser->avatar;
            $user->location = $githubUser->user['location'];
            $user->github_profile = $githubUser->user['html_url'];
            $user->hireable = $githubUser->user['hireable'];
            $user->website = $githubUser->user['blog'];

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
        }

    }
}
