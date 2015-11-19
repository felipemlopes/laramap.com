<?php

namespace App\Http\Controllers\Site;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function getSitemap() {
        $sitemap = App::make("sitemap");
        $sitemap->setCache('sitemap', 3600);

        if (!$sitemap->isCached()) {

            $sitemap->add(URL::to('p/about'), time(), '0.9', 'monthly');
            $sitemap->add(URL::to('artisans'), time(), '1.0', 'monthly');
            $sitemap->add(URL::to('sponsor'), time(), '0.9', 'monthly');

            $users = User::all();
            foreach ($users as $user) {
                $sitemap->add($user->username, $user->created_at, '0.9', 'monthly', $user->avatar);
            }
        }

        return $sitemap->render('xml');
    }
}
