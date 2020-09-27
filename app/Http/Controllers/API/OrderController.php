<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\OrderLine;

class OrderController extends Controller
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
     * api call to get orders from Shopify and store locally.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShopifyOrders()
    {

        $apiKey = config('app.api_key');
        $apiPass = config('app.api_pass');
        $shopUrl = config('app.shop_url');
        $apiVersion = config('app.api_version');

        $lastId = null;

        # TODO don't currently have access to orders over 60days ????

        $url = "https://$apiKey:$apiPass@$shopUrl/admin/api/$apiVersion/orders.json?limit=250";

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
            foreach ($outputArray['orders'] as $orderArray) {

                $orderId = $orderArray['id'];

                $order = new Order;

                $order->fill($orderArray)->save();

                // now orderlines
                foreach ($orderArray['line_items'] as $lineItem) {
                   
                    $orderlines = new OrderLine;
                    $orderlines->order_id = $orderId;
                    $orderlines->fill($lineItem)->save();
                    
                }

            }

            return response('Success', 200);
        }

        return response('Fail', 404);

    }


    /**
     * Return the mean average order value across all customers
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function avgValueAll()
    {
           $totalValue = 0;

            $count = 0;
        
            $values = Order::all()->pluck('total_price');

            if($values){

                foreach ($values as $value) {
                    $totalValue = $totalValue + $value;

                    $count++;
                }

            $avg = ($totalValue / $count);

            return response(round($avg, 2), 200);
            }

            return round(false, 404);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  float  $avg
     * @return \Illuminate\Http\Response
     */
    public function avgValue($email)
    {
            $totalValue = 0;

            $count = 0;
        
            $values = Order::where('email', $email)->pluck('total_price');

            if($values){

                foreach ($values as $value) {
                    $totalValue = $totalValue + $value;

                    $count++;
                }

            $avg = ($totalValue / $count);

            return response(round($avg, 2), 200);
            }

            return round(false, 404);
    }


    /**
     * Return the mean average order value of a specific variant
     * 34783705858214 apears in 60 orders
     * http://huel.dev/api/orders/avg-value-variant/34783705858214
     * http://huel.dev/api/orders/avg-value-variant/34783639634086  // in one order 2535838417062 £181.50
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function avgValueVariant($variant)
    {
        
        $totalValue = 0;

            $count = 0;

            $values = Order::WhereHas('orderlines', function($query) use ($variant) {
                                $query->where('variant_id', $variant);
                            })
                            ->pluck('total_price');

            if($values){

                foreach ($values as $value) {
                    $totalValue = $totalValue + $value;

                    $count++;
                }

            $avg = ($totalValue / $count);

            return response(round($avg, 2), 200);
            }

            return round(false, 404);
    }

}
