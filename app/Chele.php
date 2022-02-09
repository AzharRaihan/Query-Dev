<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chele extends Model
{
    public function baba()
    {
        return $this->belongsTo(Chele::class);
    }
}
