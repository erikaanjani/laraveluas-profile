<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use HasFactory;
    protected $guarded = ['mana'];

    public function profiles()
    {
        return $this->hasMany('App\Models\profiles');
    }
}
