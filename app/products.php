<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
     protected $fillable = [
        'title' , 'path', 'price','halflitre','shipping','offer','availability',
    ];

     protected $hidden = [
        'id', 
    ];


   
}
