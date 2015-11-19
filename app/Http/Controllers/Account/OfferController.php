<?php

namespace App\Http\Controllers\Account;

use App\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class OfferController extends Controller
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
        if (Cache::has('offer-data')) {
            $data = Cache::get('offer-data');
            return view('account.offers.list', $data);
        }

        $offers = Offer::paginate(6);

        $data = [
            'offers'   => $offers,
        ];

        $expiresAt = Carbon::now()->addMinutes(5);

        Cache::put('offer-data', $data, $expiresAt);
        return view('account.offers.list', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return Response
     */
    public function show($slug)
    {
        $offer = Offer::where('slug', $slug)->first();
        return view('account.offers.show', compact('offer'));
    }
}
