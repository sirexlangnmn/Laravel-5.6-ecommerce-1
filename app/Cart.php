<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $primaryKey = 'cart_id';

    protected $fillable = [
        'product_id',
        'prod_attrib_id',
        'size', 
        'product_quantity',
        /*'quantity',*/
        'user_email',
        'session_id',
    ];
}
