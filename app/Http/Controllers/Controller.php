<?php

namespace App\Http\Controllers;

use App\Callout;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        // Authorization
        view()->share('signedIn', Auth::check());
        view()->share('currentUser', Auth::user());

        // Partials
        $callouts = Callout::all();
        view()->share('callout', $callouts->last());

    }
}
