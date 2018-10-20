<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'category_id',
        'prod_name',
       	'prod_code',
        'prod_color',
        'prod_desc',
        'prod_price',
        'prod_image',
    ];

    public function attributes(){
        return $this->hasMany('App\ProductsAttribute', 'product_id');
    }

    public function productImages(){
        return $this->hasMany('App\ProductsImage', 'product_id');
    }
}
