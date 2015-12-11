<?php

namespace App\Http\Controllers\Pages;

use App\Events\UserRegistered;
use App\User;
use Carbon\Carbon;
use Connect\Connect;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

use Appitventures\Phpgmaps\Facades\Phpgmaps as Gmaps;
use Thomaswelton\LaravelGravatar\Facades\Gravatar;

class PageController extends Controller
{
    public function __construct() {
        parent::__construct();
    }

    /**
     * @return \Illuminate\View\View
     */
    public function home() {
//        if (Cache::has('homepage-data')) {
//            $data = Cache::get('homepage-data');
//            return view('welcome', $data);
//        }

        $config = array();
        $config['cluster'] = true;
        $config['zoom'] = '2';
        $config['https'] = true;
        $config['map_height'] = '500';

        $users = User::where('is_sitepoint', 'false')->get();

        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            });
        }
        centreGot = true;';


        Gmaps::initialize($config);


        foreach ($users as $user) {
            if ($user->avatar) {
                $gravatar = '<img style="max-width: 45px; max-height: 45px;" class="img-circle" src="'.$user->avatar.'"/>';
            } else {
                $gravatar = '<img style="max-width: 45px; max-height: 45px;" class="img-circle" src="'.Gravatar::src($user->email).'"/>';
            }

            if (!$user->latitude == null) {
                $marker = array();
                $marker['position'] = $user->latitude.', '.$user->longitude;
                $marker['draggable'] = true;
                $marker['animation'] = 'DROP';
                $marker['infowindow_content'] = '<div id="content"><div id="siteNotice"></div><div id="bodyContent"><p class="text-muted"><a href="'.url('@'.$user->username).'">'.$gravatar.' '.$user->username.'</a></p></div></div>';

                Gmaps::add_marker($marker);
            }
        }

        $data = [
            'map'     => Gmaps::create_map(),
            'users'   => $users,
        ];

        $expiresAt = Carbon::now()->addMinutes(5);

        Cache::put('homepage-data', $data, $expiresAt);

        return view('welcome', $data);
    }

    public function imprint() {
        return view('pages.imprint');
    }

    public function about() {
        return view('pages.about');
    }
}
