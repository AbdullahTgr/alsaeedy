<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable=['title','slug','description','title-ar','description-ar','title-fr','description-fr','photo','status'];
}
