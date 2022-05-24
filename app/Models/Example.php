<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    use HasFactory;
    protected $casts = [
        'characteristics' => 'array',
        'prices' => 'array',
        'gallery' => 'array'
    ];



    public function setGalleryAttribute($value)
    {
        $this->attributes['gallery'] = json_encode($value);
    }

    public function setCharacteristicsAttribute($value)
    {
        $this->attributes['characteristics'] = json_encode($value);
    }

    public function setPricesAttribute($value)
    {
        $this->attributes['prices'] = json_encode($value);
    }
}
