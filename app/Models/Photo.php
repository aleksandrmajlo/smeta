<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

//    protected $casts = [
//        'gallery' => 'array'
//    ];


//    public function setGalleryAttribute($value)
//    {
//        $this->attributes['gallery'] = json_encode($value);
//    }


    public function roof()
    {
        return $this->belongsTo(Roof::class);
    }
    public function formroof()
    {
        return $this->belongsTo(Formroof::class);
    }

}
