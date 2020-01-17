<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $table='comments';

    function comm(){
        return $this->belongsToMany(comments::class);
    }
}
