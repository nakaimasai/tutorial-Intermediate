<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
}
