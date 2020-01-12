<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class OrderDetail extends Model
{
    use Notifiable;
    protected $table = 'order_details';
    protected $fillable = [
        'order_id',
        'user_id',
        'clothes_id',
        'clothes_qty',
        'clothes_total_price',
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function clothes()
    {
        return $this->belongsTo(Clothes::class,'clothes_id');
    }

    public function service_type()
    {
        return $this->belongsTo(ServiceType::class,'service_type_id');
    }
}
