<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Auth;

class Ticket extends Model
{
    //
    protected $connection = 'mysql2';

    protected $table = "tickets";

    public $timestamps = false;
    
}
