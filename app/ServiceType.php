<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ServiceType extends Model
{
    use Notifiable;
    protected $table = 'service_types';
    protected $fillable = [
        'name',
    ];

    public function clothes()
    {
        return $this->hasMany(Clothes::class);
    }

}
