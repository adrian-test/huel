<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    protected $fillable = [

						'id',
						'variant_id',
						'title',
						'quantity',
						'sku',
						'variant_title',
						'vendor',
						'fulfillment_service',
						'product_id',
						'requires_shipping',
						'taxable',
						'gift_card',
						'name',
						'variant_inventory_management',
						'product_exists',
						'fulfillable_quantity',
						'grams',
						'price',
						'total_discount',
						'fulfillment_status',
						'pre_tax_price',
						'admin_graphql_api_id',
						'order_id'

    ];
}
