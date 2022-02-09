<?php

namespace App;
use App\Year;
use App\Gallery;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $guarded = [];

    public function year(){
        return $this->belongsTo(Year::class);
    }


    public function gallery(){
        return $this->hasMany(Gallery::class);
    }
}
