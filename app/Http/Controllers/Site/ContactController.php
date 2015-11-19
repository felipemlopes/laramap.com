<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
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
        return view('pages.contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
//        Mail::send('emails.contact', ['data' => $data], function ($message) use ($data) {
//            $message->from($data['email'], $name = $data['name']);
//            $message->sender('contact@laramap.com', $name = 'Laramap.com');
//            $message->to('f.wartner@laramap.com', $name = 'Florian Wartner');
//            $message->replyTo($data['email'], $name = $data['name']);
//            $message->subject('Laramap.com Contact-Form');
//        });

        Mail::laterOn('mails', 5, 'emails.contact', ['data' => $data], function ($message) use ($data) {
            $message->from($data['email'], $name = $data['name']);
            $message->sender('contact@laramap.com', $name = 'Laramap.com');
            $message->to('f.wartner@laramap.com', $name = 'Florian Wartner');
            $message->replyTo($data['email'], $name = $data['name']);
            $message->subject('Laramap.com Contact-Form');
        });

        alert()->success('Your message was successfully send', 'Thank you!');
        return redirect()->intended('contact');
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
