<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

    				'admin_graphql_api_id',
					'body_html',
					'created_at',
					'handle',
					'id',
					'product_type',
					'published_at',
					'published_scope',
					'tags',
					'template_suffix',
					'title',
					'updated_at',
					'vendor'
    ];
}
