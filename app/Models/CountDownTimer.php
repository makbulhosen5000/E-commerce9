<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountDownTimer extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','launch_date','status',
     ];
}
