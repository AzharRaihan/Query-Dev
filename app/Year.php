<?php

namespace App;

use App\Album;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $guarded = [];
    public function albums(){
        return $this->hasMany(Album::class);
    }
}
