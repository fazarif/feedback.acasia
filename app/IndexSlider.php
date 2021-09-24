<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndexSlider extends Model
{
    protected $table = 'index_slider';

    public $timestamps = false;
}
