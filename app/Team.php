<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    const FREQUENCY=['週1','週2','週3','週4','週5','週6','週7'];
    protected $guarded=[];
}
