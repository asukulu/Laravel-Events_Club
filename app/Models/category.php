<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    public function events()
    {

    //mone category can have many events
        return $this->belongsToMany('App\Models\Event');

}
}
