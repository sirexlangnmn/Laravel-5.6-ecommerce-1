<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsAttribute extends Model
{
	protected $primaryKey = 'prod_attrib_id';

	protected $fillable = [
		    'product_id',
            'sku',
            'size',
            'price',
            'stock',
	];
        
}
