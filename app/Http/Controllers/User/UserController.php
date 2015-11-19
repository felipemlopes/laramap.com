<?php

namespace App\Http\Controllers\User;

use App\User;
use Awjudd\FeedReader\Facades\FeedReader;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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
        $users = User::where('is_sitepoint', 'false')->paginate(100);
        return view('users.list', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param $username
     * @return Response
     */
    public function show($username)
    {
        $user = User::where('username', $username)->with('friends')->firstOrFail();
        if (Cache::has($user->username.'profile-data')) {
            $data = Cache::get($user->username.'profile-data');
            return view('users.show', $data);
        }

        $activity = $user->activity;

        $friends = $this->getFriends($user->username);

//        dd($this->getFriends($user->username));
        $contributions = array(
            'articles' => $user->articles,
            'tutorials' => $user->tutorials,
            'projects' => $user->projects,
            'meetups' => $user->meetups,
        );

        $data = [
            'user'     => $user,
            'friends'   => $friends,
            'activity'   => $activity,
            'contributions'   => $contributions,
        ];

        $expiresAt = Carbon::now()->addMinutes(5);

        Cache::put($user->username.'profile-data', $data, $expiresAt);

        return view('users.show', $data);
//        return view('users.show', compact('user', 'friends', 'activity', 'contributions'));
    }

    private function getFriends($username) {
        $user = User::where('username', $username)->with('friends')->firstOrFail();
        $fa = $user->getAcceptedFriendships();
        foreach ($fa as $fb) {
            return $friends = User::where('id', $fb->recipient_id)->get();
        }
    }

    public function report(Request $request, $username) {
        $user = User::where('username', $username)->firstOrFail();
        $user->report([
            'reason' => $request->get('reason'),
            'meta' => [$request->get('meta')],
        ], Auth::user());

        alert()->success('Your report has been saved. One of our moderators will review it shortly.', 'Thank you!');
        return redirect()->intended('account/reports');
    }
}
