<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsImage extends Model
{
    protected $primaryKey = 'prod_image_id';

	protected $fillable = [
		    'product_id',
            'prod_image',
	];
}
