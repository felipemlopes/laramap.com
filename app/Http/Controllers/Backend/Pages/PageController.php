<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Article;
use App\Bugreport;
use App\Meetup;
use App\Project;
use App\Tutorial;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $articles = Article::all();
        $tutorials = Tutorial::all();
        $users = User::where('is_sitepoint', false)->get();
        $meetups = Meetup::all();
        $projects = Project::all();
        $bugs = Bugreport::all();

        return view('backend.pages.dashboard', compact('articles', 'tutorials', 'users', 'meetups', 'projects', 'bugs'));
    }
}
