<?php

namespace App\Models;
use App\Models\category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function getPrice()
    {
        //format of the price
    $price = $this->price / 100;

    return number_format($price ,  2 ,'.' .' ');
}

public function categories()

{
return $this->belongsToMany('App\Models\Event');

}

protected $fillable = 
['title','description','name','image','slug','user_id'];

public function user()
{
    //this is the relationship of user belongs to an event 
    return $this->belongsToMany(User::class);
}
}

