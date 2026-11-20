<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    //indica quais campos podem ser criados com o create
    protected $fillable = [
    'name',
    'photo'
    ];


    public function albuns()
    {
        return $this->hasMany(Album::class);
    }
}
