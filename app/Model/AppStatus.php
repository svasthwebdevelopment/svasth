<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AppStatus extends Model
{
 protected $table ="app-status";

     protected $fillable = [
        'min_version_code' , 'current_version_code', 'update_notice_text',
    ];

     protected $hidden = [
        'id', 
    ];
}
