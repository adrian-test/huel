<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * api call to get products from Shopify and store locally.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShopifyProducts()
    {

        $apiKey = config('app.api_key');
        $apiPass = config('app.api_pass');
        $shopUrl = config('app.shop_url');
        $apiVersion = config('app.api_version');

        $lastId = null;

        # TODO don't currently have access to products over 60days ????

        $url = "https://$apiKey:$apiPass@$shopUrl/admin/api/$apiVersion/products.json?limit=250";

        // create & initialize a curl session
        $curl = curl_init();

        // set our url with curl_setopt()
        curl_setopt($curl, CURLOPT_URL, $url);

        // return the transfer as a string, also with setopt()
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        // curl_exec() executes the started curl session
        // $output contains the output string
        $output = curl_exec($curl);

        // close curl resource to free up system resources
        // (deletes the variable made by curl_init)
        curl_close($curl);

        $outputArray = json_decode($output, true);

        if($outputArray){
        // insert inyto local db
            foreach ($outputArray['products'] as $productArray) {

                $product = new Product;

                $product->fill($productArray)->save();

            }
            return response('Success', 200);
        }

        return response('Fail', 404);       

    }
}
