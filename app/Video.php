<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Video extends Model
{
    protected $table = "videos";

	public $timestamps = false;
}
