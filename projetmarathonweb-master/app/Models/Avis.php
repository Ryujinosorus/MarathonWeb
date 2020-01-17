<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $table='comments';

    function av(){
        return $this->belongsToMany(comments::class);
    }
}
