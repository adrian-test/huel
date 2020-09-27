<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

   protected $fillable = [
							'admin_graphql_api_id', 
							'app_id', 
							'browser_ip', 
							'buyer_accepts_marketing', 
							'cancel_reason', 
							'cancelled_at', 
							'cart_token', 
							'checkout_id', 
							'checkout_token', 
							'closed_at', 
							'confirmed', 
							'contact_email', 
							'created_at', 
							'currency', 
							'current_total_duties_set', 
							'customer_locale', 
							'device_id', 
							'email', 
							'financial_status', 
							'fulfillment_status', 
							'gateway', 
							'id', 
							'landing_site', 
							'landing_site_ref', 
							'location_id', 
							'name', 
							'note', 
							'number', 
							'order_number', 
							'order_status_url', 
							'original_total_duties_set', 
							'phone', 
							'presentment_currency', 
							'processed_at', 
							'processing_method', 
							'reference', 
							'referring_site', 
							'source_identifier', 
							'source_name', 
							'source_url', 
							'subtotal_price', 
							'tags', 
							'taxes_included', 
							'test', 'token', 
							'total_discounts', 
							'total_line_items_price', 
							'total_price', 
							'total_price_usd', 
							'total_tax', 
							'total_tip_received', 
							'total_weight', 
							'updated_at', 
							'user_id' 
							    ];

							        /**
     * Get the odrer lines of the Order.
     */
    public function orderLines()
    {
        return $this->hasMany('App\OrderLine', 'order_id', 'id');
    }

}
