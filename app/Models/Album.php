<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //indica quais campos podem ser criados com o create
    protected $fillable = [
    'name',
    'image',
    'release_date',
    'band_id'
    ];

    public function band()
    {
        return $this->belongsTo(Band::class);
    }
}
