<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model // CategoryModel yan, binura ko lang
{
	protected $primaryKey = 'category_id';

    protected $fillable = [
        'parent_id',
        'name', 
        'description', 
        'url',
        'status',
    ];

    protected $hidden = [
      	'remember_token',
    ];

    public function categories(){
        return $this->hasMany('App\Category', 'parent_id');
    }
}
