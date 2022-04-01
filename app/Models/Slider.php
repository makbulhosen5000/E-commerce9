<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'image','sort_title','long_title','created_by','updated_by',
    ];
}
