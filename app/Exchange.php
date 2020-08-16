<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Exchange extends Model
{
    protected $table = 'exchange';

    public $timestamps = false;
}
