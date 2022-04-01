<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsevent extends Model
{
    protected $fillable = [
        'date','sort_title','long_title','image','created_by','updated_by',
    ];
}

