<?php

namespace App\Http\Controllers\Backend\Site;

use App\Callout;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prophecy\Call\Call;

class CalloutController extends Controller
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
        $callouts = Callout::all();

        return view('backend.callouts.manage', compact('callouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.callouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $callout = new Callout();
        $callout->create($request->all());
        alert()->success('Callout successfully created', 'Alright!');
        return redirect()->intended('backend/callouts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $callout = Callout::find($id);
        return view('backend.callouts.edit', compact('callout'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $callout = Callout::find($id);
        return view('backend.callouts.edit', compact('callout'));
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
        $callout = Callout::find($id);
        $callout->update($request->all());
        alert()->success('Callout was successfully updated', 'Alright!');
        return redirect()->intended('backend/callouts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
        $callout = Callout::find($id);

        alert()->success('Callout was successfully deleted', 'Alright!');
        $callout->delete();
        return redirect()->intended('backend/callouts');
    }
}
