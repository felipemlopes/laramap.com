<?php

namespace App\Http\Controllers\Shop;

use App\ShopArticle;
use Fwartner\Printful\Facades\PrintfulFacade;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public $pf;

    public function __construct() {
        parent::__construct();

        $this->middleware('auth');
        $this->pf = new PrintfulFacade();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @param $id
     * @return Response
     */
    public function store(Request $request, $id)
    {
        $article = ShopArticle::find($id);
        $order = $this->pf->post('orders',array(
            'recipient' => array(
                'name' => $request->get('name'),
                'address1' => $request->get('address1'),
                'city' => $request->get('city'),
                'state_code' => $request->get('state_code'),
                'country_code' => $request->get('country_code'),
                'zip' => $request->get('zip')
            ),
            'items' => array(
                array(
                    'variant_id' => $article->variant_id,
                    'quantity' => $request->get('quantity'),
                    'name' => $article->name,
                    'retail_price' => $article->retail_price,
                    'files' => array(
                        array(
                            'url' => $article->front
                        ),
                        array(
                            'type' => 'back',
                            'url' => $article->back
                        ),
                        array(
                            'type' => 'preview',
                            'url' => $article->preview
                        )
                    ),
                    'options' => array(
                        array(
                            'id' => 'remove_labels',
                            'value' => $article->remove_labels
                        )
                    )
                )
            )
        ));
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
