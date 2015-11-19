<?php

namespace App\Http\Controllers\Backend\Offers;

use App\Offer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
        $offers = Offer::all();
        return view('backend.offers.manage', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $offer = new Offer();
        $image = '';
        $filename = str_random(25).'.'.$request->file('image')->getClientOriginalExtension();

//        dd($request);

        if ($request->hasFile('image')) {
            $request->file('image')->move(public_path().'/uploads/offers/', $filename);
            $image = '/uploads/offers/'.$filename;
        }

        $offer->title = $request->get('title');
        $offer->image = $image;
        $offer->description = $request->get('description');
        $offer->content = $request->get('content');
        $offer->url = $request->get('url');
        $offer->code = $request->get('code');
        $offer->save();

        alert()->success('The new offer was successfully created', 'Alright!');
        return redirect()->intended('backend/offers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
