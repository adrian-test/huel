<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [

    				'accepts_marketing',
					'accepts_marketing_updated_at',
					'admin_graphql_api_id',
					'created_at',
					'currency',
					'email',
					'first_name',
					'id',
					'last_name',
					'last_order_id',
					'last_order_name',
					'marketing_opt_in_level',
					'multipass_identifier',
					'note',
					'orders_count',
					'phone',
					'state',
					'tags',
					'tax_exempt',
					'total_spent',
					'updated_at',
					'verified_email',

    				];
}
