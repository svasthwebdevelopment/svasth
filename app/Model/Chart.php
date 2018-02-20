<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{

 protected $table ="purity";

     protected $fillable = [
        'parameter' , 'actual', 'standard',
    ];

     protected $hidden = [
        'id', 
    ];
}
