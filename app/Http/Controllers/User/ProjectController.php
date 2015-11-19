<?php

namespace App\Http\Controllers\User;

use App\Article;
use App\Project;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
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
        $user = User::where('username', $username)->with('projects')->first();
        $articles = Project::where('user_id', $user->id)->paginate(6);

        if($articles->count() > 0) {
            return view('users.projects.list', compact('user', 'articles'));
        } else {
            alert()->warning($username.' has no projects..', 'Whoops!');
            return redirect()->intended('@'.$username);
        }
    }

    public function create() {

    }

    public function store(Request $request) {

    }

    /**
     * Display the specified resource.
     *
     * @param $username
     * @param $slug
     * @return Response
     */
    public function show($username, $slug)
    {
        $user = User::where('username', $username)->with('projects')->first();
        $article = Project::where('user_id', $user->id)->where('slug', $slug)->first();
        $likers = $article->likes->toArray();
//        $likers = User::where('id', $likeID)->get();


//        dd($likers);
        if($article) {
            return view('users.projects.show', compact('user', 'article', 'likers'));
        } else {
            alert()->warning($username.' has no prject that match to your query..', 'Whoops!');
            return redirect()->intended('@'.$username);
        }
    }

    /**
     * @param $username
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function like($username, $slug) {
        if (Auth::check()) {
            $user = User::where('username', $username)->with('projects')->first();
            $article = Project::where('user_id', $user->id)->where('slug', $slug)->first();
            $article->like(Auth::user());

            return redirect()->intended('@'.$article->user->username.'/project/'.$article->slug);
        } else {
            alert()->warning('You need to sign in to like an prject', 'Whoops!');
            return redirect()->intended('auth/login');
        }
    }

    /**
     * @param $username
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function dislike($username, $slug) {
        if (Auth::check()) {
            $user = User::where('username', $username)->with('projects')->first();
            $article = Project::where('user_id', $user->id)->where('slug', $slug)->first();
            $article->dislike(Auth::user());

            return redirect()->intended('@'.$article->user->username.'/project/'.$article->slug);
        } else {
            alert()->warning('You need to sign in to dislike an project', 'Whoops!');
            return redirect()->intended('auth/login');
        }
    }

}
