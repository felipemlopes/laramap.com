<?php

namespace App\Http\Controllers\User;

use App\Article;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
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
        $user = User::where('username', $username)->with('articles')->first();
        $articles = Article::where('user_id', $user->id)->latest()->paginate(6);

        if($articles->count() > 0) {
            return view('users.articles.list', compact('user', 'articles'));
        } else {
            alert()->warning($username.' has no articles..', 'Whoops!');
            return redirect()->intended('@'.$username);
        }
    }

    public function create() {
        if(Auth::check()) {
            return view('users.articles.create');
        } else {
            alert()->warning('You need to sign in to create an article', 'Whoops!');
            return redirect()->intended('auth/login');
        }
    }

    public function store(Request $request) {
        if(Auth::check()) {
            $article = new Article();

            $article->title = $request->get('title');
//        $article->image = null;
            $article->content = $request->get('content');

            Auth::user()->articles()->save($article);

            alert()->success('Articles was successfully created', 'Alright!');

            return redirect()->intended('@'.Auth::user()->username.'/articles');
        } else {
            alert()->warning('You need to sign in to create an article', 'Whoops!');
            return redirect()->intended('auth/login');
        }
    }

    public function edit($slug) {
        if(Auth::check()) {
            $user = Auth::user();
            $article = Article::where('user_id', $user->id)->where('slug', $slug)->first();
            return view('users.articles.edit', compact('article'));
        } else {
            alert()->warning('You need to sign in to create an article', 'Whoops!');
            return redirect()->intended('auth/login');
        }
    }

    public function update($slug, Request $request) {
        if(Auth::check()) {
            $user = Auth::user();
            $article = Article::where('user_id', $user->id)->where('slug', $slug)->first();

            $article->title = $request->get('title');
//        $article->image = null;
            $article->content = $request->get('content');

            Auth::user()->articles()->save($article);

            alert()->success('Articles was successfully created', 'Alright!');

            return redirect()->intended('@'.Auth::user()->username.'/articles');
        } else {
            alert()->warning('You need to sign in to create an article', 'Whoops!');
            return redirect()->intended('auth/login');
        }
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
        $user = User::where('username', $username)->with('articles')->first();
        $article = Article::where('user_id', $user->id)->where('slug', $slug)->first();
        $likers = $article->likes->toArray();
//        $likers = User::where('id', $likeID)->get();


//        dd($likers);
        if($article) {
            return view('users.articles.show', compact('user', 'article', 'likers'));
        } else {
            alert()->warning($username.' has no article that match to your query..', 'Whoops!');
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
            $user = User::where('username', $username)->with('articles')->first();
            $article = Article::where('user_id', $user->id)->where('slug', $slug)->first();
            $article->like(Auth::user());

            return redirect()->intended('@'.$article->user->username.'/article/'.$article->slug);
        } else {
            alert()->warning('You need to sign in to like an article', 'Whoops!');
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
            $user = User::where('username', $username)->with('articles')->first();
            $article = Article::where('user_id', $user->id)->where('slug', $slug)->first();
            $article->dislike(Auth::user());

            return redirect()->intended('@'.$article->user->username.'/article/'.$article->slug);
        } else {
            alert()->warning('You need to sign in to dislike an article', 'Whoops!');
            return redirect()->intended('auth/login');
        }
    }

}
