<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FriendController extends Controller
{
    public function __construct() {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @param $username
     * @return Response
     */
    public function index($username)
    {
        $user = User::where('username', $username)->first();
        $friends = $user->getAllFriendships();

        if ($user->friends->count() > 0) {
            return view('users.friends.list', compact('user', 'friends'));
        } else {
            alert()->warning($username.' has no friends..', 'Whoops!');
            return redirect()->intended('@'.$username);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $username
     * @param $friendshow
     * @return Response
     */
    public function show($username, $friendshow)
    {
        $user = User::where('username', $username)->first();
        $friendshow = User::where('username', $friendshow)->first();
        $friendship = $user->getFriendship($friendshow);

        $friend = User::where('id', $friendship->recipient_id)->first();
//        dd($friend);
        if ($friendship) {
            return view('users.friends.show', compact('user', 'friend'));
        } else {
            alert()->warning($username.' has no friend that match to your query..', 'Whoops!');
            return redirect()->intended('@'.$username);
        }
    }
}
