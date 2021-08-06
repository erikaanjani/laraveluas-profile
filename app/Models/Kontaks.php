<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontaks extends Model
{
    use HasFactory;
    protected $guarded = ['email'];

    public function kontaks()
    {
        return $this->hasMany('App\Models\kontaks');
    }
}
