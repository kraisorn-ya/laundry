<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Service extends Model
{
    use Notifiable;

    protected $table = 'services';

    protected $fillable = [
        'user_id',
        'service_type_id',
        'admin_id',
        'description',
        'address',
        'pay',
        'image',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }

    public function service_type()
    {
        return $this->belongsTo(ServiceType::class);
    }
}
