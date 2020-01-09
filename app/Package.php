<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Package extends Model
{
   use Notifiable;

    protected $table = 'packages';
    protected $fillable =
        [
            'name',
            'number',
            'price',
        ];
}
