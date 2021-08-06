<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikans extends Model
{
    use HasFactory;
    protected $guarded = ['mana'];

    public function pendidikans()
    {
        return $this->hasMany('App\Models\pendidikans');
    }
}
