<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roof extends Model
{
    use HasFactory;
    public function accessories()
    {
        return $this->belongsToMany(Accessorie::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function roofelements()
    {
        return $this->hasMany(Roofelement::class);
    }

}
