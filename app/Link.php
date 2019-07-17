<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use \App\HasMachineTags;
    //
    protected $guarded = [];
}
