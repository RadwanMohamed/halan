<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['model','color','carID'];

    public function images()
    {
        return $this->morphMany('App\Image','imageable');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
