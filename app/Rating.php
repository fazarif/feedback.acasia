<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Auth;

class Rating extends Model
{
    //
    protected $connection = 'mysql';
    
    protected $table = 'rating';

    public $timestamps = false;
}
