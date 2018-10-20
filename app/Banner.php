<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $primaryKey = 'banner_id';

    protected $fillable = [
        'banner_title',
        'banner_tagline',
        'banner_description',
        'banner_link',
        'banner_image',
        'banner_status',
    ];
}
