<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baba extends Model
{
    public function cheles()
    {
        return $this->hasMany(Baba::class);
    }
}
