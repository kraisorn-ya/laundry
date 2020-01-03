<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Clothes extends Model
{
    use Notifiable;

    protected $table = 'clothes';
    protected $fillable = [
        'service_type_id',
        'name',
        'price',
    ];

    public function service_type()
    {
        return $this->belongsTo(ServiceType::class);
    }
}
